<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SportTypeRequest;
use App\Services\SportTypeService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SportTypeController extends Controller
{
    private SportTypeService $sportTypeService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  SportTypeService $sportTypeService
     * @return void
     */
    public function __construct(SportTypeService $sportTypeService)
    {
        $this->sportTypeService = $sportTypeService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $sportTypes = $this->sportTypeService->all($request);
        return view('sportTypes.index', compact('sportTypes'));
    }

    /**
     * Yeni bir kaynak oluşturma formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sportTypes.create');
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  SportTypeRequest $request
     * @return RedirectResponse
     */
    public function store(SportTypeRequest $request): RedirectResponse
    {
        $this->sportTypeService->store($request->validated());
        return redirect()->route('sportTypes.index')->with('success', 'Sport Type created successfully.');
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $sportType = $this->sportTypeService->show($id);
        return view('sportTypes.show.index', compact('sportType'));
    }

    /**
     * Kaynağı düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $sportType = $this->sportTypeService->show($id);
        return view('sportTypes.edit', compact('sportType'));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  SportTypeRequest $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(SportTypeRequest $request, string $id): RedirectResponse
    {
        $this->sportTypeService->update($request->validated(), $id);
        return redirect()->route('sportTypes.index')->with('success', 'Sport Type updated successfully.');
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->sportTypeService->destroy($id);
        return redirect()->route('sportTypes.index')->with('success', 'Sport Type deleted successfully.');
    }
}
