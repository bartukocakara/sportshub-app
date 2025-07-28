<?php

namespace App\ViewModels\Match;

use App\Http\Resources\MatchTeamPlayerResource;
use App\Models\Matches;
use App\Services\AccessServices\MatchAccessService;

class MatchPlayersViewModel
{
    public function __construct(
        protected Matches $match,
        protected MatchAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();
        return [
            'users' => MatchTeamPlayerResource::collection($this->match->matchTeams()->whereNotIn('user_id', [$user->id])->matchTeamPlayers()->get()),
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
        ];
    }
}
