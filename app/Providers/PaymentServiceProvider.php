<?php

namespace App\Providers;

use App\Payment\Adapters\IyzicoAdapter;
use App\Payment\Adapters\SipayAdapter;
use App\Models\PaymentProvider;
use App\Payment\Contracts\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGatewayInterface::class, function ($app) {
            $request = $app->make(Request::class);
            $providerKey = $request->input('provider');

            $provider = PaymentProvider::where('key', $providerKey)
                ->where('active', true)
                ->firstOrFail();

            $credentials = $provider->credentials;

            return match ($providerKey) {
                'iyzico' => new IyzicoAdapter($credentials),
                'sipay'  => new SipayAdapter($credentials),
                default => throw new \Exception("Unknown provider: {$providerKey}"),
            };
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
