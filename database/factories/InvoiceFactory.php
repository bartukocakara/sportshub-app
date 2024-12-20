<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\CourtBusiness;
use App\Models\User;
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
            'court_business_id' => CourtBusiness::factory(),  // Generate a related CourtBusiness entry
            'admin_id' => Admin::factory(),  // Generate a related User entry for the payer
            'amount' => $this->faker->randomFloat(2, 100, 1000),  // Random amount between 100 and 1000
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days'),  // Due date within 30 days
            'status' => $this->faker->randomElement(['unpaid', 'paid', 'overdue']),  // Random status
        ];
    }
}
