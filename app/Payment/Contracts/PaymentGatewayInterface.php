<?php

namespace App\Payment\Contracts;

interface PaymentGatewayInterface
{
    /**
     * Prepare a payment session or form (for redirect-based flows).
     *
     * @param array $data
     * @return mixed
     */
    public function initialize(array $data): mixed;

    /**
     * Perform a direct charge (for card-based or tokenized payments).
     *
     * @param array $data
     * @return mixed
     */
    public function charge(array $data): mixed;

    /**
     * Refund a previous payment.
     *
     * @param string $transactionId
     * @param float $amount
     * @return mixed
     */
    public function refund(string $transactionId, float $amount): mixed;

    /**
     * Check status of a transaction (e.g., to verify after callback or webhook).
     *
     * @param string $transactionId
     * @return mixed
     */
    public function status(string $transactionId): mixed;

    /**
     * Optional: Cancel an authorized but not yet captured transaction.
     *
     * @param string $transactionId
     * @return mixed
     */
    public function cancel(string $transactionId): mixed;
}
