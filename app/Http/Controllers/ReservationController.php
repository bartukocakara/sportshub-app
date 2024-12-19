<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Services\ReservationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return JsonResponse
    */
    public function index(Request $request) : JsonResponse
    {
        return $this->okApiResponse(
            ReservationResource::collection($this->reservationService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  ReservationRequest $request
     * @return JsonResponse
    */
    public function store(ReservationRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->reservationService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new ReservationResource($this->reservationService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  ReservationRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(ReservationRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->reservationService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->reservationService->destroy($id));
    }
}
