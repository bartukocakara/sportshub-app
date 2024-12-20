<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtBusinessRequest;
use App\Services\CourtBusinessService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CourtBusinessController extends Controller
{
    private CourtBusinessService $courtBusinessService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CourtBusinessService $courtBusinessService
     * @return void
     */
    public function __construct(CourtBusinessService $courtBusinessService)
    {
        $this->courtBusinessService = $courtBusinessService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $courtBusinesses = $this->courtBusinessService->all($request);
        return view('courtBusinesses.index', compact('courtBusinesses'));
    }

    /**
     * Yeni bir kaynak oluşturma formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('courtBusinesses.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CourtBusinessRequest $request
     * @return RedirectResponse
     */
    public function store(CourtBusinessRequest $request): RedirectResponse
    {
        $this->courtBusinessService->store($request->validated());
        return redirect()->route('courtBusinesses.index')->with('success', 'Court Business created successfully.');
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $courtBusiness = $this->courtBusinessService->show($id);
        return view('courtBusinesses.show.index', compact('courtBusiness'));
    }

    /**
     * Kaynağı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $courtBusiness = $this->courtBusinessService->show($id);
        return view('courtBusinesses.edit', compact('courtBusiness'));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CourtBusinessRequest $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(CourtBusinessRequest $request, string $id): RedirectResponse
    {
        $this->courtBusinessService->update($request->validated(), $id);
        return redirect()->route('courtBusinesses.index')->with('success', 'Court Business updated successfully.');
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->courtBusinessService->destroy($id);
        return redirect()->route('courtBusinesses.index')->with('success', 'Court Business deleted successfully.');
    }
}
