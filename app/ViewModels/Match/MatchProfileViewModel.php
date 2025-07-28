<?php

namespace App\ViewModels\Match;

use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\DefinitionResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\TeamResource;
use App\Models\Announcement;
use App\Models\Definition;
use App\Models\Matches;
use App\Services\AccessServices\MatchAccessService;
use App\Services\MetaDataService;
use Illuminate\Http\Request;

class MatchProfileViewModel
{
    public function __construct(
        protected Matches $match,
        protected MatchAccessService $accessService,
        protected MetaDataService $metaDataService,
    ) {}

    public function toArray(Request $request): array
    {
        $user = auth()->user();
        $request->merge([
            'subject_id' => $this->match->id,
            'subject_type' => 'Matches',
        ]);
        $announcements =  Announcement::filterBy($request->all(), ['matchTypeDefinition']);
        $definitions =  Definition::filterBy((new Request(['group_key' => 'match_announcement_type']))->all());
        return [
            'match' => MatchResource::make($this->match),
            'cities' => $this->metaDataService->getCitiesByRequest(),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'user_status' => $this->accessService->getUserRequestStatus($user, $this->match),
            'user_role' => $this->accessService->getUserRole($user, $this->match),
            'is_match_owner' => $this->accessService->isMatchOwner($user, $this->match),
            'request_id' => $this->accessService->getMatchTeamPlayerRequest($user, $this->match)?->id,
            'is_request_receiver' => $this->accessService->isRequestReceiver($user, $this->match),
            'announcements' => AnnouncementResource::collection($announcements)->response()->getData(true),
            'announcement_types' => DefinitionResource::collection($definitions),
        ];
    }
}
