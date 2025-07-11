<?php

namespace Database\Factories;

use App\Models\Matches;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MatchTeam>
 */
class MatchTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'match_id' => fake()->randomElement(Matches::all()->pluck('id')),
            'title' => fake()->randomElement(['Team A', 'Team B', 'Team C', 'Team D']),
        ];
    }
}
