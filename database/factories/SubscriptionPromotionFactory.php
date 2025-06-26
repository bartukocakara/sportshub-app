<?php

namespace Database\Factories;

use App\Models\SubscriptionPromotion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubscriptionPromotion>
 */
class SubscriptionPromotionFactory extends Factory
{
    protected $model = SubscriptionPromotion::class;

    public function definition()
    {
        $types = ['percentage', 'fixed'];

        return [
            'code' => strtoupper($this->faker->unique()->bothify('PROMO###')),
            'type' => $this->faker->randomElement($types),
            'amount' => $this->faker->numberBetween(5, 50), // %5-%50 veya sabit miktar
            'valid_until' => $this->faker->optional()->dateTimeBetween('now', '+1 year'),
        ];
    }
}
