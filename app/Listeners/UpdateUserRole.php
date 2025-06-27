<?php

namespace App\Listeners;

use App\Events\SubscriptionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionCreated  $event
     * @return void
     */
    public function handle(SubscriptionCreated $event)
    {
        // Assuming you have a 'role' column or relationship on your User model
        $user = $event->subscription->user;
        if ($user) {
            // Example: Set user role to 'premium' or similar
            // $user->role = 'premium';
            // $user->save();
            // Or attach a specific role based on the subscription plan
            // $user->assignRole($event->subscription->plan->name);
        }
    }
}
