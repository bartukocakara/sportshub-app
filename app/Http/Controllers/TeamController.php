<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Services\TeamService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamController extends Controller
{
    private TeamService $teamService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  TeamService $teamService
     * @return void
     */
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $datas = $this->teamService->index($request, ['users', 'city', 'sportType', 'statusDefinition']);

        return view('teams.index', compact('datas'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $datas = $this->teamService->create($request);
        return view('teams.create.index', compact('datas'));
    }

    public function updateSelectedPlayers(Request $request)
    {
        $selected = $request->input('selected', []);
        $key = $request->input('key', 'selected_players'); // Default session key
        $validated = collect($selected)->map(function ($player) {
            return [
                'id' => $player['id'],
                'first_name' => $player['first_name'],
                'last_name' => $player['last_name'],
                'avatar' => $player['avatar'] ?? null,
            ];
        })->all();

        session()->put($key, $validated);

        return response()->json(['status' => 'ok']);
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  TeamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamRequest $request)
    {
        try {
            $this->teamService->store($request->validated());

            return redirect()->route('teams.index')
                            ->with('success', __('messages.team_created_successfully'));
        } catch (\Throwable $e) {
            logger()->error($e);

            return redirect()->back()
                            ->withInput()
                            ->with('error', __('messages.failed_to_create_team'));
    }
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(Request $request, string $id) : View
    {
        $data = $this->teamService->profile($request, $id, ['sportType', 'city', 'statusDefinition']);
        return view('teams.profile.index', compact('data'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  TeamRequest $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeamRequest $request, string $id) : RedirectResponse
    {
        $this->teamService->update($request->validated(), $id);

        return redirect()->back()->with('success', __('messages.team_updated_successfully'));
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        return $this->teamService->delete($id);
    }
}
