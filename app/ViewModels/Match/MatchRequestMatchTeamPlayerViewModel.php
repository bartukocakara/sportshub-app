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
        $groupedRequests = $requestMatchTeamPlayers->groupBy('match_team_id');
        $teamsWithRequestedPlayers = $groupedRequests->map(function ($teamRequestsForThisGroup, $teamId) {
            $matchTeam = $teamRequestsForThisGroup->first()->matchTeam;
            return [
                'id' => $teamId,
                'title' => $matchTeam->title, // Access the team's title
                'players' => RequestMatchTeamPlayerResource::collection($teamRequestsForThisGroup), // Apply resource to players in this group
            ];
        })->values(); // Use values() to reset keys if you want a simple array of groups
    
        return [
            'grouped_requested_players_by_team' => $teamsWithRequestedPlayers,
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->match),
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
        ];
    }
}
