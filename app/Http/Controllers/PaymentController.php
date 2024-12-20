<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private PaymentService $paymentService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  PaymentService $paymentService
     * @return void
    */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
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
            PaymentResource::collection($this->paymentService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  PaymentRequest $request
     * @return JsonResponse
    */
    public function store(PaymentRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->paymentService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new PaymentResource($this->paymentService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  PaymentRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(PaymentRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->paymentService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->paymentService->destroy($id));
    }
}
