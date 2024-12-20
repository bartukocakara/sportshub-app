<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reservation_id' => Reservation::factory(),
            'payment_method' => $this->faker->randomElement(['credit_card', 'bank_transfer']),
            'transaction_id' => $this->faker->uuid,
            'amount' => $this->faker->randomFloat(2, 100, 500),
            'currency' => 'TRY',
            'status' => $this->faker->randomElement(['pending', 'success', 'failed']),
            'paid_at' => now(),
        ];
    }
}
