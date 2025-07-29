<?php

namespace App\Services;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\MatchTypeEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Http\Resources\AnnouncementResource;
use App\Models\Announcement;
use App\Models\PlayerTeam;
use App\Models\RequestPlayerTeam;
use App\Models\Team;
use App\Repositories\AnnouncementRepository;
use App\Repositories\MatchRepository;
use App\Repositories\PlayerTeamRepository;
use App\Repositories\Request\RequestPlayerTeamRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use App\Services\AccessServices\TeamAccessService;
use App\Support\Messages\TeamSwalMessages;
use App\Traits\LogsActivity;
use App\ViewModels\Team\TeamActivitiesViewModel;
use App\ViewModels\Team\TeamMatchesViewModel;
use App\ViewModels\Team\TeamNotInPlayersViewModel;
use App\ViewModels\Team\TeamPlayersViewModel;
use App\ViewModels\Team\TeamProfileViewModel;
use App\ViewModels\Team\TeamRequestPlayerTeamViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamDetailService extends CrudService
{
    use LogsActivity;

    protected TeamRepository $teamRepository;
    protected MetaDataService $metaDataService;

    /**
     * @param TeamRepository $teamRepository
     * @param MetaDataService $metaDataService
     * @return void
     */
    public function __construct(
        TeamRepository $teamRepository,
        MetaDataService $metaDataService
    )
    {
        $this->teamRepository = $teamRepository;
        $this->metaDataService = $metaDataService;

        parent::__construct($this->teamRepository); // Keep if Crud operations are handled here
    }

    public function getTeamById(string $id): Team
    {
        return $this->teamRepository->find($id);
    }

    /**
     * Get user profile data.
     *
     * @param string $id
     * @param array $with
     * @return array
     */
    public function getTeamProfileData(Request $request, string $id, array $with, bool $useCache = false): array
    {
        $team = $this->teamRepository->find($id, ['users', 'teamLeaders.user', 'city', 'sportType', 'statusDefinition', 'requestPlayerTeams']);
        $viewModel = new TeamProfileViewModel($team, new TeamAccessService(), $this->metaDataService);

        return $viewModel->toArray($request);
    }

    /**
     * Get user profile data.
     *
     * @param Request $request
     * @param string $id
     * @return array
     */
    public function getRequestPlayerTeamsData(Request $request, string $id, string $type):array
    {
        $team = $this->teamRepository->find($id, ['users', 'teamLeaders', 'statusDefinition', 'requestPlayerTeams.requestedUser']);
        $viewModel = new TeamRequestPlayerTeamViewModel($team, new TeamAccessService(), $type);

        return $viewModel->toArray($request);
    }

    /**
     * Get user profile data.
     *
     * @param string $id
     * @return array
     */
    public function deleteRequestPlayerTeamsData(string $id): RedirectResponse
    {
        try {
            $requestPlayerTeamRepo = app(RequestPlayerTeamRepository::class);

            $requestPlayerTeam = $requestPlayerTeamRepo->find($id);
            if (!$requestPlayerTeam) {
                return redirect()->back()->with('error', __('messages.request_player_team_not_found'));
            }

            $requestPlayerTeam->receivers()->delete();

            $requestPlayerTeamRepo->delete($id);

            return redirect()->back()->with('success', __('messages.request_player_team_deleted_successfully'));

        } catch (\Throwable $th) {

            return redirect()->back()->with('error', __('messages.error_occurred_while_deleting'));
        }
    }

    public function acceptRequestPlayer(string $requestId): RedirectResponse
    {
        try {
            $requestPlayerTeamRepo = app(RequestPlayerTeamRepository::class);

            $requestPlayerTeam = $requestPlayerTeamRepo->find($requestId);
            if (!$requestPlayerTeam) {
                return redirect()->back()->with('error', __('messages.request_player_team_not_found'));
            }

            $team = $requestPlayerTeam->team;

            $currentPlayerCount = $team->users()->count();
            $maxPlayer = $team->max_player ?? 0;
            if ($currentPlayerCount >= $maxPlayer) {
                return redirect()->back()->with('swal', TeamSwalMessages::teamPlayersMaxCountError()->toArray());
            }

            // İstek kabul işlemleri
            $requestPlayerTeam->receivers()->delete();

            $requestPlayerTeam->update([
                'status' => RequestStatusEnum::ACCEPTED->value,
            ]);

            PlayerTeam::create([
                'user_id' => $requestPlayerTeam->requested_user_id,
                'team_id' => $team->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->logActivity(
                'team.joined',
                $team,
                [
                    'user' => $requestPlayerTeam->requestedUser->first_name ?? 'Unknown',
                    'id'   => $team->id,
                ]
            );

            return redirect()->back()->with('success', __('messages.request_player_team_accepted_successfully'));

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('messages.error_occurred_while_accepting'));
        }
    }

    public function rejectRequestPlayer(string $requestId): RedirectResponse
    {
        try {
            $requestPlayerTeamRepo = app(RequestPlayerTeamRepository::class);

            $requestPlayerTeam = $requestPlayerTeamRepo->find($requestId);
            if (!$requestPlayerTeam) {
                return redirect()->back()->with('error', __('messages.request_player_team_not_found'));
            }
            $requestPlayerTeam->receivers()->delete();

            $requestPlayerTeam->delete();

            return redirect()->back()->with('success', __('messages.request_player_team_rejected_successfully'));

        } catch (\Throwable $th) {

            return redirect()->back()->with('error', __('messages.error_occurred_while_rejecting'));
        }
    }

    /**
     * Get user's teams data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getPlayerTeamsData(Request $request, string $teamId): array
    {
        $team = $this->teamRepository->find($teamId, ['playerTeams.player', 'teamLeaders', 'statusDefinition', 'requestPlayerTeams.requestedUser']);
        $viewModel = new TeamPlayersViewModel($team, new TeamAccessService());

        return $viewModel->toArray();
    }

    /**
     * Get user's teams data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getNotInTeamPlayersData(Request $request, string $teamId): array
    {
        $userRepo = app(UserRepository::class);
        $team = $this->teamRepository->find($teamId, ['users', 'teamLeaders', 'statusDefinition', 'requestPlayerTeams.requestedUser']);

        $existingPlayerIds = $team->users->pluck('id')->toArray();
        $requestedUserIds = $team
            ->requestPlayerTeams()
            ->where(['status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value])
            ->pluck('requested_user_id')
            ->toArray();

        $exceptIds = array_merge($existingPlayerIds, $requestedUserIds, [auth()->id()]);
        $request->merge([
            'except_ids' => $exceptIds,
            // 'city_id' => $team->city_id,
            'sport_type_id' => $team->sport_type_id
        ]);
        $filteredUsers = $userRepo->all($request, ['userAddresses.district', 'sportTypes', 'statusDefinition']);
        $viewModel = new TeamNotInPlayersViewModel($team, $filteredUsers, $exceptIds, new TeamAccessService());
        return $viewModel->toArray();
    }

    public function invitePlayer(Request $request, string $id, string $userId) : RedirectResponse
    {
        try {
            DB::beginTransaction();
            $requestPlayerTeamRepo = app(RequestPlayerTeamRepository::class);

            $requestPlayerTeam = $requestPlayerTeamRepo->create([
                'team_id' => $id,
                'requested_user_id' => $userId,
                'type' => RequestTypeEnum::INVITE->value,
                'title' => $request->input('title'),
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $requestPlayerTeam->receivers()->create([
                'requestable_id' => $requestPlayerTeam->id,
                'requestable_type' => RequestPlayerTeam::class,
                'name' => 'player_team',
                'receiver_user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();

            return redirect()->back()->with('success', __('messages.player_invited_successfully'));
        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->back()->with('error', __('messages.contact_support'));
        }
    }

    public function destroyPlayer(string $playerTeamId) : RedirectResponse
    {
        try {
            $playerTeamRepo = app(PlayerTeamRepository::class);

            $playerTeam = $playerTeamRepo->find($playerTeamId);

            if (!$playerTeam) {
                return redirect()->back()->with('error', __('messages.player_team_not_found'));
            }

            $team = $playerTeam->team;

            $playerTeamRepo->delete($playerTeamId);

            return redirect()->back()->with('success', __('messages.player_team_deleted_successfully'));
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', __('messages.contact_support'));
        }
    }

    /**
     * Get user's matches data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getTeamMatchesData(Request $request, string $teamId): array
    {
        $team = $this->teamRepository->find($teamId, ['users', 'teamLeaders', 'requestPlayerTeams']);
        $matchRepo = app(MatchRepository::class);
        $request->merge([
            'team_id' => $teamId,
            'type' => MatchTypeEnum::TEAM->value
        ]);
        $matches = $matchRepo->all($request, ['teamMatches', 'statusDefinition', 'court.courtAddress.city']);
        $viewModel = new TeamMatchesViewModel($team, $matches, new TeamAccessService());
        return $viewModel->toArray();
    }

    /**
     * Get user's activities data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getTeamActivitiesData(Request $request, string $teamId): array
    {
        $team = $this->teamRepository->find($teamId, ['users', 'teamLeaders', 'requestPlayerTeams']);
        $viewModel = new TeamActivitiesViewModel($team, new TeamAccessService());

        return $viewModel->toArray($request);
    }

    /**
     * Get user's announcements data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getTeamAnnouncementsData(Request $request, string $teamId): array
    {
        // $request->merge(['created_user_id' => $userId]);
        $datas['announcements'] = AnnouncementResource::collection((new AnnouncementRepository(new Announcement()))->all($request, ['user'], false))->response()->getData(true);
        $datas['sport_types'] = $this->metaDataService->getSportTypes();
        $datas['cities']     = $this->metaDataService->getCitiesByRequest();

        return $datas;
    }
}
