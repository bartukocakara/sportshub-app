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
use App\Models\RequestMatchTeamPlayer;
use App\Models\RequestReceiver;
use App\Models\RequestTeamMatch;
use App\Models\RequestTeamMatchPlayer;
use App\Models\SportType;
use App\Models\Team;
use App\Models\TeamMatch;
use App\Models\TeamMatchPlayer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Faker\Generator;

class MatchesSeeder extends Seeder
{
    public $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TEAM MATCH
        $matchInsertRows = [];
        $teamMatchInsertRows = [];
        $teamMatchPlayerInsertRows = [];
        $requestTeamMatchRows = [];
        $requestTeamMatchPlayerInsertRows = [];

        for ($i = 0; $i < 60; $i++) {

        $startDate = now()->addDays($i)->toDateString();
        $expiringDate = now()->addWeeks($i)->toDateString();
        $playDate = now()->addDays(5 + $i)->toDateString();
        // Loop for 8 hours each day
        for ($hour = 12; $hour < 20; $hour++) {
            $courtId = $this->faker->randomElement(Court::all()->pluck('id'));
            $teamId1 = $this->faker->randomElement(Team::all()->pluck('id'));
            $userId1 = $this->faker->randomElement(User::whereHas('teams', function($query) use($teamId1) {
                $query->where('teams.id', $teamId1);
            })->get()->pluck('id'));
            // $reservationId = Str::uuid()->toString();
            // $fieldUsageType = $this->faker->randomElement([FieldUsageTypeEnum::HALF->value, FieldUsageTypeEnum::FULL->value]);
            $sportTypeId = $this->faker->randomElement(SportType::all()->pluck('id'));
            $fromHour = sprintf('%02d', $hour) . ':00'; // Start from 08:00 and increment by an hour
            $toHour = date('H:i:s', strtotime($fromHour . ' + 1 hour'));

            // $requestReservationId = Str::uuid()->toString();
            $matchId = Str::uuid()->toString();

            $matchTitle = $this->faker->word . ' Match';
            $matchInsertRows[] = [
                'id' => $matchId,
                'court_id' => $courtId,
                // 'reservation_id' => $reservationId,
                'match_status' => $this->faker->randomElement(Definition::where('group_key', 'match_status')->get()->pluck('value')),
                'sport_type_id' => $sportTypeId,
                'type' => MatchTypeEnum::TEAM->value,
                // 'field_usage_type' => $fieldUsageType,
                'gender' => $this->faker->randomElement(Definition::where('group_key', 'group_gender')->get()->pluck('value')),
                'price' => $this->faker->randomFloat(2, 100, 500),
                'title' => $matchTitle,
                'is_court_private' => $this->faker->boolean(),
                'max_player' => $this->faker->numberBetween(8, 12),
                'min_player' => $this->faker->numberBetween(4, 6),
                'max_team' => $this->faker->numberBetween(4, 6),
                'min_team' => $this->faker->numberBetween(2, 4),
                'description' => $this->faker->sentence(6, true),
                'from_hour' => $fromHour,
                'to_hour' => date('H:i:s', strtotime($fromHour . ' + 1 hour')),
                'start_date' => $startDate,
                'expiring_date' => $expiringDate,
                'play_date' => $playDate,
                'created_at' => now()
            ];
            $teamMatchId1 = Str::uuid()->toString();
            $teamMatchInsertRows[] = [
                'id' => $teamMatchId1,
                'match_id' => $matchId,
                'team_id' => $teamId1,
            ];
            $matchOwnerInsertRows[] = [
                    'user_id' => $userId1,
                    'match_id' => $matchId,
                    'created_at' => now()
            ];

            $teamMatchPlayerId1 = Str::uuid()->toString();
            $teamMatchPlayerInsertRows[] = [
                'id' => $teamMatchPlayerId1,
                'user_id' => $userId1,
                'team_match_id' => $teamMatchId1,
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'participant_status'])->get()->pluck('value'))
            ];
            $teamMatchPlayerId2 = Str::uuid()->toString();
            $teamMatchId2 = Str::uuid()->toString();
            $teamId2 = $this->faker->randomElement(Team::all()->pluck('id'));
            $teamMatchInsertRows[] = [
                'id' => $teamMatchId2,
                'match_id' => $matchId,
                'team_id' => $teamId2,
            ];
            $userId2 = $this->faker->randomElement(User::whereHas('teams', function($query) use($teamId2) {
                $query->where('teams.id', $teamId2);
            })->get()->pluck('id'));
            $userId2 = $this->faker->randomElement(User::all()->pluck('id'));
            $teamMatchPlayerInsertRows[] = [
                'id' => $teamMatchPlayerId2,
                'user_id' => $userId2,
                'team_match_id' => $teamMatchId2,
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'participant_status'])->get()->pluck('value')),
            ];             $requestTeamMatchId1 = Str::uuid()->toString();
            $requestTeamMatchId2 = Str::uuid()->toString();
            $requestTeamMatchRows[] = [
                'id' => $requestTeamMatchId1,
                'requested_user_id' => $userId1,
                'requested_team_id' => $teamId1,
                'match_id' => $matchId,
                'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                        RequestStatusEnum::ACCEPTED->value,
                        RequestStatusEnum::REJECTED->value]),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'title' => $this->faker->word,
                'expiring_date' => $expiringDate,
            ];
            $requestTeamMatchRows[] = [
                'id' => $requestTeamMatchId2,
                'requested_user_id' => $userId2,
                'requested_team_id' => $teamId2,
                'match_id' => $matchId,
                'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                        RequestStatusEnum::ACCEPTED->value,
                        RequestStatusEnum::REJECTED->value]),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'title' => $this->faker->word,
                'expiring_date' => $expiringDate,
            ];

        }
        }


        Matches::insert($matchInsertRows);
        // TeamMatchSetting::insert($teamMatchSettingRows);
        MatchOwner::insert($matchOwnerInsertRows);
        TeamMatch::insert($teamMatchInsertRows);

        RequestTeamMatch::insert($requestTeamMatchRows);
        TeamMatchPlayer::insert($teamMatchPlayerInsertRows);
        RequestTeamMatchPlayer::insert($requestTeamMatchPlayerInsertRows);

        // PLAYER MATCH
        // PLAYER MATCH
        $playerMatchRows = [];
        $matchTeamInsertRows = [];
        $matchOwnerInsertRows = [];
        $matchTeamPlayerInsertRows = [];
        $requestMatchTeamPlayerInsertRows = [];
        $requestReceiverInsertRows = [];

        $me = User::where('email', 'kocakarabartu@gmail.com')->first();

        $x = 0;

        $startDate = '';
        $expiringDate = '';
        $playDate = '';

        for ($i = 0; $i < 30; $i++) {
            $startDate = now()->addDays($i)->toDateString();
            $expiringDate = now()->addWeeks($i)->toDateString();
            $playDate = now()->addDays(5 + $i)->toDateString();
            for ($hour = 12; $hour < 20; $hour++) {
                $courtId = $this->faker->randomElement(Court::all()->pluck('id'));

                $id = Str::uuid()->toString();
                $matchTitle = $this->faker->word . ' Match';

                $sportTypeId = $this->faker->randomElement(SportType::all()->pluck('id'));
                $fromHour = sprintf('%02d', $hour) . ':00'; // Start from 12:00 and increment by an hour
                $toHour = date('H:i:s', strtotime($fromHour . ' + 1 hour'));

                $playerMatchRows[] = [
                    'id' => $id,
                    'court_id' => $courtId,
                    'match_status' => $this->faker->randomElement(Definition::where('group_key', 'match_status')->get()->pluck('value')),
                    'sport_type_id' => $sportTypeId,
                    'type' => 1,
                    'is_court_private' => $this->faker->boolean(),
                    'gender' => $this->faker->randomElement(Definition::where('group_key', 'gender')->get()->pluck('value')),
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
                    'created_at' => now()
                ];

                $y = 0;
                for ($j = 0; $j < 5; $j++) {
                    if ($y % 5 == 0) {
                        $userId1 = $me->id;  // Assign $me->id if $y is a multiple of 5
                    } else {
                        $userId1 = $this->faker->randomElement(User::all()->pluck('id')); // Assign random user id otherwise
                    }

                    $matchTeamId1 = Str::uuid()->toString();
                    // Add match_team record for matchTeamId1
                    $matchTeamInsertRows[] = [
                        'id' => $matchTeamId1,
                        'match_id' => $id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $matchTeamPlayerId1 = Str::uuid()->toString();
                    $matchTeamPlayerInsertRows[] = [
                        'id' => $matchTeamPlayerId1,
                        'user_id' => $userId1,
                        'match_team_id' => $matchTeamId1,
                        'status' => $this->faker->randomElement(Definition::where(['group_key' => 'participant_status'])->get()->pluck('value'))
                    ];

                    $matchTeamId2 = Str::uuid()->toString();
                    // Add match_team record for matchTeamId2
                    $matchTeamInsertRows[] = [
                        'id' => $matchTeamId2,
                        'match_id' => $id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $matchTeamPlayerId2 = Str::uuid()->toString();
                    $userId2 = $this->faker->randomElement(User::all()->pluck('id'));
                    $matchTeamPlayerInsertRows[] = [
                        'id' => $matchTeamPlayerId2,
                        'user_id' => $userId2,
                        'match_team_id' => $matchTeamId2,
                        'status' => $this->faker->randomElement(Definition::where(['group_key' => 'participant_status'])->get()->pluck('value'))
                    ];

                    $requestMatchTeamPlayerInsertRows[] = [
                        'id' => Str::uuid()->toString(),
                        'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                        'match_team_id' => $matchTeamId1,
                        'status' => $this->faker->randomElement([
                            RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                            RequestStatusEnum::ACCEPTED->value,
                            RequestStatusEnum::REJECTED->value
                        ]),
                        'type' => $this->faker->randomElement([
                            RequestTypeEnum::JOIN->value,
                            RequestTypeEnum::INVITE->value
                        ]),
                        'title' => $this->faker->word,
                        'expiring_date' => $expiringDate,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $requestMatchTeamPlayerId = Str::uuid()->toString();
                    $requestMatchTeamPlayerInsertRows[] = [
                        'id' => $requestMatchTeamPlayerId,
                        'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                        'match_team_id' => $matchTeamId2,
                        'status' => $this->faker->randomElement([
                            RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                            RequestStatusEnum::ACCEPTED->value,
                            RequestStatusEnum::REJECTED->value
                        ]),
                        'type' => $this->faker->randomElement([
                            RequestTypeEnum::JOIN->value,
                            RequestTypeEnum::INVITE->value
                        ]),
                        'title' => $this->faker->word,
                        'expiring_date' => $expiringDate,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $requestReceiverInsertRows[] = [
                        'id' => Str::uuid()->toString(),
                        'requestable_id' => $requestMatchTeamPlayerId,
                        'requestable_type' => 'App\Models\RequestMatchTeamPlayer',
                        'receiver_user_id' => $userId2,
                        'name' => 'match_team_player',
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $y++;
                }

                $matchOwnerInsertRows[] = [
                    'user_id' => $userId1,
                    'match_id' => $id,
                    'created_at' => now()
                ];

                $x++;
            }
        }
    }
}
