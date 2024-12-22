<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtReservationPricingRequest;
use App\Http\Resources\CourtReservationPricingResource;
use App\Services\CourtReservationPricingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourtReservationPricingController extends Controller
{
    private CourtReservationPricingService $courtReservationPricingService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CourtReservationPricingService $courtReservationPricingService
     * @return void
    */
    public function __construct(CourtReservationPricingService $courtReservationPricingService)
    {
        $this->courtReservationPricingService = $courtReservationPricingService;
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
            CourtReservationPricingResource::collection($this->courtReservationPricingService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CourtReservationPricingRequest $request
     * @return JsonResponse
    */
    public function store(CourtReservationPricingRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->courtReservationPricingService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CourtReservationPricingResource($this->courtReservationPricingService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CourtReservationPricingRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(CourtReservationPricingRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtReservationPricingService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtReservationPricingService->destroy($id));
    }
}
