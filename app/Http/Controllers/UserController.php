<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  UserService $userService
     * @return void
    */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
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
            UserResource::collection($this->userService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  UserRequest $request
     * @return JsonResponse
    */
    public function store(UserRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->userService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new UserResource($this->userService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  UserRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(UserRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->userService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->userService->destroy($id));
    }
}
