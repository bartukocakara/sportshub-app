<?php

namespace App\Http\Controllers;

use App\Services\MatchDetailService;
use Illuminate\Http\Request;

class MatchDetailController extends Controller
{
    protected MatchDetailService $matchDetailService;

    /**
     * Constructor to inject MatchDetailService.
     *
     * @param MatchDetailService $matchDetailService
     */
    public function __construct(MatchDetailService $matchDetailService)
    {
        $this->matchDetailService = $matchDetailService;
    }

    /**
     * Displays the match profile overview.
     *
     * @param string $id The match ID.
     * @return \Illuminate\View\View
     */
    public function profile($id)
    {
        $datas = $this->matchDetailService->getMatchProfileData($id);
        return view('matches.show.profile', compact('datas'));
    }

    /**
     * Displays the match's teams.
     *
     * @param string $id The match ID.
     * @return \Illuminate\View\View
     */
    public function teams(Request $request, string $id)
    {
        // Example: Fetch match's teams data using the service
        $datas = $this->matchDetailService->getMatchTeamsData($request, $id); // You'll create this method

        return view('matches.show.teams', compact('datas'));
    }

    /**
     * Displays the match's activities.
     *
     * @param string $id The match ID.
     * @return \Illuminate\View\View
     */
    public function activities(Request $request, string $id)
    {
        // Example: Fetch match's activities data using the service
        $datas = $this->matchDetailService->getMatchActivitiesData($request, $id); // You'll create this method
        return view('matches.show.activities', compact('datas'));
    }

    /**
     * Displays the match's announcements.
     *
     * @param string $id The match ID.
     * @return \Illuminate\View\View
     */
    public function announcements(Request $request, string $id)
    {
        $datas = $this->matchDetailService->getMatchAnnouncementsData($request, $id); // You'll create this method

        return view('matches.show.announcements', compact('datas'));
    }
}
