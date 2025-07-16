<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestReceiverRequest;
use App\Http\Resources\Request\RequestReceiverResource;
use App\Services\Request\RequestReceiverService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestReceiverController extends Controller
{
    private RequestReceiverService $requestReceiverService;
    private array $relations = [];

    /**
     * Service interface tanımlanıyor.
     *
     * @param  RequestReceiverService $requestReceiverService
     * @return void
    */
    public function __construct(RequestReceiverService $requestReceiverService)
    {
        $this->requestReceiverService = $requestReceiverService;
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
            RequestReceiverResource::collection($this->requestReceiverService->all($request, $this->relations))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestReceiverRequest $request
     * @return JsonResponse
    */
    public function store(RequestReceiverRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestReceiverService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new RequestReceiverResource($this->requestReceiverService->show($id, $this->relations)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  RequestReceiverRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(RequestReceiverRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestReceiverService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestReceiverService->destroy($id));
    }
}
