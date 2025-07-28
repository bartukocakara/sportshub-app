<?php

namespace App\ViewModels\Team;

use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\Models\Team;
use App\Services\AccessServices\TeamAccessService;
use Illuminate\Pagination\LengthAwarePaginator;

class TeamNotInPlayersViewModel
{
    public function __construct(
        protected Team $team,
        protected LengthAwarePaginator $users,
        protected array $exceptIds,
        protected TeamAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();

        return [
            'team' => TeamResource::make($this->team),
            'users' => UserResource::collection($this->users)->response()->getData(true),
            'except_ids' => $this->exceptIds,
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
        ];
    }
}
