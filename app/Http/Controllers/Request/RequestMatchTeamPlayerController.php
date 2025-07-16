<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestMatchTeamPlayerRequest;
use App\Http\Requests\Request\RequestMultipleMatchTeamPlayerRequest;
use App\Http\Resources\Request\RequestMatchTeamPlayerMatchResource;
use App\Http\Resources\Request\RequestMatchTeamPlayerResource;
use App\Services\Request\RequestMatchTeamPlayerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestMatchTeamPlayerController extends Controller
{
    private RequestMatchTeamPlayerService $requestMatchTeamPlayerService;
    private array $relations = ['requestedUser', 'matchTeam.match'];

    /**
     * Service  tanımlanıyor.
     *
     * @param  RequestMatchTeamPlayerService $requestMatchTeamPlayerService
     * @return void
    */
    public function __construct(RequestMatchTeamPlayerService $requestMatchTeamPlayerService)
    {
        $this->requestMatchTeamPlayerService = $requestMatchTeamPlayerService;
    }

    /**
     * Kaynakları listelemek için kullanılır.
     *
     * @param  Request  $request
     * @return JsonResponse
    */
    public function indexWithRole( Request $request ) : JsonResponse
    {
        return $this->okApiResponse(
            RequestMatchTeamPlayerResource::collection($this->requestMatchTeamPlayerService->all($request, $this->relations))
                ->additional(['role' => $request->role])
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
    public function index( Request $request ) : JsonResponse
    {
        return $this->okApiResponse(
            RequestMatchTeamPlayerResource::collection($this->requestMatchTeamPlayerService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestMatchTeamPlayerRequest $request
     * @return JsonResponse
    */
    public function store(RequestMatchTeamPlayerRequest $request) : JsonResponse
    {
        return $this->createdApiResponse(RequestMatchTeamPlayerResource::make($this->requestMatchTeamPlayerService->store($request->validated())));
    }

        /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestMultipleMatchTeamPlayerRequest $request
     * @return JsonResponse
    */
    public function storeMultiple(RequestMultipleMatchTeamPlayerRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestMatchTeamPlayerService->storeMultiple($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new RequestMatchTeamPlayerResource($this->requestMatchTeamPlayerService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  RequestMatchTeamPlayerRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(RequestMatchTeamPlayerRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestMatchTeamPlayerService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestMatchTeamPlayerService->destroy($id));
    }
}
