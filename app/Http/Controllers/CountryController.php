<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Resources\CountryResource;
use App\Services\CountryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private CountryService $countryService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  CountryService $countryService
     * @return void
    */
    public function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
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
            CountryResource::collection($this->countryService->all($request))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  CountryRequest $request
     * @return JsonResponse
    */
    public function store(CountryRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->countryService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new CountryResource($this->countryService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  CountryRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(CountryRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->countryService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->countryService->destroy($id));
    }
}
