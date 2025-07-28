<?php

namespace App\ViewModels\Match;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\TeamResource;
use App\Models\Activity;
use App\Models\Matches;
use App\Services\AccessServices\MatchAccessService;
use Illuminate\Http\Request;

class MatchActivitiesViewModel
{
    public function __construct(
        protected Matches $match,
        protected MatchAccessService $accessService,
    ) {}

    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $request->merge([
            'subject_id' => $this->match->id,
            'subject_type' => 'Matches',
        ]);
        $activities =  Activity::filterBy($request->all(), []);
        return [
            'match' => MatchResource::make($this->match),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->match),
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
            'activities' => ActivityResource::collection($activities)->response()->getData(true),
        ];
    }
}
