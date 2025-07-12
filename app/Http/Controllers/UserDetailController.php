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
     * @param string $id The user ID.
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
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function teams(Request $request, string $id)
    {
        // Example: Fetch user's teams data using the service
        $datas = $this->userDetailService->getUserTeamsData($request, $id); // You'll create this method

        return view('users.show.teams', compact('datas'));
    }

    /**
     * Displays the user's matches.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function matches(Request $request, string $id)
    {
        $datas = $this->userDetailService->getUserMatchesData($request, $id); // You'll create this method

        return view('users.show.matches', compact('datas'));
    }

    /**
     * Displays the user's activities.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function activities(Request $request, string $id)
    {
        // Example: Fetch user's activities data using the service
        $datas = $this->userDetailService->getUserActivitiesData($request, $id); // You'll create this method
        return view('users.show.activities', compact('datas'));
    }

    /**
     * Displays the user's announcements.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function announcements(Request $request, string $id)
    {
        // Example: Fetch user's announcements data using the service
        $datas = $this->userDetailService->getUserAnnouncementsData($request, $id); // You'll create this method

        return view('users.show.announcements', compact('datas'));
    }
}
