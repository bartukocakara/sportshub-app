<?php

namespace App\Providers;


use App\Events\SubscriptionCreated;
use App\Events\SubscriptionCancelled;
use App\Listeners\SendSubscriptionConfirmationEmail;
use App\Listeners\UpdateUserRole;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        SubscriptionCreated::class => [
            SendSubscriptionConfirmationEmail::class,
            UpdateUserRole::class, // If you want to update user roles on subscription
            // Add more listeners here, e.g., LogSubscriptionActivity::class
        ],
        SubscriptionCancelled::class => [
            // Listener to revert user role, send cancellation email, etc.
            // SendSubscriptionCancellationEmail::class,
            // RevertUserRole::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
