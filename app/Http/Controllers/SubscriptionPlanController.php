<?php

namespace App\Http\Controllers;

use App\Subscription\Services\SubscriptionPlanService;
use Illuminate\Http\Request;

use Illuminate\View\View;

class SubscriptionPlanController extends Controller
{
    protected SubscriptionPlanService $subscriptionPlanService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  SubscriptionPlanService $subscriptionPlanService
     * @return void
    */
    public function __construct(SubscriptionPlanService $subscriptionPlanService)
    {
        $this->subscriptionPlanService = $subscriptionPlanService;

    }

    public function index(Request $request) : View
    {
        $subscriptionPlanData = $this->subscriptionPlanService->all($request);
        return view('subscription-plans.index', ['subscriptionPlanData' => $subscriptionPlanData]);
    }
}
