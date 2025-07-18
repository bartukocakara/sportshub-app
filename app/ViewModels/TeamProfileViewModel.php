<?php

namespace App\ViewModels;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Services\MetaDataService;
use App\Services\AccessServices\TeamAccessService;

class TeamProfileViewModel
{
    public function __construct(
        protected Team $team,
        protected TeamAccessService $accessService,
        protected MetaDataService $metaDataService,
    ) {}

    public function toArray(): array
    {
        $user = auth()->user();
        $userStatus = $this->accessService->determineUserStatus($user, $this->team);

        return [
            'team' => TeamResource::make($this->team),
            'cities' => $this->metaDataService->getCitiesByRequest(),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'user_status' => $userStatus,
            'is_team_leader' => $userStatus === 'leader',
        ];
    }
}
