<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Resources\AdminResource;
use App\Services\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private AdminService $adminService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  AdminService $adminService
     * @return void
    */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
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
            AdminResource::collection($this->adminService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  AdminRequest $request
     * @return JsonResponse
    */
    public function store(AdminRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->adminService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new AdminResource($this->adminService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  AdminRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(AdminRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->adminService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->adminService->destroy($id));
    }
}
