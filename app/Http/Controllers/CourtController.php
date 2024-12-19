<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtRequest;
use App\Http\Resources\CourtResource;
use App\Services\CourtService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return JsonResponse
    */
    public function index(Request $request) : JsonResponse
    {
        return $this->okApiResponse(
            CourtResource::collection($this->courtService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CourtRequest $request
     * @return JsonResponse
    */
    public function store(CourtRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->courtService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CourtResource($this->courtService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CourtRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(CourtRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtService->destroy($id));
    }
}
