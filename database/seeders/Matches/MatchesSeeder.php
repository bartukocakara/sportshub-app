<?php

namespace Database\Seeders\Matches;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\MatchTypeEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Court;
use App\Models\Definition;
use App\Models\Matches;
use App\Models\MatchOwner;
use App\Models\MatchTeam;
use App\Models\MatchTeamPlayer;
use App\Models\RequestMatchTeam;
use App\Models\RequestMatchTeamPlayer;
use App\Models\RequestReceiver;
use App\Models\RequestTeamMatch;
use App\Models\SportType;
use App\Models\Team;
use App\Models\TeamMatch;
use App\Models\TeamMatchPlayer;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Faker\Generator;
use Illuminate\Support\Facades\DB;

class MatchesSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    public function run(): void
    {
        // Validate required data
        if (Court::count() === 0 || SportType::count() === 0 || Team::count() === 0 || User::count() === 0 || Definition::count() === 0) {
            throw new \Exception('Required data (Court, SportType, Team, User, or Definition) is missing. Please seed those tables first.');
        }

        // TEAM MATCH
        $matchInsertRows = [];
        $teamMatchInsertRows = [];
        $teamMatchPlayerInsertRows = [];
        $requestTeamMatchRows = [];
        $matchOwnerInsertRows = [];

        for ($i = 0; $i < 60; $i++) {
            $startDate = now()->addDays($i)->toDateString();
            $expiringDate = now()->addWeeks($i)->toDateString();
            $playDate = now()->addDays(5 + $i)->toDateString();

            for ($hour = 12; $hour < 20; $hour++) {
                $courtId = $this->faker->randomElement(Court::pluck('id')->toArray());
                $teamId1 = $this->faker->randomElement(Team::pluck('id')->toArray());
                $userId1 = $this->faker->randomElement(
                    User::whereHas('teams', fn($query) => $query->where('teams.id', $teamId1))
                        ->pluck('id')
                        ->toArray()
                );
                $teamId2 = $this->faker->randomElement(Team::where('id', '!=', $teamId1)->pluck('id')->toArray());
                $userId2 = $this->faker->randomElement(
                    User::whereHas('teams', fn($query) => $query->where('teams.id', $teamId2))
                        ->pluck('id')
                        ->toArray()
                );

                $sportTypeId = $this->faker->randomElement(SportType::pluck('id')->toArray());
                $fromHour = sprintf('%02d', $hour) . ':00:00';
                $toHour = date('H:i:s', strtotime($fromHour . ' + 1 hour'));
                $matchId = Str::uuid()->toString();
                $matchTitle = $this->faker->word() . ' Match';

                $matchInsertRows[] = [
                    'id' => $matchId,
                    'court_id' => $courtId,
                    'match_status' => $this->faker->randomElement(Definition::where('group_key', 'match_status')->pluck('value')->toArray()),
                    'sport_type_id' => $sportTypeId,
                    'type' => MatchTypeEnum::TEAM->value,
                    'gender' => $this->faker->randomElement(Definition::where('group_key', 'group_gender')->pluck('value')->toArray()),
                    'price' => $this->faker->randomFloat(2, 100, 500),
                    'title' => $matchTitle,
                    'is_court_private' => $this->faker->boolean(),
                    'max_player' => $this->faker->numberBetween(8, 12),
                    'min_player' => $this->faker->numberBetween(4, 6),
                    'max_team' => $this->faker->numberBetween(4, 6),
                    'min_team' => $this->faker->numberBetween(2, 4),
                    'description' => $this->faker->sentence(6, true),
                    'from_hour' => $fromHour,
                    'to_hour' => $toHour,
                    'start_date' => $startDate,
                    'expiring_date' => $expiringDate,
                    'play_date' => $playDate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $teamMatchId1 = Str::uuid()->toString();
                $teamMatchInsertRows[] = [
                    'id' => $teamMatchId1,
                    'match_id' => $matchId,
                    'team_id' => $teamId1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $matchOwnerInsertRows[] = [
                    'user_id' => $userId1,
                    'match_id' => $matchId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $teamMatchPlayerId1 = Str::uuid()->toString();
                $teamMatchPlayerInsertRows[] = [
                    'id' => $teamMatchPlayerId1,
                    'user_id' => $userId1,
                    'team_match_id' => $teamMatchId1,
                    'status' => $this->faker->randomElement(Definition::where('group_key', 'participant_status')->pluck('value')->toArray()),
                ];

                $teamMatchId2 = Str::uuid()->toString();
                $teamMatchInsertRows[] = [
                    'id' => $teamMatchId2,
                    'match_id' => $matchId,
                    'team_id' => $teamId2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $teamMatchPlayerId2 = Str::uuid()->toString();
                $teamMatchPlayerInsertRows[] = [
                    'id' => $teamMatchPlayerId2,
                    'user_id' => $userId2,
                    'team_match_id' => $teamMatchId2,
                    'status' => $this->faker->randomElement(Definition::where('group_key', 'participant_status')->pluck('value')->toArray()),
                ];

                $requestTeamMatchId1 = Str::uuid()->toString();
                $requestTeamMatchRows[] = [
                    'id' => $requestTeamMatchId1,
                    'requested_user_id' => $userId1,
                    'requested_team_id' => $teamId1,
                    'match_id' => $matchId,
                    'status' => $this->faker->randomElement([
                        RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                        RequestStatusEnum::ACCEPTED->value,
                        RequestStatusEnum::REJECTED->value,
                    ]),
                    'type' => $this->faker->randomElement([
                        RequestTypeEnum::JOIN->value,
                        RequestTypeEnum::INVITE->value,
                    ]),
                    'title' => $this->faker->word(),
                    'expiring_date' => $expiringDate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $requestTeamMatchId2 = Str::uuid()->toString();
                $requestTeamMatchRows[] = [
                    'id' => $requestTeamMatchId2,
                    'requested_user_id' => $userId2,
                    'requested_team_id' => $teamId2,
                    'match_id' => $matchId,
                    'status' => $this->faker->randomElement([
                        RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                        RequestStatusEnum::ACCEPTED->value,
                        RequestStatusEnum::REJECTED->value,
                    ]),
                    'type' => $this->faker->randomElement([
                        RequestTypeEnum::JOIN->value,
                        RequestTypeEnum::INVITE->value,
                    ]),
                    'title' => $this->faker->word(),
                    'expiring_date' => $expiringDate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert team match data with validation
        Matches::insert($matchInsertRows);
        MatchOwner::insert($matchOwnerInsertRows);
        TeamMatch::insert($teamMatchInsertRows);
        TeamMatchPlayer::insert($teamMatchPlayerInsertRows);
        RequestTeamMatch::insert($requestTeamMatchRows);

        // PLAYER MATCH
        $matchInsertRows = [];
        $matchTeamInsertRows = [];
        $matchOwnerInsertRows = [];
        $matchTeamPlayerInsertRows = [];
        $requestMatchTeamPlayerInsertRows = [];
        $requestReceiverInsertRows = [];

        $me = User::where('email', 'kocakarabartu@gmail.com')->first();
        if (!$me) {
            throw new \Exception('User with email kocakarabartu@gmail.com not found.');
        }

        for ($i = 0; $i < 30; $i++) {
            $startDate = now()->addDays($i)->toDateString();
            $expiringDate = now()->addWeeks($i)->toDateString();
            $playDate = now()->addDays(5 + $i)->toDateString();

            for ($hour = 12; $hour < 20; $hour++) {
                $courtId = $this->faker->randomElement(Court::pluck('id')->toArray());
                $sportTypeId = $this->faker->randomElement(SportType::pluck('id')->toArray());
                $fromHour = sprintf('%02d', $hour) . ':00:00';
                $toHour = date('H:i:s', strtotime($fromHour . ' + 1 hour'));
                $matchId = Str::uuid()->toString();
                $matchTitle = $this->faker->word() . ' Match';

                $matchInsertRows[] = [
                    'id' => $matchId,
                    'court_id' => $courtId,
                    'match_status' => $this->faker->randomElement(Definition::where('group_key', 'match_status')->pluck('value')->toArray()),
                    'sport_type_id' => $sportTypeId,
                    'type' => MatchTypeEnum::PLAYER->value, // Fixed to use PLAYER enum
                    'is_court_private' => $this->faker->boolean(),
                    'gender' => $this->faker->randomElement(Definition::where('group_key', 'gender')->pluck('value')->toArray()),
                    'price' => $this->faker->randomFloat(2, 100, 500),
                    'title' => $matchTitle,
                    'max_player' => $this->faker->numberBetween(8, 12),
                    'min_player' => $this->faker->numberBetween(4, 6),
                    'max_team' => $this->faker->numberBetween(4, 6),
                    'min_team' => $this->faker->numberBetween(2, 4),
                    'description' => $this->faker->sentence(6, true),
                    'from_hour' => $fromHour,
                    'to_hour' => $toHour,
                    'start_date' => $startDate,
                    'expiring_date' => $expiringDate,
                    'play_date' => $playDate,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                for ($j = 0; $j < 5; $j++) {
                    $userId1 = ($j % 5 === 0) ? $me->id : $this->faker->randomElement(User::pluck('id')->toArray());
                    $userId2 = $this->faker->randomElement(User::where('id', '!=', $userId1)->pluck('id')->toArray());

                    $matchTeamId1 = Str::uuid()->toString();
                    $matchTeamInsertRows[] = [
                        'id' => $matchTeamId1,
                        'match_id' => $matchId,
                        'title' => $this->faker->word() . ' Team',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $matchTeamPlayerId1 = Str::uuid()->toString();
                    $matchTeamPlayerInsertRows[] = [
                        'id' => $matchTeamPlayerId1,
                        'user_id' => $userId1,
                        'match_team_id' => $matchTeamId1,
                        'status' => $this->faker->randomElement(Definition::where('group_key', 'participant_status')->pluck('value')->toArray()),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $matchTeamId2 = Str::uuid()->toString();
                    $matchTeamInsertRows[] = [
                        'id' => $matchTeamId2,
                        'match_id' => $matchId,
                        'title' => $this->faker->word() . ' Team',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $matchTeamPlayerId2 = Str::uuid()->toString();
                    $matchTeamPlayerInsertRows[] = [
                        'id' => $matchTeamPlayerId2,
                        'user_id' => $userId2,
                        'match_team_id' => $matchTeamId2,
                        'status' => $this->faker->randomElement(Definition::where('group_key', 'participant_status')->pluck('value')->toArray()),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $requestMatchTeamPlayerId1 = Str::uuid()->toString();
                    $requestMatchTeamPlayerInsertRows[] = [
                        'id' => $requestMatchTeamPlayerId1,
                        'requested_user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
                        'match_team_id' => $matchTeamId1,
                        'status' => $this->faker->randomElement([
                            RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                            RequestStatusEnum::ACCEPTED->value,
                            RequestStatusEnum::REJECTED->value,
                        ]),
                        'type' => $this->faker->randomElement([
                            RequestTypeEnum::JOIN->value,
                            RequestTypeEnum::INVITE->value,
                        ]),
                        'title' => $this->faker->word(),
                        'expiring_date' => $expiringDate,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $requestMatchTeamPlayerId2 = Str::uuid()->toString();
                    $requestMatchTeamPlayerInsertRows[] = [
                        'id' => $requestMatchTeamPlayerId2,
                        'requested_user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
                        'match_team_id' => $matchTeamId2,
                        'status' => $this->faker->randomElement([
                            RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                            RequestStatusEnum::ACCEPTED->value,
                            RequestStatusEnum::REJECTED->value,
                        ]),
                        'type' => $this->faker->randomElement([
                            RequestTypeEnum::JOIN->value,
                            RequestTypeEnum::INVITE->value,
                        ]),
                        'title' => $this->faker->word(),
                        'expiring_date' => $expiringDate,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $requestReceiverInsertRows[] = [
                        'id' => Str::uuid()->toString(),
                        'requestable_id' => $requestMatchTeamPlayerId2,
                        'requestable_type' => RequestMatchTeamPlayer::class,
                        'receiver_user_id' => $userId2,
                        'name' => 'match_team_player',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }

                $matchOwnerInsertRows[] = [
                    'user_id' => $userId1,
                    'match_id' => $matchId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert player match data with validation

        Matches::insert($matchInsertRows);
        MatchTeam::insert($matchTeamInsertRows);
        MatchOwner::insert($matchOwnerInsertRows);
        MatchTeamPlayer::insert($matchTeamPlayerInsertRows);
        RequestMatchTeamPlayer::insert($requestMatchTeamPlayerInsertRows);
        RequestReceiver::insert($requestReceiverInsertRows);
    }
}