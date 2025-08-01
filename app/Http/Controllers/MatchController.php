<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Services\MatchService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MatchController extends Controller
{
    private MatchService $matchService;

    private array $relations = ['statusDefinition', 'sportType', 'court.courtImages', 'court.courtAddress.city', 'matchTeams.matchTeamPlayers'];

    /**
     * Service interface tanımlanıyor.
     *
     * @param  MatchService $matchService
     * @return void
     */
    public function __construct(MatchService $matchService)
    {
        $this->matchService = $matchService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $datas = $this->matchService->index($request, $this->relations, false);
        return view('matches.index', compact('datas'));
    }

    /**
     * Yeni bir kaynağın formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $datas = $this->matchService->create();
        return view('matches.create.index', compact('datas'));
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  MatchRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MatchRequest $request)
    {
        $this->matchService->store($request->validated());
        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }

    /**
     * Belirli bir kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $data = $this->matchService->show($id);
        return view('matches.show.index', compact('data'));
    }

    /**
     * Belirli bir kaynağı düzenleme formunu görüntülemek için kullanılır.
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $data = $this->matchService->show($id);
        return view('matches.edit', compact('data'));
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
        $this->matchService->update($request->validated(), $id);
        return redirect()->back()->with('success', __('messages.match_updated_successfully'));
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        return $this->matchService->delete($id);
    }
}
