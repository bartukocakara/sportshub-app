<?php

namespace App\Actions;

use App\Models\User;
use App\Models\SubscriptionPlan;
use App\Services\SubscriptionService; // Still uses the service for core logic
use App\Exceptions\SubscriptionException;

class SubscribeUserAction
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Execute the subscription process for a user.
     *
     * @param User $user
     * @param SubscriptionPlan $plan
     * @param string|null $promotionCode
     * @param int|null $integratedChannelId
     * @return \App\Models\Subscription
     * @throws SubscriptionException
     */
    public function execute(
        User $user,
        SubscriptionPlan $plan,
        ?string $promotionCode = null,
        ?int $integratedChannelId = null
    ): \App\Models\Subscription {
        // This action primarily orchestrates, delegating to the service
        return $this->subscriptionService->createSubscription(
            $user,
            $plan,
            $promotionCode,
            $integratedChannelId
        );
    }
}
