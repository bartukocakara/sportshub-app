<?php

namespace App\Services;

use App\Repositories\CourtRepository;

class CourtService extends CrudService
{
    protected CourtRepository $courtRepository;

    /**
     * @param CourtRepository $courtRepository
     * @return void
    */
    public function __construct(CourtRepository $courtRepository)
    {
        $this->courtRepository = $courtRepository;
        parent::__construct($this->courtRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
