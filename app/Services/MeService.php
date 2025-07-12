<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\AnnouncementResource;
use App\Repositories\UserRepository;
use App\Repositories\TeamRepository;
use App\Repositories\MatchRepository;
use App\Repositories\ActivityRepository;
use App\Repositories\AnnouncementRepository;

class MeService
{
    protected UserRepository $userRepository;
    protected TeamRepository $teamRepository;
    protected MatchRepository $matchRepository;
    protected ActivityRepository $activityRepository;
    protected AnnouncementRepository $announcementRepository;
    protected MetaDataService $metaDataService;

    /**
     * __construct
     * @param MetaDataService $metaDataService The service for metadata operations.
     * @param UserRepository $userRepository The repository for user operations.
     * @param TeamRepository $teamRepository The repository for team operations.
     * @param MatchRepository $matchRepository The repository for match operations.
     * @param ActivityRepository $activityRepository The repository for match operations.
     * @param AnnouncementRepository $announcementRepository The repository for match operations.
     * @return void
     */
    public function __construct(
        UserRepository $userRepository,
        TeamRepository $teamRepository,
        MatchRepository $matchRepository,
        ActivityRepository $activityRepository,
        AnnouncementRepository $announcementRepository,
        MetaDataService $metaDataService,
    ) {
        $this->userRepository = $userRepository;
        $this->teamRepository = $teamRepository;
        $this->matchRepository = $matchRepository;
        $this->activityRepository = $activityRepository;
        $this->announcementRepository = $announcementRepository;
        $this->metaDataService = $metaDataService;
    }

    /**
     * Get user profile data.
     *
     * @param string $userId
     * @return array
     */
    public function getMyProfileData(): array
    {
        return [
            'user' => UserResource::make($this->userRepository->find(auth()->user()->id)),
        ];
    }

    /**
     * Get user's teams data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getMyTeamsData(Request $request): array
    {
        $request->merge(['user_id' => auth()->user()->id]); // filtreleme ihtiyacına göre eklenebilir

        return [
            'teams' => TeamResource::collection(
                $this->teamRepository->all($request, ['users'], false)
            )->response()->getData(true),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    /**
     * Get user's matches data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getUserMatchesData(Request $request): array
    {
        $request->merge(['user_id' => auth()->user()->id]);

        return [
            'matches' => MatchResource::collection(
                $this->matchRepository->all($request, [], false)
            )->response()->getData(true),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    /**
     * Get user's activities data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getUserActivitiesData(Request $request): array
    {
        $request->merge(['causer_id' => auth()->user()->id]);

        return [
            'activities' => ActivityResource::collection(
                $this->activityRepository->all($request, ['subject'], false)
            )->response()->getData(true),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    /**
     * Get user's announcements data.
     *
     * @param Request $request
     * @param string $userId
     * @return array
     */
    public function getUserAnnouncementsData(Request $request): array
    {
        $request->merge(['created_user_id' => auth()->user()->id]);

        return [
            'announcements' => AnnouncementResource::collection(
                $this->announcementRepository->all($request, ['user'], false)
            )->response()->getData(true),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }
}
