<?php

namespace Database\Factories;

use App\Enums\FollowStatusEnum;
use App\Models\Follow;
use App\Models\User;
use App\Models\Team;
use App\Models\Court;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class FollowFactory extends Factory
{
    protected $model = Follow::class;

    public function definition(): array
    {
        $maxAttempts = 10; // Prevent infinite loops
        $attempt = 0;

        do {
            $userId = User::inRandomOrder()->value('id');
            if (!$userId) {
                throw new \Exception('No users found in the database. Please seed the users table first.');
            }

            $followableType = $this->faker->randomElement([Team::class, Court::class, User::class]);
            $followableId = null;

            switch ($followableType) {
                case Team::class:
                    $followableId = Team::inRandomOrder()->value('id');
                    if (!$followableId) {
                        throw new \Exception('No teams found in the database. Please seed the teams table first.');
                    }
                    break;
                case Court::class:
                    $followableId = Court::inRandomOrder()->value('id');
                    if (!$followableId) {
                        throw new \Exception('No courts found in the database. Please seed the courts table first.');
                    }
                    break;
                case User::class:
                    do {
                        $followableId = User::inRandomOrder()->value('id');
                    } while ($followableId === $userId || !$followableId);
                    break;
            }

            $exists = Follow::where([
                'user_id' => $userId,
                'followable_id' => $followableId,
                'followable_type' => $followableType,
            ])->exists();

            $attempt++;
            if ($attempt >= $maxAttempts) {
                throw new \Exception('Could not find a unique follow combination after ' . $maxAttempts . ' attempts.');
            }
        } while ($exists);

        return [
            'user_id' => $userId,
            'followable_id' => $followableId,
            'followable_type' => $followableType,
            'status' => $this->faker->randomElement([
                FollowStatusEnum::PENDING->value,
                FollowStatusEnum::ACCEPTED->value,
            ]),
        ];
    }
}
