<?php

namespace Database\Factories;

use App\Models\CourtBusiness;
use App\Models\District;
use App\Models\SportType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Court>
 */
class CourtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sport_type_id' => fake()->randomElement(SportType::all()->pluck('id')),
            'court_business_id' => fake()->randomElement(CourtBusiness::all()->pluck('id')),
            'title' => fake()->cityPrefix(). ' Sports Arena',
            'zipcode' => fake()->postcode,
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
