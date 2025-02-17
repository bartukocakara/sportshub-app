<?php

namespace Database\Factories;

use App\Models\Court;
use App\Models\Reservation;
use Illuminate\Support\Str;
use App\Models\CourtBusiness;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commentableTypes = [
            Court::class,
            CourtBusiness::class,
            Reservation::class,
        ];

        $commentableType = $this->faker->randomElement($commentableTypes);
        $commentable = $commentableType::factory()->create();

        return [
            'id' => Str::uuid()->toString(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->paragraph(),
            'user_id' => \App\Models\User::factory(),
            'commentable_type' => $commentableType,
            'commentable_id' => $commentable->id,
        ];
    }
}
