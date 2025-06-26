<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $plans = SubscriptionPlan::all();

        if ($users->isEmpty() || $plans->isEmpty()) {
            $this->command->warn('Users or SubscriptionPlans table is empty, cannot seed subscriptions.');
            return;
        }

        // Her kullanıcı için 1-2 abonelik oluştur
        foreach ($users as $user) {
            Subscription::factory()
                ->count(rand(1, 2))
                ->state(function () use ($user, $plans) {
                    return [
                        'user_id' => $user->id,
                        'subscription_plan_id' => $plans->random()->id,
                    ];
                })
                ->create();
        }
    }
}
