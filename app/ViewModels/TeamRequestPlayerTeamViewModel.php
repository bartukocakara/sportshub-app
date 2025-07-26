<?php

namespace App\ViewModels;

use App\Enums\Request\RequestStatusEnum;
use App\Http\Resources\Request\RequestPlayerTeamResource;
use App\Models\Team;
use App\Services\AccessServices\TeamAccessService;
use Illuminate\Http\Request;

class TeamRequestPlayerTeamViewModel
{
    public function __construct(
        protected Team $team,
        protected TeamAccessService $accessService,
        protected string $type
    ) {}

    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $request->merge([
            'subject_id' => $this->team->id,
            'subject_type' => 'Team',
        ]);
        $requestPlayerTeams = $this->team->requestPlayerTeams()->where([
            'type' => $this->type,
            'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value
            ])->get();
        return [
            'request_player_teams' => RequestPlayerTeamResource::collection($requestPlayerTeams),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
        ];
    }
}
