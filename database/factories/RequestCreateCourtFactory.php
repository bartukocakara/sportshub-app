<?php

namespace Database\Factories;

use App\Enums\Request\RequestStatusEnum;
use App\Models\Court;
use App\Models\RequestCreateCourtStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestCreateCourt>
 */
class RequestCreateCourtFactory extends Factory
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
            'court_id' => fake()->randomElement(Court::all()->pluck('id')),
            'title' => fake()->name(),
            'status' => fake()->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                                                RequestStatusEnum::ACCEPTED->value,
                                                RequestStatusEnum::REJECTED->value]),
        ];
    }
}
