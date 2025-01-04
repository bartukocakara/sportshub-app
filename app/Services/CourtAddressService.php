<?php

namespace App\Services;

use App\Repositories\CourtAddressRepository;

class CourtAddressService extends CrudService
{
    protected CourtAddressRepository $courtAddressRepository;

    /**
     * @param CourtAddressRepository $courtAddressRepository
     * @return void
    */
    public function __construct(CourtAddressRepository $courtAddressRepository)
    {
        $this->courtAddressRepository = $courtAddressRepository;
        parent::__construct($this->courtAddressRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
