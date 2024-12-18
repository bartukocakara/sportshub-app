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
            'tax_no' => $this->faker->numerify('##########'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'standard_price' => $this->faker->numerify('####'),
            'address' => $this->faker->address,
            'district_id' => fake()->randomElement(District::all()->pluck('id')),
            'latitude' => fake()->numberBetween(37.500, 39.200),
            'longitude' => fake()->numberBetween(26.500, 30.200),
            'postal_code' => $this->faker->postcode,
        ];
    }
}
