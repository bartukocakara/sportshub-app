<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestTeamMatchRequest;
use App\Http\Resources\Request\RequestTeamMatchResource;
use App\Services\Request\RequestTeamMatchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestTeamMatchController extends Controller
{
    private RequestTeamMatchService $requestTeamMatchService;
    private array $relations = ['requestedUser', 'requestedTeam', 'match'];

    /**
     * Service  tanımlanıyor.
     *
     * @param  RequestTeamMatchService $requestTeamMatchService
     * @return void
    */
    public function __construct(RequestTeamMatchService $requestTeamMatchService)
    {
        $this->requestTeamMatchService = $requestTeamMatchService;
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
            RequestTeamMatchResource::collection($this->requestTeamMatchService->all($request, $this->relations))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestTeamMatchRequest $request
     * @return JsonResponse
    */
    public function store(RequestTeamMatchRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestTeamMatchService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new RequestTeamMatchResource($this->requestTeamMatchService->show($id, $this->relations)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  RequestTeamMatchRequest $request
     * @param  int $id
     * @return JsonResponse
    */
    public function update(RequestTeamMatchRequest $request, int $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestTeamMatchService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  int $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestTeamMatchService->destroy($id));
    }
}
