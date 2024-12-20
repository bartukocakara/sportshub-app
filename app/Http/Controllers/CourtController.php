<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtRequest;
use App\Services\CourtService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CourtController extends Controller
{
    private CourtService $courtService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CourtService $courtService
     * @return void
     */
    public function __construct(CourtService $courtService)
    {
        $this->courtService = $courtService;
    }

    /**
     * Kortları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $courts = $this->courtService->all($request);
        return view('courts.index', compact('courts'));
    }

    /**
     * Yeni bir kort oluşturma formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('courts.create');
    }

    /**
     * Yeni bir kortu kaydetmek için kullanılır.
     *
     * @param  CourtRequest $request
     * @return RedirectResponse
     */
    public function store(CourtRequest $request): RedirectResponse
    {
        $this->courtService->store($request->validated());
        return redirect()->route('courts.index')->with('success', 'Court created successfully.');
    }

    /**
     * Belirli bir kortu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $court = $this->courtService->show($id);
        return view('courts.show.index', compact('court'));
    }

    /**
     * Belirli bir kortu düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $court = $this->courtService->show($id);
        return view('courts.edit', compact('court'));
    }

    /**
     * Belirli bir kortu güncellemek için kullanılır.
     *
     * @param  CourtRequest $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(CourtRequest $request, string $id): RedirectResponse
    {
        $this->courtService->update($request->validated(), $id);
        return redirect()->route('courts.index')->with('success', 'Court updated successfully.');
    }

    /**
     * Belirli bir kortu silmek için kullanılır.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->courtService->destroy($id);
        return redirect()->route('courts.index')->with('success', 'Court deleted successfully.');
    }
}
