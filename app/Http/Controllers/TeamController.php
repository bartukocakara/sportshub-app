<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
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
        $datas = $this->teamService->index($request, ['user']);
        return view('teams.index', compact('datas'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  MatchRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MatchRequest $request)
    {
        $this->teamService->store($request->validated());
        return redirect()->route('teams.index')->with('success', 'Team created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $data = $this->teamService->show($id);
        return view('teams.show', compact('data'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $data = $this->teamService->show($id);
        return view('teams.edit', compact('data'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  MatchRequest $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MatchRequest $request, string $id) : RedirectResponse
    {
        $this->teamService->update($request->validated(), $id);
        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->teamService->destroy($id);
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}
