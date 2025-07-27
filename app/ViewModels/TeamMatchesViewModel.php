<?php

namespace App\ViewModels;

use App\Http\Resources\MatchResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Services\AccessServices\TeamAccessService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class TeamMatchesViewModel
{
    public function __construct(
        protected Team $team,
        protected LengthAwarePaginator $matches,
        protected TeamAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();
        return [
            'team' => TeamResource::make($this->team),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->team),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
            'matches' => MatchResource::collection($this->matches)->response()->getData(true),
        ];
    }
}
