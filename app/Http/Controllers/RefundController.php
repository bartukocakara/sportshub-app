<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RefundRequest;
use App\Http\Resources\RefundResource;
use App\Services\RefundService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RefundController extends Controller
{
    private RefundService $refundService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  RefundService $refundService
     * @return void
    */
    public function __construct(RefundService $refundService)
    {
        $this->refundService = $refundService;
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
            RefundResource::collection($this->refundService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  RefundRequest $request
     * @return JsonResponse
    */
    public function store(RefundRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->refundService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new RefundResource($this->refundService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  RefundRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(RefundRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->refundService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->refundService->destroy($id));
    }
}
