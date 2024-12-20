<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Resources\AccountResource;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private AccountService $accountService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  AccountService $accountService
     * @return void
    */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
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
            AccountResource::collection($this->accountService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  AccountRequest $request
     * @return JsonResponse
    */
    public function store(AccountRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->accountService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new AccountResource($this->accountService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  AccountRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(AccountRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->accountService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->accountService->destroy($id));
    }
}
