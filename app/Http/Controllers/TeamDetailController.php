<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamDetailService; // Import your service

class TeamDetailController extends Controller
{
    protected TeamDetailService $teamDetailService;

    /**
     * Constructor to inject TeamDetailService.
     *
     * @param TeamDetailService $teamDetailService
     */
    public function __construct(TeamDetailService $teamDetailService)
    {
        $this->teamDetailService = $teamDetailService;
    }

    /**
     * Displays the user profile overview.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function profile($id)
    {
        $datas = $this->teamDetailService->getTeamProfileData($id, ['city', 'sportType', 'statusDefinition', 'requestPlayerTeams']);
        return view('teams.show.profile', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function requestedPlayers(Request $request, string $id)
    {
        // Example: Fetch user's teams data using the service
        $datas = $this->teamDetailService->getRequestedTeamPlayersData($request, $id); // You'll create this method

        return view('teams.show.players.requested-players', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function players(Request $request, string $id)
    {
        // Example: Fetch user's teams data using the service
        $datas = $this->teamDetailService->getTeamPlayersData($request, $id); // You'll create this method

        return view('teams.show.players.players', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function getNotInTeamPlayersData(Request $request, string $id)
    {
        // Example: Fetch user's teams data using the service
        $datas = $this->teamDetailService->getNotInTeamPlayersData($request, $id); // You'll create this method

        return view('teams.show.players.new-players', compact('datas'));
    }

    /**
     * Displays the user's matches.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function matches(Request $request, string $id)
    {
        $datas = $this->teamDetailService->getTeamMatchesData($request, $id); // You'll create this method

        return view('teams.show.matches', compact('datas'));
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
        $datas = $this->teamDetailService->getTeamActivitiesData($request, $id); // You'll create this method
        return view('teams.show.activities', compact('datas'));
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
        $datas = $this->teamDetailService->getTeamAnnouncementsData($request, $id); // You'll create this method

        return view('teams.show.announcements', compact('datas'));
    }
}
