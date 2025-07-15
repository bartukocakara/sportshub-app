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
            $users = $data['users'];
            unset($params['users']);
            $team = $this->teamRepository->create($data);
            $this->insertRequestPlayerTeam( $users, $team, $data );
            DB::commit();
            return $team;
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();
            throw $e; // Re-throw the exception after rolling back
        }
    }

    protected function insertRequestPlayerTeam( array $users, Team $createdTeam, array $params ) : void
    {
        foreach ($users as $value) {
            $requestArray[] = [
                'id' => Str::uuid()->toString(),
                'requested_user_id' => $value['user_id'],
                'team_id' => $createdTeam->id,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'type' => RequestTypeEnum::INVITE->value,
                'title' => $params['request_title'] ?? 'Come to team',
            ];
        }

        (new RequestPlayerTeamRepository(new RequestPlayerTeam()))->insert($requestArray);
    }
}
