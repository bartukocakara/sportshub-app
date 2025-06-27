<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPlan::create([
            'name' => 'Free',
            'interval' => 'monthly',
            'currency' => 'USD',
            'amount_minor' => 0,
            'description' => 'Basic access to matches and teams',
            'active' => true,
            'features' => [
                'Basic Match Finding',
                'Join Public Teams',
                'Limited Court Reservations (1 per month)',
            ],
        ]);

        SubscriptionPlan::create([
            'name' => 'Pro',
            'interval' => 'monthly',
            'currency' => 'USD',
            'amount_minor' => 9900, // $99.00
            'description' => 'Enhanced access with premium features',
            'active' => true,
            'features' => [
                'Advanced Match Finding',
                'Create and Manage Teams',
                'Court Reservations (5 per month)',
                'Premium Match Access',
                'Analytics Dashboard',
            ],
        ]);

        SubscriptionPlan::create([
            'name' => 'Lifetime',
            'interval' => 'yearly',
            'currency' => 'USD',
            'amount_minor' => 19900, // $199.00
            'description' => 'Full access with exclusive features',
            'active' => true,
            'features' => [
                'Advanced Match Finding',
                'Create and Manage Teams',
                'Unlimited Court Reservations',
                'Premium Match Access',
                'Analytics Dashboard',
                'Priority Booking',
                'Community Features',
            ],
        ]);
    }
}
