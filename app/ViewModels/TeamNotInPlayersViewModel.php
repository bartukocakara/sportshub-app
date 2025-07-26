<?php

namespace App\ViewModels;

use App\Http\Resources\UserResource;
use App\Models\Team;
use App\Services\AccessServices\TeamAccessService;

class TeamNotInPlayersViewModel
{
    public function __construct(
        protected Team $team,
        protected TeamAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();
        return [
            'users' => UserResource::collection($this->team->users()->whereNotIn('user_id', [$user->id])->get()),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
        ];
    }
}
