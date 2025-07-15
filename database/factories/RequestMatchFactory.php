<?php

namespace Database\Factories;

use App\Enums\Request\RequestStatusEnum;
use App\Models\User;
use App\Models\Matches;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestMatch>
 */
class RequestMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'requested_user_id' => fake()->randomElement(User::all()->pluck('id')),
            'match_id' => fake()->randomElement(Matches::all()->pluck('id')),
            'title' => fake()->name(),
            'status' => fake()->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                                                RequestStatusEnum::ACCEPTED->value,
                                                RequestStatusEnum::REJECTED->value]),

        ];
    }
}
