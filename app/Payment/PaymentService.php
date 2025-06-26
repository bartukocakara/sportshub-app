<?php

namespace App\Payment;

use App\Payment\Contracts\PaymentGatewayInterface;
use App\Repositories\PaymentRepository;

class PaymentService
{
    protected PaymentGatewayInterface $gateway;
    protected PaymentRepository $repository;

    public function __construct(PaymentGatewayInterface $gateway, PaymentRepository $repository)
    {
        $this->gateway = $gateway;
        $this->repository = $repository;
    }

    public function pay(array $paymentData)
    {
        $response = $this->gateway->charge($paymentData);

        // log to DB
        $this->repository->create($paymentData);

        return $response;
    }

    public function refund(string $transactionId, float $amount)
    {
        return $this->gateway->refund($transactionId, $amount);
    }

    public function status(string $transactionId)
    {
        return $this->gateway->status($transactionId);
    }
}

