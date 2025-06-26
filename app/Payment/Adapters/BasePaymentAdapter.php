<?php

namespace App\Payment\Adapters;

use App\Payment\Contracts\PaymentGatewayInterface;

abstract class BasePaymentAdapter implements PaymentGatewayInterface
{
    protected array $credentials;

    public function __construct(array $credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Optional: Override if supported by gateway.
     */
    public function initialize(array $data): mixed
    {
        throw new \BadMethodCallException(static::class . ' does not support initialize().');
    }

    /**
     * Optional: Override if not supported.
     */
    public function refund(string $transactionId, float $amount): mixed
    {
        throw new \BadMethodCallException(static::class . ' does not support refund().');
    }

    /**
     * Optional: Override if not supported.
     */
    public function cancel(string $transactionId): mixed
    {
        throw new \BadMethodCallException(static::class . ' does not support cancel().');
    }

    /**
     * Implement this in your adapter — it’s almost always required.
     */
    abstract public function charge(array $data): mixed;

    /**
     * Implement this in your adapter — useful for reconciliation.
     */
    abstract public function status(string $transactionId): mixed;
}
