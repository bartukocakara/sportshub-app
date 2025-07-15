<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestReceiver>
 */
class RequestReceiverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $chattableType = fake()->randomElement([
            'App\Models\RequestSportType',
            'App\Models\RequestMatch',
            // 'App\Models\RequestMatchOwner',
            'App\Models\RequestPlayerTeam',
            'App\Models\RequestMatchTeamPlayer',
            'App\Models\RequestMatchTeam',
            'App\Models\RequestTeamMatch',
            // 'App\Models\RequestTeamMatchPlayer',
            'App\Models\RequestCreateCourt',
            // 'App\Models\RequestCreateCourtBusiness',
                                            ]);
        $nameMapping = [
            'App\Models\RequestSportType' => 'sport_type',
            'App\Models\RequestMatch' => 'match',
            // 'App\Models\RequestMatchOwner' => 'match_owner',
            'App\Models\RequestPlayerTeam' => 'player_team',
            'App\Models\RequestMatchTeamPlayer' => 'match_team_player',
            'App\Models\RequestMatchTeam' => 'match_team',
            'App\Models\RequestReservation' => 'reservation',
            'App\Models\RequestTeamMatch' => 'tem_match',
            // 'App\Models\RequestTeamMatchPlayer' => 'team_match_player',
            'App\Models\RequestCreateCourt' => 'create_court',
            // 'App\Models\RequestCreateCourtBusiness' => 'create_court_business',
        ];

        return [
            'receiver_user_id' => fake()->randomElement(User::all()->pluck('id')),
            'requestable_id' => fake()->randomElement($chattableType::all()->pluck('id')),
            'requestable_type' => $chattableType,
            'name' => $nameMapping[$chattableType],
        ];
    }
}
