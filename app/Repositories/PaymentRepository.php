<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository extends BaseRepository
{
    protected Payment $payment;

    /**
     * @param Payment $payment
     * @return void
    */
    public function __construct(Payment $payment)
    {
        parent::__construct($payment);
        $this->payment = $payment;
    }
}
