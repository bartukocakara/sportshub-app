<?php

namespace Database\Factories;

use App\Models\Court;
use App\Models\District;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CourtAddress>
 */
class CourtAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'court_id' => fake()->randomElement(Court::whereNull('court_business_id')->get()->pluck('id')),
            'address_detail' => fake()->streetAddress,
            'street_name' => fake()->streetName,
            'district_id' => fake()->randomElement(District::all()->pluck('id')),
            'latitude' => fake()->numberBetween(37.500, 39.200),
            'longitude' => fake()->numberBetween(26.500, 30.200),
            'neighborhood' => fake()->state,
            'building_number' => fake()->buildingNumber,
        ];
    }
}
