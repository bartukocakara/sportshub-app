<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Refund>
 */
class RefundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'payment_id' => Payment::factory(),
            'refund_amount' => $this->faker->randomFloat(2, 50, 500),
            'refund_reason' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['pending', 'processed', 'failed']),
            'refunded_at' => now(),
        ];
    }
}
