<?php

namespace App\ViewModels\Team;

use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\DefinitionResource;
use App\Http\Resources\TeamLeaderResource;
use App\Http\Resources\TeamResource;
use App\Models\Announcement;
use App\Models\Definition;
use App\Models\Team;
use App\Services\MetaDataService;
use App\Services\AccessServices\TeamAccessService;
use Illuminate\Http\Request;

class TeamProfileViewModel
{
    public function __construct(
        protected Team $team,
        protected TeamAccessService $accessService,
        protected MetaDataService $metaDataService,
    ) {}

    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $request->merge([
            'subject_id' => $this->team->id,
            'subject_type' => 'Team',
        ]);
        $announcements =  Announcement::filterBy($request->all(), ['teamTypeDefinition']);
        $definitions =  Definition::filterBy((new Request(['group_key' => 'team_announcement_type']))->all());
        return [
            'team' => TeamResource::make($this->team),
            'cities' => $this->metaDataService->getCitiesByRequest(),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->team),
            'user_role' => $this->accessService->getUserRole($user, $this->team),
            'is_team_leader' => $this->accessService->isTeamLeader($user, $this->team),
            'team_leaders' => TeamLeaderResource::collection($this->accessService->getTeamLeaders($this->team)),
            'request_id' => $this->accessService->getUserTeamRequest($user, $this->team)?->id,
            'is_request_receiver' => $this->accessService->isRequestReceiver($user, $this->team),
            'is_following' => $this->accessService->isFollowing($user, $this->team),
            'follow_id' => $this->accessService->getFollowId($user, $this->team),
            'announcements' => AnnouncementResource::collection($announcements)->response()->getData(true),
            'announcement_types' => DefinitionResource::collection($definitions),
        ];
    }
}
