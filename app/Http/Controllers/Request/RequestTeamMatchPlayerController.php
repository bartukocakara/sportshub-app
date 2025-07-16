<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestTeamMatchPlayerRequest;
use App\Http\Resources\Request\RequestTeamMatchPlayerResource;
use App\Services\Request\RequestTeamMatchPlayerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestTeamMatchPlayerController extends Controller
{
    private RequestTeamMatchPlayerService $requestTeamMatchPlayerService;
    private array $relations = [];

    /**
     * Service  tanımlanıyor.
     *
     * @param  RequestTeamMatchPlayerService $requestTeamMatchPlayerService
     * @return void
    */
    public function __construct(RequestTeamMatchPlayerService $requestTeamMatchPlayerService)
    {
        $this->requestTeamMatchPlayerService = $requestTeamMatchPlayerService;
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
            RequestTeamMatchPlayerResource::collection($this->requestTeamMatchPlayerService->all($request, $this->relations))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestTeamMatchPlayerRequest $request
     * @return JsonResponse
    */
    public function store(RequestTeamMatchPlayerRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestTeamMatchPlayerService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new RequestTeamMatchPlayerResource($this->requestTeamMatchPlayerService->show($id, $this->relations)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  RequestTeamMatchPlayerRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(RequestTeamMatchPlayerRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestTeamMatchPlayerService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestTeamMatchPlayerService->destroy($id));
    }
}
