<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerTeamRequest;
use App\Services\PlayerTeamService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PlayerTeamController extends Controller
{
    private PlayerTeamService $playerTeamService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  PlayerTeamService $playerTeamService
     * @return void
     */
    public function __construct(PlayerTeamService $playerTeamService)
    {
        $this->playerTeamService = $playerTeamService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) : View
    {
        $items = $this->playerTeamService->all($request);
        return view('PlayerTeams.index', compact('items'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('PlayerTeams.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  PlayerTeamRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PlayerTeamRequest $request) : RedirectResponse
    {
        $this->playerTeamService->store($request->validated());
        return redirect()->route('PlayerTeams.index')->with('success', 'PlayerTeam created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $data = $this->playerTeamService->show($id);
        return view('PlayerTeams.show', compact('data'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $data = $this->playerTeamService->show($id);
        return view('PlayerTeams.edit', compact('data'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  PlayerTeamRequest $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PlayerTeamRequest $request, string $id) : RedirectResponse
    {
        $this->playerTeamService->update($request->validated(), $id);
        return redirect()->route('PlayerTeams.index')->with('success', 'PlayerTeam updated successfully.');
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->playerTeamService->destroy($id);
        return redirect()->route('PlayerTeams.index')->with('success', 'PlayerTeam deleted successfully.');
    }
}
