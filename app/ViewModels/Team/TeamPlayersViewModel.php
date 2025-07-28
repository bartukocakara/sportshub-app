<?php

namespace App\ViewModels\Team;

use App\Http\Resources\PlayerTeamResource;
use App\Models\Team;
use App\Services\AccessServices\TeamAccessService;

class TeamPlayersViewModel
{
    public function __construct(
        protected Team $team,
        protected TeamAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();
        return [
            'users' => PlayerTeamResource::collection($this->team->playerTeams()->whereNotIn('user_id', [$user->id])->get()),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
        ];
    }
}
