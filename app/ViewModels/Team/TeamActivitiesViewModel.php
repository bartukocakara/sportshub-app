<?php

namespace App\ViewModels\Team;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\TeamResource;
use App\Models\Activity;
use App\Models\Team;
use App\Services\AccessServices\TeamAccessService;
use Illuminate\Http\Request;

class TeamActivitiesViewModel
{
    public function __construct(
        protected Team $team,
        protected TeamAccessService $accessService,
    ) {}

    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $request->merge([
            'subject_id' => $this->team->id,
            'subject_type' => 'Team',
        ]);
        $activities =  Activity::filterBy($request->all(), []);
        return [
            'team' => TeamResource::make($this->team),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
            'activities' => ActivityResource::collection($activities)->response()->getData(true),
        ];
    }
}
