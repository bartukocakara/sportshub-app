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
use App\Repositories\ActivityRepository;
use App\Repositories\AnnouncementRepository;
use App\Repositories\CityRepository;
use App\Repositories\MatchRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserDetailService extends CrudService
{
    protected UserRepository $userRepository;
    protected CityRepository $cityRepository; // You might need these later, but for now, we'll focus on User
    protected SportTypeRepository $sportTypeRepository; // You might need these later

    /**
     * @param UserRepository $userRepository
     * @param CityRepository $cityRepository // Inject if you need them
     * @param SportTypeRepository $sportTypeRepository // Inject if you need them
     * @return void
     */
    public function __construct(
        UserRepository $userRepository
        // , CityRepository $cityRepository, // Uncomment if needed
        // SportTypeRepository $sportTypeRepository // Uncomment if needed
    )
    {
        $this->userRepository = $userRepository;
        // $this->cityRepository = $cityRepository; // Uncomment if needed
        // $this->sportTypeRepository = $sportTypeRepository; // Uncomment if needed

        parent::__construct($this->userRepository); // Keep if Crud operations are handled here
    }

    /**
     * Get user profile data.
     *
     * @param string $userId
     * @return mixed
     */
    public function getUserProfileData(string $userId):array
    {
        $datas['user'] = UserResource::make($this->userRepository->find($userId));
        return $datas;
    }

    /**
     * Get user's teams data.
     *
     * @param string $userId
     * @return array
     */
    public function getUserTeamsData(Request $request, string $userId): array
    {
        $datas = [];
        $datas['teams'] = TeamResource::collection((new TeamRepository(new Team()))->all($request, ['users'], false))->response()->getData(true);

        return $datas;
    }

    /**
     * Get user's matches data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getUserMatchesData(Request $request, string $userId): array
    {
        $datas['matches'] = MatchResource::collection((new MatchRepository(new Matches()))->all($request, [], false))->response()->getData(true);
        return $datas;
    }

    /**
     * Get user's activities data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getUserActivitiesData(Request $request, string $userId): array
    {
        // $request->merge(['causer_id' => $userId]);
        $relations = ['subject'];
        $datas['activities'] = ActivityResource::collection((new ActivityRepository(new Activity()))->all($request, $relations, false))->response()->getData(true);
        return $datas;
    }

    /**
     * Get user's announcements data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getUserAnnouncementsData(Request $request, string $userId): array
    {
        // $request->merge(['created_user_id' => $userId]);
        $datas['announcements'] = AnnouncementResource::collection((new AnnouncementRepository(new Announcement()))->all($request, ['user'], false))->response()->getData(true);

        return $datas;
    }
}
