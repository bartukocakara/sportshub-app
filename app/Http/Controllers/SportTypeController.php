<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SportTypeRequest;
use App\Http\Resources\SportTypeResource;
use App\Services\SportTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @param  Request  $request
     * @return JsonResponse
    */
    public function index(Request $request) : JsonResponse
    {
        return $this->okApiResponse(
            SportTypeResource::collection($this->sportTypeService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  SportTypeRequest $request
     * @return JsonResponse
    */
    public function store(SportTypeRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->sportTypeService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new SportTypeResource($this->sportTypeService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  SportTypeRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(SportTypeRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->sportTypeService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->sportTypeService->destroy($id));
    }
}
