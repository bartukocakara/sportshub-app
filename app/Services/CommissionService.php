<?php

namespace App\Services;

use App\Repositories\CommissionRepository;

class CommissionService extends CrudService
{
    protected CommissionRepository $commissionRepository;

    /**
     * @param CommissionRepository $commissionRepository
     * @return void
    */
    public function __construct(CommissionRepository $commissionRepository)
    {
        $this->commissionRepository = $commissionRepository;
        parent::__construct($this->commissionRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
