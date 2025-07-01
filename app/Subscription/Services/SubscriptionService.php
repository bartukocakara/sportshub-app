<?php

namespace App\Subscription\Services;

use App\Events\SubscriptionCancelled;
use App\Events\SubscriptionCreated;
use App\Exceptions\SubscriptionException;
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

    /**
     * Creates a new subscription for a user.
     *
     * @param User $user
     * @param SubscriptionPlan $plan
     * @param string|null $promotionCode
     * @param int|null $integratedChannelId
     * @return Subscription
     * @throws SubscriptionException
     */
    public function createSubscription(
        User $user,
        SubscriptionPlan $plan,
        ?string $promotionCode = null,
        ?int $integratedChannelId = null
    ): Subscription {
        // Start a database transaction to ensure atomicity
        return DB::transaction(function () use ($user, $plan, $promotionCode, $integratedChannelId) {
            // Check if user already has an active subscription to this plan (or any plan)
            if ($user->subscriptions()->where('status', 'active')->exists()) {
                throw new SubscriptionException('User already has an active subscription.');
            }

            // Apply promotion if code is provided
            $endsAt = $this->calculateSubscriptionEndDate($plan->interval);
            if ($promotionCode) {
                $promotion = SubscriptionPromotion::where('code', $promotionCode)
                                                ->where('active', true)
                                                ->first();
                if ($promotion) {
                    // Apply promotion logic (e.g., extend ends_at, apply discount)
                    // For simplicity, let's assume promotions extend the period
                    if ($promotion->type === 'extra_days') {
                        $endsAt->addDays($promotion->value);
                    }
                    // More complex promotion logic would go here (e.g., percentage discount applied to payment)
                } else {
                    // Optionally throw an exception or log if promotion code is invalid
                    // throw new SubscriptionException('Invalid promotion code.');
                }
            }

            $subscription = $user->subscriptions()->create([
                'subscription_plan_id'  => $plan->id,
                'integrated_channel_id' => $integratedChannelId,
                'status'                => 'active',
                'promotion_code'        => $promotionCode,
                'started_at'            => Carbon::now(),
                'ends_at'               => $endsAt,
            ]);

            // Dispatch an event after successful subscription creation
            event(new SubscriptionCreated($subscription));

            return $subscription;
        });
    }

    /**
     * Cancels an active subscription.
     *
     * @param Subscription $subscription
     * @return Subscription
     * @throws SubscriptionException
     */
    public function cancelSubscription(Subscription $subscription): Subscription
    {
        if ($subscription->status !== 'active') {
            throw new SubscriptionException('Subscription is not active and cannot be cancelled.');
        }

        // Implement cancellation logic:
        // - Set status to 'cancelled'
        // - Optionally set ends_at to now if immediate cancellation, or honor period end
        $subscription->update([
            'status' => 'cancelled',
            // 'ends_at' => Carbon::now(), // Uncomment if immediate cancellation is desired
        ]);

        // Dispatch an event
        event(new SubscriptionCancelled($subscription));

        return $subscription;
    }

    /**
     * Renews a subscription.
     * This method would typically be called by a scheduled task (e.g., Laravel Scheduler).
     *
     * @param Subscription $subscription
     * @param SubscriptionPlan $newPlan (optional, if user changes plan on renewal)
     * @return Subscription
     * @throws SubscriptionException
     */
    public function renewSubscription(Subscription $subscription, ?SubscriptionPlan $newPlan = null): Subscription
    {
        if ($subscription->status !== 'active' && $subscription->status !== 'expired') {
            throw new SubscriptionException('Subscription cannot be renewed in its current state.');
        }

        $planToRenew = $newPlan ?? $subscription->plan; // Use new plan if provided, else current plan

        if (!$planToRenew) {
            throw new SubscriptionException('Cannot renew subscription without a valid plan.');
        }

        $subscription->update([
            'subscription_plan_id' => $planToRenew->id,
            'started_at'           => Carbon::now(),
            'ends_at'              => $this->calculateSubscriptionEndDate($planToRenew->interval),
            'status'               => 'active',
            // Reset promotion code if it was a one-time promotion
            'promotion_code'       => null,
        ]);

        // You might dispatch a SubscriptionRenewed event here
        // event(new SubscriptionRenewed($subscription));

        return $subscription;
    }

    /**
     * Calculates the end date based on the plan interval.
     *
     * @param string $interval
     * @return Carbon
     */
    protected function calculateSubscriptionEndDate(string $interval): Carbon
    {
        $now = Carbon::now();
        switch ($interval) {
            case 'weekly':
                return $now->addWeek();
            case 'monthly':
                return $now->addMonth();
            case 'yearly':
                return $now->addYear();
            default:
                throw new \InvalidArgumentException("Invalid subscription interval: {$interval}");
        }
    }
    // You might add methods for:
    // - applyPromotion(Subscription $subscription, SubscriptionPromotion $promotion)
    // - upgradeSubscription(Subscription $subscription, SubscriptionPlan $newPlan)
    // - downgradeSubscription(Subscription $subscription, SubscriptionPlan $newPlan)
}
