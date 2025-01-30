<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Services\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ReservationController extends Controller
{
    private ReservationService $reservationService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  ReservationService $reservationService
     * @return void
     */
    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * Rezervasyonları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $reservations = $this->reservationService->all($request);
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Son kullanıcı rezervasyonları listelemek için kullanılır.
     *
     * @param  Request $request
     * @return \Illuminate\View\View
     */
    public function me(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $data = ReservationResource::collection($this->reservationService->me($request))
                                ->response()
                                ->getData(true);
        return view('reservations.index', compact('data'));
    }

    /**
     * Yeni bir rezervasyon oluşturma formunu görüntülemek için kullanılır.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Yeni bir rezervasyonu kaydetmek için kullanılır.
     *
     * @param  ReservationRequest $request
     * @return RedirectResponse
     */
    public function store(ReservationRequest $request): RedirectResponse
    {
        $this->reservationService->store($request->validated());
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Belirli bir rezervasyonu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $reservation = $this->reservationService->show($id);
        return view('reservations.show.index', compact('reservation'));
    }

    /**
     * Belirli bir rezervasyonu düzenleme formunu görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {
        $reservation = $this->reservationService->show($id);
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Belirli bir rezervasyonu güncellemek için kullanılır.
     *
     * @param  ReservationRequest $request
     * @param  string $id
     * @return RedirectResponse
     */
    public function update(ReservationRequest $request, string $id): RedirectResponse
    {
        $this->reservationService->update($request->validated(), $id);
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    /**
     * Belirli bir rezervasyonu silmek için kullanılır.
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->reservationService->destroy($id);
        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
