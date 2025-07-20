<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FollowRequest;
use App\Services\FollowService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FollowController extends Controller
{
    private FollowService $followService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  FollowService $followService
     * @return void
     */
    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }

    /**
     * Kortları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request) : View
    {
        $follows = $this->followService->all($request);
        return view('follows.index', compact('follows'));
    }

    /**
     * Yeni bir kort oluşturma formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('follows.create');
    }

    /**
     * Yeni bir kortu kaydetmek için kullanılır.
     *
     * @param  FollowRequest $request
     * @return RedirectResponse
     */
    public function store(FollowRequest $request): RedirectResponse
    {
        return $this->followService->create($request->validated());
    }

    /**
     * Belirli bir kortu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $follow = $this->followService->show($id);
        return view('follows.show.index', compact('follow'));
    }

    /**
     * Belirli bir kortu düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $follow = $this->followService->show($id);
        return view('follows.edit', compact('follow'));
    }

    /**
     * Belirli bir kortu güncellemek için kullanılır.
     *
     * @param  FollowRequest $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(FollowRequest $request, string $id): RedirectResponse
    {
        $this->followService->update($request->validated(), $id);
        return redirect()->route('follows.index')->with('success', 'Follow updated successfully.');
    }

    /**
     * Belirli bir kortu silmek için kullanılır.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        return $this->followService->delete($id);
    }
}
