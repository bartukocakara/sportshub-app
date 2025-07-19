<?php

namespace App\ViewModels;

use App\Enums\UserTeamStatusEnum;
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
        return [
            'team' => TeamResource::make($this->team),
            'cities' => $this->metaDataService->getCitiesByRequest(),
            'sport_types' => $this->metaDataService->getSportTypes(),

            'user_status' => $this->accessService->getUserRequestStatus($user, $this->team),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
            'request_id' => $this->accessService->getUserTeamRequest($user, $this->team)?->id,
        ];
    }
}
