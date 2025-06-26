<?php

namespace Database\Factories;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriptionPlan>
 */
class SubscriptionPlanFactory extends Factory
{
    protected $model = SubscriptionPlan::class;

    public function definition()
    {
        $intervals = ['weekly', 'monthly', 'yearly'];
        $currencies = ['USD', 'EUR', 'TRY'];

        return [
            'name' => $this->faker->unique()->word() . ' Plan',
            'interval' => $this->faker->randomElement($intervals),
            'currency' => $this->faker->randomElement($currencies),
            'amount_minor' => $this->faker->numberBetween(500, 5000), // ör: 5.00 - 50.00 birim para
            'description' => $this->faker->sentence(),
            'active' => true,
        ];
    }
}
