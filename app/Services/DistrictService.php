<?php

namespace App\Services;

use App\Repositories\DistrictRepository;

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
}
