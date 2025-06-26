<?php

namespace App\Subscription\Services;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\SubscriptionPromotion;
use App\Models\User;
use App\ValueObjects\Money;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubscriptionService {

     public function subscribe(User $user, SubscriptionPlan $plan, ?string $promoCode = null): Subscription
    {
        $amount = $this->applyPromotion($plan, $promoCode);

        return DB::transaction(function () use ($user, $plan, $amount, $promoCode) {
            return Subscription::create([
                'user_id' => $user->id,
                'subscription_plan_id' => $plan->id,
                'started_at' => now(),
                'ends_at' => $this->calculateEndsAt($plan),
                'status' => 'active',
                'promotion_code' => $promoCode,
            ]);
        });
    }

    protected function applyPromotion(SubscriptionPlan $plan, ?string $code): Money
    {
        if (!$code) return $plan->price();

        $promo = SubscriptionPromotion::where('code', $code)
            ->where('valid_until', '>=', now())
            ->first();

        if (!$promo) return $plan->price();

        return match ($promo->type) {
            'percentage' => new Money((int) round($plan->price()->amountMinor * (1 - $promo->amount / 100)), $plan->currency),
            'fixed' => new Money(max(0, $plan->price()->amountMinor - $promo->amount), $plan->currency),
        };
    }

    protected function calculateEndsAt(SubscriptionPlan $plan): Carbon
    {
        return match ($plan->interval) {
            'weekly' => now()->addWeek(),
            'monthly' => now()->addMonth(),
            'yearly' => now()->addYear(),
            default => now()->addMonth(),
        };
    }

    public function createSubscription(User $user, SubscriptionPlan $plan) {
        // Logic to create a subscription
    }
}
