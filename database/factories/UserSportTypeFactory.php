<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\SportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSportType>
 */
class UserSportTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->randomElement(User::all()->pluck('id')),
            'sport_type_id' => fake()->randomElement(SportType::all()->pluck('id')),
        ];
    }
}
