<?php

namespace App\ViewModels\Match;

use App\Http\Resources\MatchResource;
use App\Http\Resources\MatchTeamResource;
use App\Models\Matches;
use App\Services\AccessServices\MatchAccessService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MatchTeamsViewModel
{
    public function __construct(
        protected Matches $match,
        protected MatchAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();
        return [
            'match' => MatchResource::make($this->match),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->match),
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
            'match_teams' => MatchTeamResource::collection($this->match->matchTeams)->response()->getData(true),
        ];
    }
}
