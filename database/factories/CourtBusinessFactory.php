<?php

namespace Database\Factories;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourtBusiness>
 */
class CourtBusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name . ' Business',
            'owner_first_name' => fake()->firstName,
            'owner_last_name' => fake()->lastName,
            'tax_no' => $this->faker->numerify('##########'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'standard_price' => $this->faker->numerify('####'),
            'address' => $this->faker->address,
            'district_id' => fake()->randomElement(District::all()->pluck('id')),
            'latitude' => fake()->numberBetween(36000000, 42000000) / 1000000,  // Latitude between 36.0 and 42.0
            'longitude' => fake()->numberBetween(26000000, 45000000) / 1000000, // Longitude between 26.0 and 45.0
            'postal_code' => $this->faker->postcode,
        ];
    }
}
