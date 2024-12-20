<?php

namespace App\Services;

use App\Repositories\SportTypeRepository;

class SportTypeService extends CrudService
{
    protected SportTypeRepository $sportTypeRepository;

    /**
     * @param SportTypeRepository $sportTypeRepository
     * @return void
    */
    public function __construct(SportTypeRepository $sportTypeRepository)
    {
        $this->sportTypeRepository = $sportTypeRepository;
        parent::__construct($this->sportTypeRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
