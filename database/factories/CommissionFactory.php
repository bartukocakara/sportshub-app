<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\CourtBusiness;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commission>
 */
class CommissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'court_business_id' => CourtBusiness::factory(),
            'admin_id' => Admin::factory(),
            'percentage' => $this->faker->numberBetween(5, 20), // Random percentage between 5 and 20
        ];
    }
}
