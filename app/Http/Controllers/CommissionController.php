<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommissionRequest;
use App\Http\Resources\CommissionResource;
use App\Services\CommissionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    private CommissionService $commissionService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CommissionService $commissionService
     * @return void
    */
    public function __construct(CommissionService $commissionService)
    {
        $this->commissionService = $commissionService;
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
            CommissionResource::collection($this->commissionService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CommissionRequest $request
     * @return JsonResponse
    */
    public function store(CommissionRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->commissionService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CommissionResource($this->commissionService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CommissionRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(CommissionRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->commissionService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->commissionService->destroy($id));
    }
}
