<?php

namespace Database\Factories;

use App\Models\CourtBusiness;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'court_business_id' => CourtBusiness::factory(),  // Use the CourtBusiness factory to generate related data
            'balance' => $this->faker->randomFloat(2, 0, 1000),  // Generate a random balance between 0 and 1000
        ];
    }
}
