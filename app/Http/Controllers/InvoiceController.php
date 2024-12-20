<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Http\Resources\InvoiceResource;
use App\Services\InvoiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private InvoiceService $invoiceService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  InvoiceService $invoiceService
     * @return void
    */
    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
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
            InvoiceResource::collection($this->invoiceService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  InvoiceRequest $request
     * @return JsonResponse
    */
    public function store(InvoiceRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->invoiceService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new InvoiceResource($this->invoiceService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  InvoiceRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(InvoiceRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->invoiceService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->invoiceService->destroy($id));
    }
}
