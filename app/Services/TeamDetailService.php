<?php

namespace App\Services;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Matches;
use App\Models\Team;
use App\Models\User;
use App\Repositories\ActivityRepository;
use App\Repositories\AnnouncementRepository;
use App\Repositories\CityRepository;
use App\Repositories\MatchRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class TeamDetailService extends CrudService
{
    protected TeamRepository $teamRepository;
    protected MetaDataService $metaDataService;

    /**
     * @param TeamRepository $teamRepository
     * @param MetaDataService $metaDataService
     * @return void
     */
    public function __construct(
        TeamRepository $teamRepository,
        MetaDataService $metaDataService
    )
    {
        $this->teamRepository = $teamRepository;
        $this->metaDataService = $metaDataService;
        // $this->cityRepository = $cityRepository; // Uncomment if needed
        // $this->sportTypeRepository = $sportTypeRepository; // Uncomment if needed

        parent::__construct($this->teamRepository); // Keep if Crud operations are handled here
    }

    /**
     * Get user profile data.
     *
     * @param string $userId
     * @return mixed
     */
    public function getTeamProfileData(string $userId):array
    {
        $datas['user'] = UserResource::make($this->teamRepository->find($userId));
        return $datas;
    }

    /**
     * Get user's teams data.
     *
     * @param string $userId
     * @return array
     */
    public function getTeamPlayersData(Request $request, string $teamId): array
    {
        $datas = [];
        $request->merge(['team_id' => $teamId]);
        $datas['users'] = UserResource::collection((new UserRepository(new User()))->all($request, [], false))->response()->getData(true);
        $datas['cities']  = $this->metaDataService->getCitiesByRequest();
        $datas['sport_types'] = $this->metaDataService->getSportTypes();

        return $datas;
    }

    /**
     * Get user's matches data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getTeamMatchesData(Request $request, string $teamId): array
    {
        $datas['matches'] = MatchResource::collection((new MatchRepository(new Matches()))->all($request, [], false))->response()->getData(true);
        $datas['cities']  = $this->metaDataService->getCitiesByRequest();
        $datas['sport_types'] = $this->metaDataService->getSportTypes();

        return $datas;
    }

    /**
     * Get user's activities data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getTeamActivitiesData(Request $request, string $teamId): array
    {
        // $request->merge(['causer_id' => $userId]);
        $relations = ['subject'];
        $datas['activities'] = ActivityResource::collection((new ActivityRepository(new Activity()))->all($request, $relations, false))->response()->getData(true);
        $datas['cities']     = $this->metaDataService->getCitiesByRequest();
        $datas['sport_types'] = $this->metaDataService->getSportTypes();

        return $datas;
    }

    /**
     * Get user's announcements data.
     *
     * @param Request $request
     * @param string $teamId
     * @return array
     */
    public function getTeamAnnouncementsData(Request $request, string $teamId): array
    {
        // $request->merge(['created_user_id' => $userId]);
        $datas['announcements'] = AnnouncementResource::collection((new AnnouncementRepository(new Announcement()))->all($request, ['user'], false))->response()->getData(true);
        $datas['sport_types'] = $this->metaDataService->getSportTypes();
        $datas['cities']     = $this->metaDataService->getCitiesByRequest();

        return $datas;
    }
}
