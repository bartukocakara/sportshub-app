<?php

namespace App\Subscription\Services;

use App\Repositories\SubscriptionPlanRepository;
use App\Services\CrudService;

class SubscriptionPlanService extends CrudService
{
    protected SubscriptionPlanRepository $subscriptionPlanRepository;

    public function __construct(SubscriptionPlanRepository $subscriptionPlanRepository)
    {
        $this->subscriptionPlanRepository = $subscriptionPlanRepository;
        parent::__construct($this->subscriptionPlanRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
