<?php

namespace App\Services;

use App\Enums\Request\RequestStatusEnum;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\Request\RequestPlayerTeamResource;
use App\Http\Resources\UserResource;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Matches;
use App\Models\PlayerTeam;
use App\Models\RequestPlayerTeam;
use App\Models\Team;
use App\Models\User;
use App\Repositories\ActivityRepository;
use App\Repositories\AnnouncementRepository;
use App\Repositories\MatchRepository;
use App\Repositories\PlayerTeamRepository;
use App\Repositories\Request\RequestPlayerTeamRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use App\Services\AccessServices\TeamAccessService;
use App\Traits\LogsActivity;
use App\ViewModels\TeamNotInPlayersViewModel;
use App\ViewModels\TeamPlayersViewModel;
use App\ViewModels\TeamProfileViewModel;
use App\ViewModels\TeamRequestPlayerTeamViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
        // $this->cityRepository = $cityRepository; // Uncomment if needed
        // $this->sportTypeRepository = $sportTypeRepository; // Uncomment if needed

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
        $team = $this->teamRepository->find($id, ['users', 'teamLeaders', 'city', 'sportType', 'statusDefinition', 'requestPlayerTeams']);
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
            $requestPlayerTeam->receivers()->delete();

            $requestPlayerTeam->update([
                'status' => RequestStatusEnum::ACCEPTED->value,
            ]);

            PlayerTeam::create([
                'user_id' => $requestPlayerTeam->requested_user_id,
                'team_id' => $requestPlayerTeam->team->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->logActivity(
                'team.joined',
                $requestPlayerTeam->team,
                [
                    'user' => $requestPlayerTeam->requestedUser->first_name ?? 'Unknown',
                    'id'   => $requestPlayerTeam->team->id,
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
    public function getNotInTeamPlayersData(string $teamId): array
    {
        $team = $this->teamRepository->find($teamId, ['users', 'teamLeaders', 'statusDefinition', 'requestPlayerTeams.requestedUser']);
        $viewModel = new TeamNotInPlayersViewModel($team, new TeamAccessService());
        return $viewModel->toArray();
    }

    public function destroyPlayer(string $playerTeamId) : RedirectResponse
    {
        try {
            $playerTeamRepo = app(PlayerTeamRepository::class);

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
        $datas['matches'] = MatchResource::collection((new MatchRepository(new Matches()))->all($request, ['sportType', 'court.courtAddress.district.city'], false))->response()->getData(true);
        $datas['cities']  = $this->metaDataService->getCitiesByRequest();
        $datas['sport_types'] = $this->metaDataService->getSportTypes();

        return $datas;
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
        // $request->merge(['causer_id' => $userId]);
        $relations = ['subject'];
        $datas['activities'] = ActivityResource::collection((new ActivityRepository(new Activity()))->all($request, $relations, false))->response()->getData(true);
        $datas['cities']     = $this->metaDataService->getCitiesByRequest();
        $datas['sport_types'] = $this->metaDataService->getSportTypes();

        return $datas;
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
