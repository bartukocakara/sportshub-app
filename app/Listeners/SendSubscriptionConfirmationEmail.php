<?php

namespace App\Listeners;

use App\Events\SubscriptionCreated;
use App\Mail\SubscriptionConfirmation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSubscriptionConfirmationEmail implements ShouldQueue // Make it queueable for better performance
{
    use InteractsWithQueue;

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
        // Ensure the user and their email exist
        if ($event->subscription->user && $event->subscription->user->email) {
            Mail::to($event->subscription->user->email)->send(new SubscriptionConfirmation($event->subscription));
        }
    }
}
