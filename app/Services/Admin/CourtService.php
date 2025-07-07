<?php

namespace App\Services\Admin;

use App\Http\Resources\CourtResource;
use App\Models\Court;
use App\Repositories\CourtRepository;
use App\Services\CrudService;
use App\Services\MetaDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourtService extends CrudService
{
    protected CourtRepository $courtRepository;

    /**
     * @param CourtRepository $courtRepository
     * @return void
    */
    public function __construct(CourtRepository $courtRepository, protected MetaDataService $metaDataService)
    {
        $this->courtRepository = $courtRepository;
        parent::__construct($this->courtRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        return [
            'courts'       => CourtResource::collection(
                                $this->courtRepository->all($request, $with)
                            )->response()->getData(true),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    public function profile(string $id, array $with = []) : array
    {
        return [
            'court'       => CourtResource::make($this->courtRepository->find($id, $with)),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest(),
        ];
    }

    public function create(Request $request) : array
    {
        return [
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    public function createCourt(array $data, ?array $images = []): Court
    {
        return DB::transaction(function () use ($data, $images) {
            // 1. Court oluştur
            $court = $this->courtRepository->create($data);

            // 2. Adres varsa oluştur
            if (!empty($data['court_address'])) {
                $court->courtAddress()->create($data['court_address']);
            }

            // 3. Görselleri ekle
            if ($images && is_array($images)) {
                foreach ($images as $index => $image) {
                    if ($image && $image->isValid()) {
                        $path = $image->store('courts', 'public');
                        $court->courtImages()->create([
                            'order' => $index,
                            'file_path' => $path,
                        ]);
                    }
                }
            }

            return $court;
        });
    }

}
