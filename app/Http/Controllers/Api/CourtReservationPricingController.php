<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtReservationPricingRequest;
use App\Http\Resources\CourtReservationPricingAvailabilityResource;
use App\Http\Resources\CourtReservationPricingResource;
use App\Services\CourtReservationPricingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourtReservationPricingController extends Controller
{
    private CourtReservationPricingService $courtMatchPricingService;

    /**
     * Service  tanımlanıyor.
     *
     * @param  CourtReservationPricingService $courtMatchPricingService
     * @return void
    */
    public function __construct(CourtReservationPricingService $courtMatchPricingService)
    {
        $this->courtMatchPricingService = $courtMatchPricingService;
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
            CourtReservationPricingResource::collection($this->courtMatchPricingService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return JsonResponse
    */
    public function checkAvailablitiy(Request $request) : JsonResponse
    {
        return $this->okApiResponse(
            CourtReservationPricingAvailabilityResource::collection($this->courtMatchPricingService->checkAvailablitiy($request))
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
    public function store(CourtReservationPricingRequest $request, string $courtId) : JsonResponse
    {
        $params = $request->validated();
        $params['court_id'] = $courtId;
        return $this->createdApiResponse($this->courtMatchPricingService->updateOrCreate($params));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CourtReservationPricingResource($this->courtMatchPricingService->show($id)));
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
        return $this->noContentApiResponse($this->courtMatchPricingService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtMatchPricingService->destroy($id));
    }
}
