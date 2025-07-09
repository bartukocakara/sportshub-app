<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
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
        $datas['id'] = $userId;
        return $datas; // Use a UserResource to format the data
    }

    /**
     * Get user's teams data.
     *
     * @param string $userId
     * @return array
     */
    public function getUserTeamsData(string $userId): array
    {
        $datas = [];
        $datas['user'] = $this->userRepository->find($userId);
        if ($datas['user']) {
            $datas['teams'] = $datas['user']->teams->toArray();
        }
        return $datas;
    }

    /**
     * Get user's matches data.
     *
     * @param string $userId
     * @return array
     */
    public function getUserMatchesData(string $userId): array
    {
        // Example: Fetch matches associated with the user
        $user = $this->userRepository->find($userId);
        if ($user) {
            return $user->matches->toArray(); // Assuming a 'matches' relationship on User model
        }
        return [];
    }

    /**
     * Get user's activities data.
     *
     * @param string $userId
     * @return array
     */
    public function getUserActivitiesData(string $userId): array
    {
        // Example: Fetch activities associated with the user
        $user = $this->userRepository->find($userId);
        if ($user) {
            return $user->activities->toArray(); // Assuming an 'activities' relationship
        }
        return [];
    }

    /**
     * Get user's announcements data.
     *
     * @param string $userId
     * @return array
     */
    public function getUserAnnouncementsData(string $userId): array
    {
        // Example: Fetch announcements relevant to the user
        $user = $this->userRepository->find($userId);
        if ($user) {
            return $user->announcements->toArray(); // Assuming an 'announcements' relationship
        }
        return [];
    }
}
