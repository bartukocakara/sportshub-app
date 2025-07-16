<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestMatchRequest;
use App\Http\Resources\Request\RequestMatchResource;
use App\Services\Request\RequestMatchService;

class RequestMatchController extends Controller
{
    private RequestMatchService $requestMatchService;
    private array $relations = [
                'match.matchTeams.matchTeamPlayers.user',
                'match.matchTeams.matchTeamPlayers.status',
            ];

    /**
     * __construct
     *
     * @param  mixed $requestMatchService
     * @return void
     */
    public function __construct(RequestMatchService $requestMatchService)
    {
        $this->requestMatchService = $requestMatchService;
    }

    /**
     * Kaynaktan bir liste görüntüler
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $request->merge(['requested_user_id' => auth()->user()->id]);
        return $this->okApiResponse(
            RequestMatchResource::collection($this->requestMatchService->all( $request, $this->relations))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni oluşturulan bir kaynağı database katmanına kaydeder.
     *
     * @param  RequestMatchRequest $request
     * @return JsonResponse
     */
    public function store(RequestMatchRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestMatchService->store($request->validated()));
    }

    /**
     * Bir kaynağı kaynağı görüntülemek için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(
                new RequestMatchResource($this->requestMatchService->show($id)));
    }

    /**
     * Bir kaynağı güncellemek için kullanılır.
     *
     * @param  RequestMatchRequest $request
     * @param  string $id
     * @return JsonResponse
     */
    public function update(RequestMatchRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestMatchService->update($request->validated(), $id));
    }

    /**
     * Bir kaynağı kaldırmak için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(int $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestMatchService->destroy($id));
    }
}
