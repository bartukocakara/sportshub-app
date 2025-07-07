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
    public function create(Request $request)
    {
        $datas = $this->courtService->create($request);
        return view('admin.courts.create.index', compact('datas'));
    }

    /**
     * Yeni bir kortu kaydetmek için kullanılır.
     *
     * @param  CourtRequest $request
     * @return RedirectResponse
     */
    public function store(CourtRequest $request): RedirectResponse
    {
        try {
            $this->courtService->createCourt($request->validated(), $request->file('court_images'));
            return redirect()->route('admin.courts.index')
                ->with('success', __('messages.court_created_successfully'));
        } catch (\Throwable $e) {
            report($e);
            return back()->withErrors([
                'error' => __('messages.failed_to_create_court'),
            ])->withInput();
        }
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
