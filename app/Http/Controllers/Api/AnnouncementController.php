<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementMultipleRequest;
use App\Http\Requests\AnnouncementRequest;
use App\Http\Resources\AnnouncementResource;
use App\Services\AnnouncementService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    private AnnouncementService $announcementService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  AnnouncementService $announcementService
     * @return void
    */
    public function __construct(AnnouncementService $announcementService)
    {
        $this->announcementService = $announcementService;
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
            AnnouncementResource::collection($this->announcementService->all($request, ['user', 'teamTypeDefinition', 'courtTypeDefinition', 'reservationTypeDefinition', 'userTypeDefinition', 'matchTypeDefinition'], false))
                ->response()
                ->getData(true)
        );
    }

    /**
     * Yeni bir kaynağı kaydetmek için kullanılır.
     *
     * @param  AnnouncementRequest $request
     * @return JsonResponse
    */
    public function store(AnnouncementRequest $request) : JsonResponse
    {
        return $this->createdApiResponse($this->announcementService->store($request->validated()));
    }

    /**
     * Kaynağı görüntülemek için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
    */
    public function show(string $id) : JsonResponse
    {
        return $this->okApiResponse(new AnnouncementResource($this->announcementService->show($id)));
    }

    /**
     * Kaynağı güncellemek için kullanılır.
     *
     * @param  AnnouncementRequest $request
     * @param  string $id
     * @return JsonResponse
    */
    public function update(AnnouncementRequest $request, string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->announcementService->update($request->validated(), $id));
    }

    /**
     * Kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return JsonResponse
     */
    public function destroy(string $id) : JsonResponse
    {
        return $this->noContentApiResponse($this->announcementService->destroy($id));
    }
}
