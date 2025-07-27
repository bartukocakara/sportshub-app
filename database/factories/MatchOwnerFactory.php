<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Matches;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\matchOwner>
 */
class MatchOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'match_id' => fake()->randomElement(Matches::all()->pluck('id')),
            'user_id' => fake()->randomElement(User::all()->pluck('id')),
        ];
    }
}
