<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use App\Repositories\SportTypeRepository;

class UserController extends Controller
{
    private UserService $userService;



    /**
     * __construct
     *
     * @param  UserService $userService
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): JsonResponse
    {
        $users = $this->userService->all($request);
        $responseData = UserResource::collection($users)->response()->getData(true);

        return $this->okApiResponse($responseData);
    }
}
