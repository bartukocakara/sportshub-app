<?php

namespace App\Payment\Adapters;

class SipayAdapter extends BasePaymentAdapter
{
    public function initialize(array $data): mixed
    {
        $apiKey = $this->credentials['api_key'];
        $secret = $this->credentials['secret'];
        $baseUrl = $this->credentials['base_url'] ?? 'https://api.sipay.com'; // optional fallback

        // Example: Redirect-based form or session initialization
        $payload = [
            'api_key' => $apiKey,
            'amount' => $data['amount'],
            'callback_url' => $data['callback_url'],
            // ... other Sipay required fields
        ];

        // Simulated response (replace with real HTTP call)
        return [
            'redirect_url' => $baseUrl . '/checkout/' . uniqid(),
            'status' => 'initialized',
        ];
    }

    public function charge(array $data): mixed
    {
        throw new \BadMethodCallException('Sipay does not support direct charge. Use initialize() with redirect.');
    }

    public function refund(string $transactionId, float $amount): mixed
    {
        // Real implementation would send refund request to Sipay
        return [
            'status' => 'refunded',
            'transaction_id' => $transactionId,
        ];
    }

    public function status(string $transactionId): mixed
    {
        // Call Sipay API to check status
        return [
            'status' => 'success',
            'transaction_id' => $transactionId,
        ];
    }

    public function cancel(string $transactionId): mixed
    {
        // Optionally cancel a transaction
        return [
            'status' => 'cancelled',
            'transaction_id' => $transactionId,
        ];
    }
}
