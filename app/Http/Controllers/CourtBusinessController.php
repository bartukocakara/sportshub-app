<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourtBusinessRequest;
use App\Http\Resources\CourtBusinessResource;
use App\Services\CourtBusinessService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourtBusinessController extends Controller
{
    private CourtBusinessService $courtBusinessService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CourtBusinessService $courtBusinessService
     * @return void
    */
    public function __construct(CourtBusinessService $courtBusinessService)
    {
        $this->courtBusinessService = $courtBusinessService;
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
            CourtBusinessResource::collection($this->courtBusinessService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CourtBusinessRequest $request
     * @return JsonResponse
    */
    public function store(CourtBusinessRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->courtBusinessService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CourtBusinessResource($this->courtBusinessService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CourtBusinessRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(CourtBusinessRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtBusinessService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->courtBusinessService->destroy($id));
    }
}
