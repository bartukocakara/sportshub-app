<?php

namespace App\Services;

use App\Repositories\CourtBusinessRepository;

class CourtBusinessService extends CrudService
{
    protected CourtBusinessRepository $courtBusinessRepository;

    /**
     * @param CourtBusinessRepository $courtBusinessRepository
     * @return void
    */
    public function __construct(CourtBusinessRepository $courtBusinessRepository)
    {
        $this->courtBusinessRepository = $courtBusinessRepository;
        parent::__construct($this->courtBusinessRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
