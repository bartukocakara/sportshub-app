<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPlan;
use App\Subscription\Services\SubscriptionService;
use Illuminate\Http\Request;
use App\Exceptions\SubscriptionException; // Make sure to import your custom exception
use App\Loggers\LoggerManager;
use App\Models\Subscription;

class UserSubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function subscribe(Request $request)
    {
        // Validate request data (use Form Requests for more complex validation)
        $request->validate([
            'plan_id' => 'required|exists:subscription_plans,id',
            'promotion_code' => 'nullable|string',
            // 'payment_token' => 'required|string', // If handling payment directly here
        ]);

        $user = auth()->user(); // Get the authenticated user
        $plan = SubscriptionPlan::findOrFail($request->plan_id);

        try {
            // Assume payment is handled by a separate service or gateway before this point
            // Or integrate payment processing within the SubscriptionService if simpler

            $subscription = $this->subscriptionService->createSubscription(
                $user,
                $plan,
                $request->promotion_code,
                // integrated_channel_id would come from payment gateway response
            );

            return response()->json([
                'message' => 'Subscription created successfully!',
                'subscription' => $subscription
            ], 201);

        } catch (SubscriptionException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            // Log the error for debugging
            LoggerManager::log('Error creating subscription: ', $e->getMessage(), ['user_id' => $user->id, 'plan_id' => $plan->id]);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }

    public function cancel(Subscription $subscription)
    {
        // Ensure the user owns the subscription before cancelling
        if ($subscription->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        try {
            $this->subscriptionService->cancelSubscription($subscription);
            return response()->json(['message' => 'Subscription cancelled successfully.']);
        } catch (SubscriptionException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (\Exception $e) {
            LoggerManager::log('Error cancelling subscription: ', $e->getMessage(), ['subscription_id' => $subscription->id]);
            return response()->json(['error' => 'An unexpected error occurred.'], 500);
        }
    }
}
