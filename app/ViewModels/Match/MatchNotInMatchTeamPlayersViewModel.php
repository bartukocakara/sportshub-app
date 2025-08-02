<?php

namespace App\ViewModels\Match;

use App\Http\Resources\MatchResource;
use App\Http\Resources\UserResource;
use App\Models\Matches;
use App\Services\AccessServices\MatchAccessService;
use Illuminate\Pagination\LengthAwarePaginator;

class MatchNotInMatchTeamPlayersViewModel
{
    public function __construct(
        protected Matches $match,
        protected LengthAwarePaginator $users,
        protected array $exceptIds,
        protected MatchAccessService $accessService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();

        return [
            'match' => MatchResource::make($this->match),
            'users' => UserResource::collection($this->users)->response()->getData(true),
            'except_ids' => $this->exceptIds,
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->match),
        ];
    }
}
