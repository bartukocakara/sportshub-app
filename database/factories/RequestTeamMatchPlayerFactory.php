<?php

namespace Database\Factories;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\User;
use App\Models\RequestTeamMatchPlayerStatus;
use App\Models\TeamMatch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestTeamMatchPlayer>
 */
class RequestTeamMatchPlayerFactory extends Factory
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
            'team_match_id' => fake()->randomElement(TeamMatch::all()->pluck('id')),
            'title' => fake()->name(),
            'type' => fake()->randomElement([RequestTypeEnum::JOIN->value,
                                                RequestTypeEnum::INVITE->value]),
            'status' => fake()->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                                                RequestStatusEnum::ACCEPTED->value,
                                                RequestStatusEnum::REJECTED->value]),

        ];
    }
}
