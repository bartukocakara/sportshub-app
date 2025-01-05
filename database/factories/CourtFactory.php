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
           
        ];
    }
}
