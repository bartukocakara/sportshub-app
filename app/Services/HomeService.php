<?php

namespace App\Services;

use App\Http\Resources\CourtResource;
use App\Repositories\CourtRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class HomeService extends CrudService
{
    protected CourtRepository $courtRepository;

    /**
     * @param CourtRepository $CourtRepository
     * @return void
    */
    public function __construct(CourtRepository $courtRepository)
    {
        $this->courtRepository = $courtRepository;
        parent::__construct($this->courtRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request) : array
    {
        $homeData['courts'] = CourtResource::collection($this->courtRepository->home($request))
        ->response()
        ->getData(true);
        return $homeData;
    }
}
