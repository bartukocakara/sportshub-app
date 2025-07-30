<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestMatchTeamPlayerRequest;
use App\Http\Requests\Request\RequestMultipleMatchTeamPlayerRequest;
use App\Http\Resources\Request\RequestMatchTeamPlayerResource;
use App\Services\Request\RequestMatchTeamPlayerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * @return RedirectResponse
    */
    public function store(RequestMatchTeamPlayerRequest $request) : RedirectResponse
    {
        return $this->requestMatchTeamPlayerService->create($request->validated());
    }

    public function accept(string $id) : RedirectResponse
    {
        return $this->requestMatchTeamPlayerService->accept($id);
    }

    public function reject(string $id) : RedirectResponse
    {
        return $this->requestMatchTeamPlayerService->reject($id);
    }

     /**
     * destroy
     *
     * @param  string $id
     * @return RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        return $this->requestMatchTeamPlayerService->delete($id);
    }
}
