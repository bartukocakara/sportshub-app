<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserDetailService; // Import your service

class UserDetailController extends Controller
{
    protected UserDetailService $userDetailService;

    /**
     * Constructor to inject UserDetailService.
     *
     * @param UserDetailService $userDetailService
     */
    public function __construct(UserDetailService $userDetailService)
    {
        $this->userDetailService = $userDetailService;
    }

    /**
     * Displays the user profile overview.
     *
     * @param int $id The user ID.
     * @return \Illuminate\View\View
     */
    public function profile($id)
    {
        $datas = $this->userDetailService->getUserProfileData($id);
        return view('users.show.profile', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param int $id The user ID.
     * @return \Illuminate\View\View
     */
    public function teams($id)
    {
        // Example: Fetch user's teams data using the service
        $datas = $this->userDetailService->getUserTeamsData($id); // You'll create this method

        return view('users.show.teams', compact('datas'));
    }

    /**
     * Displays the user's matches.
     *
     * @param int $id The user ID.
     * @return \Illuminate\View\View
     */
    public function matches($id)
    {
        // Example: Fetch user's matches data using the service
        $matchesData = $this->userDetailService->getUserMatchesData($id); // You'll create this method

        return view('users.show.matches', [
            'id' => $id,
            'matchesData' => $matchesData,
            'user_id' => $id
        ]);
    }

    /**
     * Displays the user's activities.
     *
     * @param int $id The user ID.
     * @return \Illuminate\View\View
     */
    public function activities($id)
    {
        // Example: Fetch user's activities data using the service
        $activitiesData = $this->userDetailService->getUserActivitiesData($id); // You'll create this method

        return view('users.show.activities', [
            'id' => $id,
            'activitiesData' => $activitiesData,
            'user_id' => $id
        ]);
    }

    /**
     * Displays the user's announcements.
     *
     * @param int $id The user ID.
     * @return \Illuminate\View\View
     */
    public function announcements($id)
    {
        // Example: Fetch user's announcements data using the service
        $announcementsData = $this->userDetailService->getUserAnnouncementsData($id); // You'll create this method

        return view('users.show.announcements', [
            'id' => $id,
            'announcementsData' => $announcementsData,
            'user_id' => $id
        ]);
    }
}
