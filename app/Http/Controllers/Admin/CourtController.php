<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtRequest;
use App\Services\Admin\CourtService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
    public function index(Request $request) : View
    {
        $datas = $this->courtService->index($request, ['courtReservationPricings']);
        return view('admin.courts.index', compact('datas'));
    }

    /**
     * Yeni bir kort oluşturma formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.courts.create.index');
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
        return redirect()->route('admin.courts.index')->with('success', 'Court created successfully.');
    }

    /**
     * Belirli bir kortu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id) : View
    {
        $court = $this->courtService->show($id);
        return view('admin.courts.show.index', compact('court'));
    }

    /**
     * Belirli bir kortu düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id) : View
    {
        $court = $this->courtService->show($id);
        return view('admin.courts.edit', compact('court'));
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
        return redirect()->route('admin.courts.index')->with('success', 'Court updated successfully.');
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
        return redirect()->route('admin.courts.index')->with('success', 'Court deleted successfully.');
    }
}
