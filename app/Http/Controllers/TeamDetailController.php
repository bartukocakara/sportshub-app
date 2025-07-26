<?php

namespace App\Http\Controllers;

use App\Enums\TypeEnums\RequestTypeEnum;
use Illuminate\Http\Request;
use App\Services\TeamDetailService; // Import your service
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;

class TeamDetailController extends Controller
{
    use AuthorizesRequests;

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
     * @param Request $request
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function profile(Request $request, string $id)
    {
        $datas = $this->teamDetailService->getTeamProfileData($request, $id, ['city', 'sportType', 'statusDefinition', 'requestPlayerTeams']);
        return view('teams.show.profile', compact('datas'));
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function getRequestPlayerTeamsInviteData(Request $request, string $id)
    {
        $team = $this->teamDetailService->getTeamById($id); // You must implement this
        $this->authorize('viewRequestedPlayers', $team);

        $datas = $this->teamDetailService->getRequestPlayerTeamsData($request, $id, 'invite'); // You'll create this method

        return view('teams.show.players.invited-players', compact('datas'));
    }

    public function deleteRequestPlayerTeamsData(string $id, string $requestId)
    {
        $team = $this->teamDetailService->getTeamById($id);
        $this->authorize('deleteRequestPlayerTeam', $team);

        return $this->teamDetailService->deleteRequestPlayerTeamsData($requestId);
    }



    public function acceptRequestPlayerTeamData(string $id, string $requestId): RedirectResponse
    {
        return $this->teamDetailService->acceptRequestPlayer($requestId);
    }

    public function rejectRequestPlayerTeamData(string $id, string $requestId): RedirectResponse
    {
        return $this->teamDetailService->rejectRequestPlayer($requestId);
    }

    /**
     * Displays the user's teams.
     *
     * @param string $id The user ID.
     * @return \Illuminate\View\View
     */
    public function getRequestPlayerTeamsJoinData(Request $request, string $id)
    {
        $team = $this->teamDetailService->getTeamById($id);
        $this->authorize('viewRequestedPlayers', $team);
        $datas = $this->teamDetailService->getRequestPlayerTeamsData($request, $id, 'join');

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
        $datas = $this->teamDetailService->getPlayerTeamsData($request, $id); // You'll create this method
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
        $datas = $this->teamDetailService->getNotInTeamPlayersData($id);
        return view('teams.show.players.new-players', compact('datas'));
    }

    public function destroyPlayer(string $id, string $playerTeamId)
    {
        return $this->teamDetailService->destroyPlayer($playerTeamId);
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
}
