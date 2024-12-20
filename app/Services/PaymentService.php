<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService extends CrudService
{
    protected PaymentRepository $paymentRepository;

    /**
     * @param PaymentRepository $paymentRepository
     * @return void
    */
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
        parent::__construct($this->paymentRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
