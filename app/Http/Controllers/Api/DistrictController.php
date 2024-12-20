<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use App\Http\Resources\DistrictResource;
use App\Services\DistrictService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    private DistrictService $districtService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  DistrictService $districtService
     * @return void
    */
    public function __construct(DistrictService $districtService)
    {
        $this->districtService = $districtService;
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
            DistrictResource::collection($this->districtService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  DistrictRequest $request
     * @return JsonResponse
    */
    public function store(DistrictRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->districtService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new DistrictResource($this->districtService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  DistrictRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(DistrictRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->districtService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->districtService->destroy($id));
    }
}
