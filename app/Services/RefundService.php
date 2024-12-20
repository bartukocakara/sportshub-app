<?php

namespace App\Services;

use App\Repositories\RefundRepository;

class RefundService extends CrudService
{
    protected RefundRepository $refundRepository;

    /**
     * @param RefundRepository $refundRepository
     * @return void
    */
    public function __construct(RefundRepository $refundRepository)
    {
        $this->refundRepository = $refundRepository;
        parent::__construct($this->refundRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
