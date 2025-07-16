<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestCreateCourtRequest;
use App\Http\Resources\Request\RequestCreateCourtResource;
use App\Services\Request\RequestCreateCourtService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestCreateCourtController extends Controller
{
    private RequestCreateCourtService $requestCreateCourtService;
    private array $relations = ['requestedUser', 'court.courtImage'];

    /**
     * Service interface tanımlanıyor.
     *
     * @param  RequestCreateCourtService $requestCreateCourtService
     * @return void
    */
    public function __construct(RequestCreateCourtService $requestCreateCourtService)
    {
        $this->requestCreateCourtService = $requestCreateCourtService;
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
            RequestCreateCourtResource::collection($this->requestCreateCourtService->all($request, $this->relations))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestCreateCourtRequest $request
     * @return JsonResponse
    */
    public function store(RequestCreateCourtRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestCreateCourtService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new RequestCreateCourtResource($this->requestCreateCourtService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  RequestCreateCourtRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(RequestCreateCourtRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestCreateCourtService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestCreateCourtService->destroy($id));
    }
}
