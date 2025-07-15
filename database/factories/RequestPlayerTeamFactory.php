<?php

namespace Database\Factories;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestPlayerTeam>
 */
class RequestPlayerTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomTeam = Team::inRandomOrder()->first();
        return [
            'requested_user_id' => fake()->randomElement(User::all()->pluck('id')),
            'team_id' => $randomTeam->id,
            'title' => fake()->word,
            'type' => fake()->randomElement([RequestTypeEnum::JOIN->value,
                                                RequestTypeEnum::INVITE->value]),
            'status' => fake()->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                                                RequestStatusEnum::ACCEPTED->value,
                                                RequestStatusEnum::REJECTED->value]),

        ];
    }
}
