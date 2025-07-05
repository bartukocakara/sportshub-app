<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamLeaderRequest;
use App\Services\TeamLeaderService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TeamLeaderController extends Controller
{
    private TeamLeaderService $teamLeaderService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  TeamLeaderService $teamLeaderService
     * @return void
     */
    public function __construct(TeamLeaderService $teamLeaderService)
    {
        $this->teamLeaderService = $teamLeaderService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) : View
    {
        $items = $this->teamLeaderService->all($request);
        return view('team-leaders.index', compact('items'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('team-leaders.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  TeamLeaderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TeamLeaderRequest $request) : RedirectResponse
    {
        $this->teamLeaderService->store($request->validated());
        return redirect()->route('team-leaders.index')->with('success', 'TeamLeader created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $data = $this->teamLeaderService->show($id);
        return view('team-leaders.show', compact('data'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $data = $this->teamLeaderService->show($id);
        return view('team-leaders.edit', compact('data'));
    }

    /**
     * Belirli bir kaynağı güncellemek için kullanılır.
     *
     * @param  TeamLeaderRequest $request
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TeamLeaderRequest $request, string $id) : RedirectResponse
    {
        $this->teamLeaderService->update($request->validated(), $id);
        return redirect()->route('team-leaders.index')->with('success', 'TeamLeader updated successfully.');
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        $this->teamLeaderService->destroy($id);
        return redirect()->route('team-leaders.index')->with('success', 'TeamLeader deleted successfully.');
    }
}
