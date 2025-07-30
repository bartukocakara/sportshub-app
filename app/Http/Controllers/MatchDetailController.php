<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MatchDetailService; // Import your service
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;

class MatchDetailController extends Controller
{
    use AuthorizesRequests;

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
     * Displays the user profile overview.
     *
     * @param Request $request
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function profile(Request $request, string $id)
    {
        $datas = $this->matchDetailService->getMatchProfileData($request, $id, [
            'matchTeams',
            'matchTeams.matchTeamPlayers',
            'court.courtAddress',
            'court.courtBusiness',
            'court.courtImages',
            'sportType',
            'statusDefinition',
            'matchOwners',
            'requestMatchTeamPlayers',
            'requestMatchTeamPlayers.receivers',
        ]);
        return view('matches.show.profile', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function getRequestMatchTeamPlayersInviteData(Request $request, string $id)
    {
        $team = $this->matchDetailService->getMatchById($id); // You must implement this
        $this->authorize('viewRequestedPlayers', $team);

        $datas = $this->matchDetailService->getRequestMatchTeamPlayerData($request, $id, 'invite'); // You'll create this method

        return view('matches.show.players.invited-players', compact('datas'));
    }

    public function deleteRequestMatchTeamPlayerData(string $id, string $requestId)
    {
        $team = $this->matchDetailService->getMatchById($id);
        $this->authorize('deleteRequestMatchTeamPlayer', $team);

        return $this->matchDetailService->deleteRequestMatchTeamPlayerData($requestId);
    }

    public function acceptRequestMatchTeamPlayerData(string $id, string $requestId): RedirectResponse
    {
        return $this->matchDetailService->acceptRequestMatchTeamPlayer($requestId);
    }

    public function rejectRequestMatchTeamPlayerData(string $id, string $requestId): RedirectResponse
    {
        return $this->matchDetailService->rejectRequestMatchTeamPlayer($requestId);
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function getRequestMatchTeamPlayersJoinData(Request $request, string $id)
    {
        $team = $this->matchDetailService->getMatchById($id);
        $this->authorize('viewRequestedPlayers', $team);
        $datas = $this->matchDetailService->getRequestMatchTeamPlayerData($request, $id, 'join');

        return view('matches.show.players.requested-players', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function players(Request $request, string $id)
    {
        $datas = $this->matchDetailService->getMatchTeamsData($request, $id); // You'll create this method
        return view('matches.show.players.players', compact('datas'));
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
        $datas = $this->matchDetailService->getNotInMatchTeamPlayersData($request, $id);
        return view('matches.show.players.new-players', compact('datas'));
    }

    public function invitePlayer(Request $request, string $id, string $userId)
    {
        return $this->matchDetailService->invitePlayer( $request, $id, $userId);
    }

    public function destroyPlayer(string $id, string $matchTeamPlayerId)
    {
        return $this->matchDetailService->destroyPlayer($matchTeamPlayerId);
    }

    /**
     * Displays the user's matches.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function teams(Request $request, string $id)
    {
        $datas = $this->matchDetailService->getMatchTeamsData($request, $id); // You'll create this method

        return view('matches.show.teams', compact('datas'));
    }

    /**
     * Displays the user's matches.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function matchTeamCreate(Request $request, string $id)
    {
        return view('matches.show.match-teams-create');
    }

    /**
     * Displays the user's activities.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function activities(Request $request, string $id)
    {
        $datas = $this->matchDetailService->getMatchActivitiesData($request, $id); // You'll create this method
        return view('matches.show.activities', compact('datas'));
    }
}
