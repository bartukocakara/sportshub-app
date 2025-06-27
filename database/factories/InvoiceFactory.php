<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use App\Models\CourtBusiness;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'court_business_id' => CourtBusiness::factory(),
            'admin_id' => Admin::factory(),
            'invoice_number' => strtoupper(Str::random(10)),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'issue_date' => $this->faker->date(),
            'due_date' => $this->faker->dateTimeBetween('+1 day', '+30 days')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['draft', 'issued', 'paid', 'cancelled']),
            'lines' => json_encode([
                [
                    'description' => $this->faker->sentence(3),
                    'quantity' => $this->faker->numberBetween(1, 5),
                    'unit_price' => $this->faker->randomFloat(2, 10, 100),
                ],
                [
                    'description' => $this->faker->sentence(3),
                    'quantity' => $this->faker->numberBetween(1, 5),
                    'unit_price' => $this->faker->randomFloat(2, 10, 100),
                ],
            ]),
        ];
    }
}
