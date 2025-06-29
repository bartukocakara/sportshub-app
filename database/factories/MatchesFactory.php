<?php

namespace Database\Factories;

use App\Models\Court;
use App\Models\PaymentTransaction;
use App\Models\SportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matches>
 */
class MatchesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $beginTime = fake()->time( 'H:i:s', 'now');
        return [
            'court_id' => fake()->randomElement(Court::all()->pluck('id')),
            'transaction_id' => fake()->randomElement(PaymentTransaction::all()->pluck('id')),
            'match_status' => fake()->randomElement(['PENDING','ACTIVE', 'CANCELLED', 'COMPLETED']),
            'sport_type_id' => fake()->randomElement(SportType::all()->pluck('id')),
            // 'field_usage_type' => fake()->randomElement([FieldUsageTypeEnum::HALF->value, FieldUsageTypeEnum::FULL->value]),
            'gender' => fake()->randomElement(['MAN', 'WOMAN', 'MIX']),
            'title' => fake()->word.' Match',
            'price' => fake()->randomFloat(2, 100, 500),
            'max_player' => fake()->numberBetween(8, 12),
            'min_player' => fake()->numberBetween(4, 6),
            'max_team' => fake()->numberBetween(4, 6),
            'min_team' => fake()->numberBetween(2, 4),
            'description' => fake()->sentence(6, true),
            'is_court_private' => fake()->boolean(),
            'from_hour' => $beginTime,
            'to_hour' => fake()->time( 'H:i:s',  '+1 hour',  null),
            'start_date' => fake()->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'expiring_date' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'play_date' => fake()->dateTimeBetween('now', '+2 week')->format('Y-m-d'),
        ];
    }
}
