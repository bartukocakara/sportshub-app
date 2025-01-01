<?php

namespace App\Services;

use App\Repositories\DistrictRepository;
use Illuminate\Support\Collection;

class DistrictService extends CrudService
{
    protected DistrictRepository $districtRepository;

    /**
     * @param DistrictRepository $districtRepository
     * @return void
    */
    public function __construct(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
        parent::__construct($this->districtRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function getByCityId(string $id) : Collection
    {
        return $this->districtRepository->getByCityId($id);
    }
}
