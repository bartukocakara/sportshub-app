<?php

namespace App\Services;

use App\Repositories\CityRepository;

class CityService extends CrudService
{
    protected CityRepository $cityRepository;

    /**
     * @param CityRepository $cityRepository
     * @return void
    */
    public function __construct(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
        parent::__construct($this->cityRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
