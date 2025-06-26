<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition()
    {
        // İlişkili modelleri seç
        $user = User::inRandomOrder()->first() ?? User::factory()->create();
        $plan = SubscriptionPlan::inRandomOrder()->first() ?? SubscriptionPlan::factory()->create();

        $startedAt = $this->faker->dateTimeBetween('-1 month', 'now');
        $endsAt = (clone $startedAt)->modify('+1 month');

        return [
            'user_id' => $user->id,
            'subscription_plan_id' => $plan->id,
            'integrated_channel_id' => null, // isteğe bağlı, ekleyebilirsin
            'status' => 'active',
            'promotion_code' => null,
            'started_at' => $startedAt,
            'ends_at' => $endsAt,
        ];
    }
}
