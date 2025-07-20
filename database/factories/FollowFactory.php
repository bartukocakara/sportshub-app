<?php

namespace Database\Factories;

use App\Enums\FollowStatusEnum;
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
        do {
            $userId = User::inRandomOrder()->value('id');

            $followableType = $this->faker->randomElement([Team::class, Court::class, User::class]);
            $followableId = match ($followableType) {
                Team::class  => Team::inRandomOrder()->value('id'),
                Court::class => Court::inRandomOrder()->value('id'),
                User::class  => User::inRandomOrder()->value('id'),
            };

            // Kullanıcı kendisini takip etmesin
            if ($followableType === User::class && $followableId === $userId) {
                continue;
            }

            // Aynı ilişki daha önce oluşturulmuş mu?
            $exists = \App\Models\Follow::where([
                'user_id' => $userId,
                'followable_id' => $followableId,
                'followable_type' => $followableType,
            ])->exists();

        } while ($exists);

        return [
            'user_id'         => $userId,
            'followable_id'   => $followableId,
            'followable_type' => $followableType,
            'status'          => $this->faker->randomElement([
                FollowStatusEnum::PENDING->value,
                FollowStatusEnum::ACCEPTED->value,
            ]),
        ];
    }

}
