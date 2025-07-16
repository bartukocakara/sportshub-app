<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RequestMatchTeamRequest;
use App\Http\Resources\Request\RequestMatchTeamResource;
use App\Services\Request\RequestMatchTeamService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RequestMatchTeamController extends Controller
{
    private RequestMatchTeamService $requestMatchTeamService;
    private array $relations = [];

    /**
     * Service  tanımlanıyor.
     *
     * @param  RequestMatchTeamService $requestMatchTeamService
     * @return void
    */
    public function __construct(RequestMatchTeamService $requestMatchTeamService)
    {
        $this->requestMatchTeamService = $requestMatchTeamService;
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
            RequestMatchTeamResource::collection($this->requestMatchTeamService->all($request, $this->relations))
                ->response()
                ->getData(true)
        );
    }
}
