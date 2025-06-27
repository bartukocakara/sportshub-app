<?php

namespace App\Repositories;

use App\Models\SubscriptionPlan;

class SubscriptionPlanRepository extends BaseRepository
{
    protected SubscriptionPlan $subscriptionPlan;

    /**
     * @param SubscriptionPlan $subscriptionPlan
     * @return void
    */
    public function __construct(SubscriptionPlan $subscriptionPlan)
    {
        parent::__construct($subscriptionPlan);
        $this->subscriptionPlan = $subscriptionPlan;
    }
}
