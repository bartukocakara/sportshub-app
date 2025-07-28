<?php

namespace App\ViewModels\Match;

use App\Enums\Request\RequestStatusEnum;
use App\Http\Resources\Request\RequestMatchTeamPlayerResource;
use App\Http\Resources\Request\RequestPlayerTeamResource;
use App\Models\Matches;
use App\Models\Team;
use App\Services\AccessServices\MatchAccessService;
use App\Services\AccessServices\TeamAccessService;
use Illuminate\Http\Request;

class MatchRequestMatchTeamPlayerViewModel
{
    public function __construct(
        protected Matches $match,
        protected MatchAccessService $accessService,
        protected string $type
    ) {}

    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $request->merge([
            'subject_id' => $this->match->id,
            'subject_type' => 'Matches',
        ]);
        $requestMatchTeamPlayers = $this->match->requestMatchTeamPlayers()->where([
            'type' => $this->type,
            'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value
            ])->get();
        return [
            'request_match_team_players' => RequestMatchTeamPlayerResource::collection($requestMatchTeamPlayers),
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
        ];
    }
}
