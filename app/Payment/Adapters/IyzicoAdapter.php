<?php

namespace App\Payment\Adapters;

class IyzicoAdapter extends BasePaymentAdapter
{
    public function charge(array $data): mixed
    {
        $apiKey = $this->credentials['api_key'];
        $secret = $this->credentials['secret'];

        // Perform charge logic with Iyzico API

        return [
            'status' => 'success',
            'transaction_id' => 'xyz123',
        ];
    }

    public function status(string $transactionId): mixed
    {
        // Query transaction from Iyzico API
        return [
            'status' => 'completed',
        ];
    }
}
