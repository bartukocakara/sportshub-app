<?php

namespace App\Jobs;

use App\Loggers\LoggerManager;
use App\Models\User;
use App\Models\SubscriptionPlan;
use App\Subscription\Services\SubscriptionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Exception;

class ProcessSubscriptionPaymentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public User $user,
        public SubscriptionPlan $plan,
        public ?string $promoCode = null,
    ) {}

    public function handle(SubscriptionService $subscriptionService)
    {
        try {
            $subscriptionService->subscribe($this->user, $this->plan, $this->promoCode);
        } catch (Exception $e) {
            // Log veya başka hata işlemi
            LoggerManager::log('error', 'Subscription payment failed', [
                'user_id' => $this->user->id,
                'plan_id' => $this->plan->id,
                'promo_code' => $this->promoCode,
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
            ]);

            // Opsiyonel: manuel retry veya özel hata yönetimi yapılabilir

            // throw $e; // İstersen retry için exception fırlatabilirsin
        }
    }

    public function retryUntil(): \DateTime
    {
        return now()->addMinutes(10); // 10 dakika boyunca retry dene
    }
}
