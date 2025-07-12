<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MeService;

class MeController extends Controller
{
    protected MeService $meService;

    /**
     * Constructor to inject MeService.
     *
     * @param MeService $meService
     */
    public function __construct(MeService $meService)
    {
        $this->meService = $meService;
    }

    /**
     * Displays the user profile overview.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $datas = $this->meService->getMyProfileData();
        return view('me.profile', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function teams(Request $request)
    {
        // Example: Fetch user's teams data using the service
        $datas = $this->meService->getMyTeamsData($request); // You'll create this method

        return view('me.teams', compact('datas'));
    }

    /**
     * Displays the user's matches.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function matches(Request $request)
    {
        $datas = $this->meService->getUserMatchesData($request); // You'll create this method

        return view('me.matches', compact('datas'));
    }

    /**
     * Displays the user's activities.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function activities(Request $request)
    {
        // Example: Fetch user's activities data using the service
        $datas = $this->meService->getUserActivitiesData($request); // You'll create this method
        return view('me.activities', compact('datas'));
    }

    /**
     * Displays the user's announcements.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function announcements(Request $request)
    {
        // Example: Fetch user's announcements data using the service
        $datas = $this->meService->getUserAnnouncementsData($request); // You'll create this method

        return view('me.announcements', compact('datas'));
    }
}
