<?php

namespace Database\Factories;

use App\Models\Follow;
use App\Models\User;
use App\Models\Team;
use App\Models\Court;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowFactory extends Factory
{
    protected $model = Follow::class;

    public function definition(): array
    {
        $userId = User::inRandomOrder()->value('id');

        do {
            $followableType = $this->faker->randomElement([Team::class, Court::class, User::class]);
            $followableId = match ($followableType) {
                Team::class  => Team::inRandomOrder()->value('id'),
                Court::class => Court::inRandomOrder()->value('id'),
                User::class  => User::inRandomOrder()->value('id'),
            };
        } while ($followableType === User::class && $followableId === $userId);

        return [
            'user_id'        => $userId,
            'followable_id'   => $followableId,
            'followable_type' => $followableType,
        ];
    }
}
