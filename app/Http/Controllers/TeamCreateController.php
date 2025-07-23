<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TeamCreateService; // Assuming your service is in App\Services

class TeamCreateController extends Controller
{
    protected $teamCreateService;

    public function __construct(TeamCreateService $teamCreateService)
    {
        $this->teamCreateService = $teamCreateService;
    }

    /**
     * Display a listing of sport types.
     */
    public function listSportTypes(Request $request)
    {
        // Example: Get sport types from service or directly from a model
        $datas = $this->teamCreateService->getAvailableSportTypes();
        return view('teams.create.sport-types', compact('datas'));
    }

    /**
     * Store the selected sport type in the session.
     */
    public function storeSportType(Request $request)
    {
        $request->validate([
            'sport_type_id' => 'required|exists:sport_types,id',
        ]);
        $this->teamCreateService->setSportType($request->input('sport_type_id'));

        return redirect()->route('teams.create.city');
    }

    /**
     * Display a listing of cities.
     */
    public function listCities(Request $request)
    {
        // Example: Get cities from service
        $datas = $this->teamCreateService->getAvailableCities();
        return view('teams.create.cities', compact('datas'));
    }

    /**
     * Store the selected city in the session.
     */
    public function storeCity(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
        ]);

        $this->teamCreateService->setCity($request->input('city_id'));
        return redirect()->route('teams.create.players');
    }

    /**
     * Display the form to list and select players.
     */
    public function listPlayers(Request $request)
    {
        // Example: Get available players based on selected sport type, if applicable
        $datas = $this->teamCreateService->getAvailablePlayers($request);
        return view('teams.create.players', compact('datas'));
    }

    /**
     * Store the selected players in the session.
     */
    public function storePlayers(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $this->teamCreateService->setPlayers($request->input('user_ids'));

        return redirect()->route('teams.create.fill-details');
    }

    /**
     * Display the form to fill in team details (e.g., team name, logo).
     */
    public function fillDetails(Request $request)
    {
        // Retrieve any previously entered details from the session
        $datas = $this->teamCreateService->getAllTeamData();
        return view('teams.create.fill-details', compact('datas'));
    }

    /**
     * Store the team details in the session.
     */
    public function storeDetails(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $details = $request->only(['title']);
        $this->teamCreateService->setTeamDetails($details);

        return redirect()->route('teams.create.confirm-details');
    }

    /**
     * Display the confirmation page with all collected details.
     */
    public function confirmDetails(Request $request)
    {
        $datas = $this->teamCreateService->getAllTeamData();
        if (empty($datas)) {
            // Redirect if session data is missing, maybe to the first step
            return redirect()->route('teams.create.sport-type')->with('error', __('messages.team_creation_start_prompt'));
        }
        return view('teams.create.confirm-details', compact('datas'));
    }

    /**
     * Display the final creation form (optional, could be merged with confirm-details).
     */
    public function create(Request $request)
    {
        $teamData = $this->teamCreateService->getAllTeamData();
        if (empty($teamData)) {
            return redirect()->route('teams.sport-type')->with('error', 'Please start the team creation process.');
        }
        return view('teams.create.confirm-details', compact('teamData'));
    }

    /**
     * Store the final team data in the database.
     */
    public function store(Request $request)
    {
        try {
            $team = $this->teamCreateService->createTeamFromSession();
            // Clear session data after successful creation
            $this->teamCreateService->clearSession();
            return redirect()->route('teams.show', $team->id)->with('success', 'Team created successfully!');
        } catch (\Exception $e) {
            // Handle error, redirect back with input
            return redirect()->back()->withInput()->with('error', 'Failed to create team: ' . $e->getMessage());
        }
    }
}
