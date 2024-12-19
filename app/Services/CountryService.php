<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService extends CrudService
{
    protected CountryRepository $countryRepository;

    /**
     * @param CountryRepository $countryRepository
     * @return void
    */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
        parent::__construct($this->countryRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
