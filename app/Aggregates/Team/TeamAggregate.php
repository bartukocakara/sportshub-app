<?php

namespace App\Aggregates\Team;

use App\Enums\Request\RequestStatusEnum;
use App\Models\Team;
use Illuminate\Support\Str;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Repositories\TeamRepository;
use App\Models\RequestPlayerTeam;
use App\Repositories\Request\RequestPlayerTeamRepository;
use Illuminate\Support\Facades\DB;

class TeamAggregate
{
    protected TeamRepository $teamRepository;

    public function __construct(TeamRepository $teamRepository) {
        $this->teamRepository = $teamRepository;
    }

    public function creatTeam(array $data): Team
    {
        DB::beginTransaction();
        try {
            $userIds = $data['user_ids'];
            $data = [
                'title' => $data['title'],
                'sport_type_id' => $data['sport_type_id'],
                'city_id' => $data['city_id'],
                'gender' => $data['gender'],
                'max_player' => $data['max_player'],
                'min_player' => $data['min_player'],
                'team_status' => 'active',
                'player_count' => count($data['user_ids'] ?? []), // Initial player count
            ];
            $team = $this->teamRepository->create($data);
            $this->insertRequestPlayerTeam( $userIds, $team, $data );

            DB::commit();
            session()->forget('team_create_selected_players');

            return $team;
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();
            throw $e; // Re-throw the exception after rolling back
        }
    }

    protected function insertRequestPlayerTeam( array $userIds, Team $createdTeam, array $params ) : void
    {
        foreach ($userIds as $userId) {
            $requestArray[] = [
                'id' => Str::uuid()->toString(),
                'requested_user_id' => $userId,
                'team_id' => $createdTeam->id,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'type' => RequestTypeEnum::INVITE->value,
                'title' => $params['request_title'] ?? 'Come to team',
            ];
        }

        (new RequestPlayerTeamRepository(new RequestPlayerTeam()))->insert($requestArray);
    }
}
