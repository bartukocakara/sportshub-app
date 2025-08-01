<?php

namespace App\Services;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Http\Resources\MatchResource;
use App\Models\Matches;
use App\Models\MatchTeamPlayer;
use App\Models\RequestMatchTeamPlayer;
use App\Repositories\MatchRepository;
use App\Repositories\MatchTeamPlayerRepository;
use App\Repositories\MatchTeamRepository;
use App\Repositories\Request\RequestMatchTeamPlayerRepository;
use App\Repositories\UserRepository;
use App\Services\AccessServices\MatchAccessService;
use App\Support\Messages\MatchSwalMessages;
use App\Traits\LogsActivity;
use App\ViewModels\Match\MatchActivitiesViewModel;
use App\ViewModels\Match\MatchNotInPlayersViewModel;
use App\ViewModels\Match\MatchNotInMatchTeamPlayersViewModel;
use App\ViewModels\Match\MatchProfileViewModel;
use App\ViewModels\Match\MatchRequestMatchTeamPlayerViewModel;
use App\ViewModels\Match\MatchTeamsViewModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MatchDetailService extends CrudService
{
    use LogsActivity;

    protected MatchRepository $matchRepository;
    protected MetaDataService $metaDataService;

    /**
     * @param MatchRepository $matchRepository
     * @param MetaDataService $metaDataService
     * @return void
     */
    public function __construct(
        MatchRepository $matchRepository,
        MetaDataService $metaDataService
    )
    {
        $this->matchRepository = $matchRepository;
        $this->metaDataService = $metaDataService;

        parent::__construct($this->matchRepository); // Keep if Crud operations are handled here
    }

    public function findMatchById(string $id): Matches
    {
        return $this->matchRepository->find($id);
    }

    /**
     * Get user profile data.
     *
     * @param string $id
     * @param array $with
     * @return array
     */
    public function getMatchProfileData(Request $request, string $id, array $with, bool $useCache = false): array
    {
        $match = $this->matchRepository->find($id, $with);

        $viewModel = new MatchProfileViewModel($match, new MatchAccessService(), $this->metaDataService);

        return $viewModel->toArray($request);
    }

    /**
     * Get user's teams data.
     *
     * @param Request $request
     * @param string $matchId
     * @return array
     */
    public function getMatchTeamsData(Request $request, string $matchId): array
    {
        $match = $this->matchRepository->find($matchId, ['matchOwners', 'statusDefinition', 'matchTeams.matchTeamPlayers.user']);
        $viewModel = new MatchTeamsViewModel($match, new MatchAccessService());
        return $viewModel->toArray();
    }

    public function matchTeamCreate(array $data, string $matchId): RedirectResponse
    {
        try {
            $matchTeamRepo = app(MatchTeamRepository::class);
            $createData = [
                'match_id' => $matchId,
                'title' => $data['title']
            ];
            $matchTeamRepo->create($createData);
            $this->logActivity(
                'match.match-team-created',
                $matchTeamRepo->find($matchId),
                [
                    'user' => auth()->user()->first_name ?? 'Unknown',
                    'id'   => $matchId,
                ]
            );
            return redirect()->back()->with('success', __('messages.match_team_created_successfully'));

        } catch (\Throwable $th) {
            Log::error('Error while creating match team: ' . $th->getMessage());
            return redirect()->back()->with('error', __('messages.contact_support'));
        }
    }

    public function matchTeamUpdate(array $data, string $matchId, string $matchTeamId): RedirectResponse
    {
        try {
            $matchTeamRepo = app(MatchTeamRepository::class);
            $matchTeam = $matchTeamRepo->find($matchTeamId);
            if (!$matchTeam) {
                return redirect()->back()->with('error', __('messages.match_team_not_found'));
            }

            $matchTeam->update(['title' => $data['title']]);
            $this->logActivity(
                'match.match-team-updated',
                $matchTeam,
                [
                    'user' => auth()->user()->first_name ?? 'Unknown',
                    'id'   => $matchId,
                ]
            );
            return redirect()->back()->with('success', __('messages.match_team_updated_successfully'));

        } catch (\Throwable $th) {
            Log::error('Error while updating match team: ' . $th->getMessage());
            return redirect()->back()->with('error', __('messages.contact_support'));
        }
    }


    public function matchTeamsSort(array $transfers, string $matchId): RedirectResponse
    {
        try {
            DB::beginTransaction();

            foreach ($transfers as $transfer) {
                MatchTeamPlayer::where('user_id', $transfer['user_id'])
                               ->whereHas('matchTeam', function ($query) use ($matchId) {
                                   $query->where('match_id', $matchId);
                               })
                               ->update(['match_team_id' => $transfer['match_team_id']]);
            }
            DB::commit(); //

            return redirect()->back()->with('success', __('messages.team_changes_saved'));

        } catch (\Throwable $th) {
            DB::rollBack(); 

            Log::error('Error while sorting match teams: ' . $th->getMessage());
            return redirect()->back()->with('error', __('messages.contact_support'));
        }
    }

    public function getPlayersData(Request $request, string $id): array
    {
        $userRepo = app(UserRepository::class);
        $match = $this->matchRepository->find($id, ['matchOwners', 'matchTeams.matchTeamPlayers.requestedUser']);

        $matchPlayerUserIds = $match->matchTeams
                                    ->flatMap(fn ($team) => $team->matchTeamPlayers)
                                    ->pluck('user_id')
                                    ->unique()
                                    ->toArray();

        $currentUserId = auth()->user()->id;
        if ($currentUserId) {
            $matchPlayerUserIds[] = $currentUserId;
        }

        $exceptIds = array_unique($matchPlayerUserIds);
        $request->merge([
            'sport_type_id' => $match->sport_type_id,
            'city_id' => $match->city_id,
            'except_ids' => $exceptIds,
        ]);

        $users = $userRepo->all($request, ['userAddresses.district', 'sportTypes', 'statusDefinition']);
        $viewModel = new MatchNotInPlayersViewModel($match, $users, new MatchAccessService());

        return $viewModel->toArray();
    }

    /**
     * Get user profile data.
     *
     * @param Request $request
     * @param string $id
     * @return array
     */
    public function getRequestMatchTeamPlayerData(Request $request, string $id, string $type):array
    {
        $match = $this->matchRepository->find($id, ['users', 'matchOwners', 'statusDefinition', 'matchTeams.matchTeamPlayers.requestedUser']);
        $viewModel = new MatchRequestMatchTeamPlayerViewModel($match, new MatchAccessService(), $type);
        return $viewModel->toArray($request);
    }

    /**
     * Get user profile data.
     *
     * @param string $id
     * @return array
     */
    public function deleteRequestMatchTeamPlayerData(string $id): RedirectResponse
    {
        try {
            $requestMatchTeamPlayerRepo = app(RequestMatchTeamPlayerRepository::class);

            $requestMatchTeamPlayer = $requestMatchTeamPlayerRepo->find($id);
            if (!$requestMatchTeamPlayer) {
                return redirect()->back()->with('error', __('messages.request_player_team_not_found'));
            }

            $requestMatchTeamPlayer->receivers()->delete();

            $requestMatchTeamPlayerRepo->delete($id);

            return redirect()->back()->with('success', __('messages.request_player_team_deleted_successfully'));

        } catch (\Throwable $th) {

            return redirect()->back()->with('error', __('messages.error_occurred_while_deleting'));
        }
    }

    public function acceptRequestMatchTeamPlayer(string $requestId): RedirectResponse
    {
        try {
            $requestMatchTeamPlayerRepo = app(RequestMatchTeamPlayerRepository::class);

            $requestMatchTeamPlayer = $requestMatchTeamPlayerRepo->find($requestId);
            if (!$requestMatchTeamPlayer) {
                return redirect()->back()->with('error', __('messages.request_player_team_not_found'));
            }

            $match = $requestMatchTeamPlayer->team;

            $currentPlayerCount = $match->users()->count();
            $maxPlayer = $match->max_player ?? 0;
            if ($currentPlayerCount >= $maxPlayer) {
                return redirect()->back()->with('swal', MatchSwalMessages::teamPlayersMaxCountError()->toArray());
            }

            // İstek kabul işlemleri
            $requestMatchTeamPlayer->receivers()->delete();

            $requestMatchTeamPlayer->update([
                'status' => RequestStatusEnum::ACCEPTED->value,
            ]);

            MatchTeamPlayer::create([
                'user_id' => $requestMatchTeamPlayer->requested_user_id,
                'team_id' => $match->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->logActivity(
                'team.joined',
                $match,
                [
                    'user' => $requestMatchTeamPlayer->requestedUser->first_name ?? 'Unknown',
                    'id'   => $match->id,
                ]
            );

            return redirect()->back()->with('success', __('messages.request_player_team_accepted_successfully'));

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('messages.error_occurred_while_accepting'));
        }
    }

    public function rejectRequestMatchTeamPlayer(string $requestId): RedirectResponse
    {
        try {
            $requestMatchTeamPlayerRepo = app(RequestMatchTeamPlayerRepository::class);
            $requestMatchTeamPlayer = $requestMatchTeamPlayerRepo->find($requestId);
            if (!$requestMatchTeamPlayer) {
                return redirect()->back()->with('error', __('messages.request_player_team_not_found'));
            }
            $requestMatchTeamPlayer->receivers()->delete();

            $requestMatchTeamPlayer->delete();

            return redirect()->back()->with('success', __('messages.request_player_team_rejected_successfully'));

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('messages.error_occurred_while_rejecting'));
        }
    }

    

    /**
     * Get user's match data.
     *
     * @param Request $request
     * @param string $matchId
     * @return array
     */
    public function getNotInMatchTeamPlayersData(Request $request, string $matchId): array
    {
        $userRepo = app(UserRepository::class);
        $match = $this->matchRepository->find($matchId, ['users', 'matchOwners', 'statusDefinition', 'matchTeams.matchTeamPlayers.requestedUser']);

        $existingPlayerIds = $match->users->pluck('id')->toArray();
        $requestedUserIds = $match
            ->matchTeams()
            ->where(['status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value])
            ->pluck('requested_user_id')
            ->toArray();

        $exceptIds = array_merge($existingPlayerIds, $requestedUserIds, [auth()->id()]);
        $request->merge([
            'except_ids' => $exceptIds,
            // 'city_id' => $match->city_id,
            'sport_type_id' => $match->sport_type_id
        ]);
        $filteredUsers = $userRepo->all($request, ['userAddresses.district', 'sportTypes', 'statusDefinition']);
        $viewModel = new MatchNotInMatchTeamPlayersViewModel($match, $filteredUsers, $exceptIds, new MatchAccessService());
        return $viewModel->toArray();
    }

    public function invitePlayer(Request $request, string $id, string $userId) : RedirectResponse
    {
        try {
            DB::beginTransaction();
            $requestMatchTeamPlayerRepo = app(RequestMatchTeamPlayerRepository::class);

            $requestMatchTeamPlayer = $requestMatchTeamPlayerRepo->create([
                'team_id' => $id,
                'requested_user_id' => $userId,
                'type' => RequestTypeEnum::INVITE->value,
                'title' => $request->input('title'),
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $requestMatchTeamPlayer->receivers()->create([
                'requestable_id' => $requestMatchTeamPlayer->id,
                'requestable_type' => RequestMatchTeamPlayer::class,
                'name' => 'match_team_player',
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

    public function destroyPlayer(string $matchTeamPlayerId) : RedirectResponse
    {
        try {
            DB::beginTransaction();
            $matchTeamPlayerRepo = app(MatchTeamPlayerRepository::class);

            $matchTeamPlayer = $matchTeamPlayerRepo->find($matchTeamPlayerId);
            $user = $matchTeamPlayer->user;
            if ($user) {
                $user->announcements()
                    ->where('subject_type', Matches::class)
                    ->where('subject_id', $matchTeamPlayer->match_id)
                    ->delete();
            
                $user->activities()
                    ->where('subject_type', Matches::class)
                    ->where('subject_id', $matchTeamPlayer->match_id)
                    ->delete();
            }
            $matchTeamPlayer->delete();
            DB::commit();
            return redirect()->back()->with('success', __('messages.match_team_player_delete_successfully'));
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('Error while destroying match team player: ' . $th->getMessage());
            return redirect()->back()->with('error', __('messages.contact_support'));
        }
    }

    /**
     * Get user's activities data.
     *
     * @param Request $request
     * @param string $matchId
     * @return array
     */
    public function getMatchActivitiesData(Request $request, string $matchId): array
    {
        $match = $this->matchRepository->find($matchId, ['users', 'matchOwners', 'matchTeams.matchTeamPlayers']);
        $viewModel = new MatchActivitiesViewModel($match, new MatchAccessService());

        return $viewModel->toArray($request);
    }

    
}
