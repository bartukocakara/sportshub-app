<?php

namespace App\Http\Controllers\Request;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Request\RequestPlayerTeamRequest;
use App\Http\Resources\Request\RequestPlayerTeamResource;
use App\Services\Request\RequestPlayerTeamService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestMultiplePlayerTeamRequest;

class RequestPlayerTeamController extends Controller
{
    private RequestPlayerTeamService $requestPlayerTeamService;
    private array $relations = ['requestedUser', 'team.users'];

    /**
     * __construct
     *
     * @param  mixed $requestPlayerTeamService
     * @return void
     */
    public function __construct(RequestPlayerTeamService $requestPlayerTeamService)
    {
        $this->requestPlayerTeamService = $requestPlayerTeamService;
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
            RequestPlayerTeamResource::collection($this->requestPlayerTeamService->all($request, $this->relations))
                ->additional(['role' => $request->role])
                ->response()
                ->getData(true)
        );
    }

    /**
     * Display a listing of the resource.
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        return $this->okApiResponse(
            RequestPlayerTeamResource::collection($this->requestPlayerTeamService->all($request, $this->relations))
                ->response()
                ->getData(true)
        );
    }

     /**
     * show
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(
                new RequestPlayerTeamResource($this->requestPlayerTeamService->show($id, $this->relations)));
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RequestPlayerTeamRequest $request
     * @return JsonResponse
    */
    public function store(RequestPlayerTeamRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->requestPlayerTeamService->store($request->validated()));
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param RequestMultiplePlayerTeamRequest $request
     * @param string $teamId
     * @return JsonResponse
    */
    public function storeMultiple(RequestMultiplePlayerTeamRequest $request, string $teamId) : JsonResponse
    {
        return $this->createdApiResponse($this->requestPlayerTeamService->storeMultiple($request->validated(), $teamId));
    }

    /**
     * update
     *
     * @param  RequestPlayerTeamRequest $request
     * @param  string $id
     * @return JsonResponse
     */
    public function update(RequestPlayerTeamRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse(
                $this->requestPlayerTeamService->update($request->validated(), $id));
    }

    /**
     * destroy
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->requestPlayerTeamService->destroy($id));
    }
}
