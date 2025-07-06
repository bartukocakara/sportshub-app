<?php

namespace App\Services\Admin;

use App\Http\Resources\CourtResource;
use App\Repositories\CourtRepository;
use App\Services\CrudService;
use App\Services\MetaDataService;
use Illuminate\Http\Request;

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
}
