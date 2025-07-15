<?php

namespace Database\Factories;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Matches;
use App\Models\RequestTeamMatchStatus;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestTeamMatch>
 */
class RequestTeamMatchFactory extends Factory
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
            'requested_team_id' => fake()->randomElement(Team::all()->pluck('id')),
            'match_id' => fake()->randomElement(Matches::all()->pluck('id')),
            'title' => fake()->name(),
            'type' => fake()->randomElement([RequestTypeEnum::JOIN->value,
                                                RequestTypeEnum::INVITE->value]),
            'status' => fake()->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                                                RequestStatusEnum::ACCEPTED->value,
                                                RequestStatusEnum::REJECTED->value]),

        ];
    }
}
