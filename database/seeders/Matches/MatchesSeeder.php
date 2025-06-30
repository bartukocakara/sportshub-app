<?php

namespace Database\Seeders\Matches;

use App\Models\Court;
use App\Models\Definition;
use App\Models\Matches;
use App\Models\SportType;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $teamMatchSettingRows = [];
        $matchInsertRows = [];
        $teamMatchInsertRows = [];
        $matchOwnerInsertRows = [];
        $teamMatchPlayerInsertRows = [];
        $requestTeamMatchRows = [];
        $requestTeamMatchPlayerInsertRows = [];
        // $teamMatchSettingFields = TeamMatchSettingField::all();
        $chatUser1Insert = [];
        $chatUser2Insert = [];
        $reservations = [];
        $reservationSportTypes = [];
        $requestReservationRows = [];
        $requestReservationMatchRows = [];

        // for ($i = 0; $i < 60; $i++) {

        //     $startDate = now()->addDays($i)->toDateString();
        //     $expiringDate = now()->addWeeks($i)->toDateString();
        //     $playDate = now()->addDays(5 + $i)->toDateString();
        //     // Loop for 8 hours each day
        //     for ($hour = 12; $hour < 20; $hour++) {
        //         $courtId = $this->faker->randomElement(Court::all()->pluck('id'));
        //         // $teamId1 = $this->faker->randomElement(Team::all()->pluck('id'));
        //         // $userId1 = $this->faker->randomElement(User::whereHas('teams', function($query) use($teamId1) {
        //         //     $query->where('teams.id', $teamId1);
        //         // })->get()->pluck('id'));
        //         $userId1 = $this->faker->randomElement(User::all()->pluck('id'));

        //         $reservationId = Str::uuid()->toString();
        //         $fieldUsageType = $this->faker->randomElement([FieldUsageTypeEnum::HALF->value, FieldUsageTypeEnum::FULL->value]);
        //         $sportTypeId = $this->faker->randomElement([1]);
        //         $fromHour = sprintf('%02d', $hour) . ':00'; // Start from 08:00 and increment by an hour
        //         $toHour = date('H:i:s', strtotime($fromHour . ' + 1 hour'));
        //         $courtReservationPricing = CourtReservationPricing::where([
        //             'court_id' => $courtId,
        //             'day_of_week' => Carbon::parse($startDate)->dayOfWeek
        //         ])->whereJsonContains('hours', [
        //             'from_hour' => $fromHour,
        //             'to_hour' => $toHour
        //         ])->first();
        //         if ($courtReservationPricing) {
        //             $reservationPrice = $courtReservationPricing->price;
        //         } else {
        //             $reservationPrice = 100; // Default price if no specific pricing found
        //         }
        //         $reservations[] = [
        //             'id' => $reservationId,
        //             'title' => $this->faker->word,
        //             'code' => Str::random(8),
        //             'sport_type_id' => $sportTypeId,
        //             'user_id' => $userId1,
        //             'reservation_status_id' => $this->faker->randomElement(ReservationStatus::all()->pluck('id')),
        //             'court_id' => $courtId,
        //             'from_hour' => $fromHour,
        //             'to_hour' => $toHour,
        //             'price' => $reservationPrice,
        //             'date' => Carbon::today()->addDays($i)->format('Y-m-d'), // Start from today and increment by a day for each iteration
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ];
        //         $requestReservationId = Str::uuid()->toString();
        //         $matchId = Str::uuid()->toString();
        //         $requestReservationRows[] = [
        //             'id' => $requestReservationId,
        //             'requested_user_id' => $userId1,
        //             'reservation_id' => $reservationId,
        //             'court_id' => $courtId,
        //             'from_hour' => $fromHour,
        //             'to_hour' => $toHour,
        //             'date' => Carbon::today()->addDays($i)->format('Y-m-d'),
        //             'field_usage_type' => $fieldUsageType,
        //             'price' => $reservationPrice,
        //             'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
        //                     RequestStatusEnum::ACCEPTED->value,
        //                     RequestStatusEnum::REJECTED->value]),
        //             'title' => 'I want to rent a court',
        //             'expiring_date' =>  $expiringDate,
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ];
        //         $requestReservationMatchRows[] = [
        //             'id' => Str::uuid()->toString(),
        //             'request_reservation_id' => $requestReservationId,
        //             'match_id' => $matchId,
        //             'created_at' => now(),
        //             'updated_at' => now()
        //         ];

        //         $reservationSportTypes[] = [
        //             'id' => Str::uuid()->toString(),
        //             'reservation_id' => $reservationId,
        //             'sport_type_id' => $sportTypeId
        //         ];
        //         // Assuming 10 matches per hour
        //         $matchTitle = $this->faker->word . ' Match';

        //         $matchInsertRows[] = [
        //             'id' => $matchId,
        //             'court_id' => $courtId,
        //             'transaction_id' => $this->faker->randomElement(Transaction::all()->pluck('id')),
        //             'reservation_id' => $reservationId,
        //             'match_status_id' => $this->faker->randomElement(MatchStatus::all()->pluck('id')),
        //             'sport_type_id' => $sportTypeId,
        //             'type' => MatchTypeEnum::TEAM->value,
        //             'field_usage_type' => $fieldUsageType,
        //             'gender' => $this->faker->randomElement(EventGenderEnum::getKeys()),
        //             'price' => $this->faker->randomFloat(2, 100, 500),
        //             'title' => $matchTitle,
        //             'is_court_private' => $this->faker->boolean(),
        //             'max_player' => $this->faker->numberBetween(8, 12),
        //             'min_player' => $this->faker->numberBetween(4, 6),
        //             'max_team' => $this->faker->numberBetween(4, 6),
        //             'min_team' => $this->faker->numberBetween(2, 4),
        //             'description' => $this->faker->sentence(6, true),
        //             'from_hour' => $fromHour,
        //             'to_hour' => date('H:i:s', strtotime($fromHour . ' + 1 hour')),
        //             'start_date' => $startDate,
        //             'expiring_date' => $expiringDate,
        //             'play_date' => $playDate,
        //             'created_at' => now()
        //         ];

        //         // $teamMatchChatChannel = ChatChannel::insert([
        //         //     [
        //         //         'id' => Str::uuid()->toString(),
        //         //         'chattable_id' => $matchId,
        //         //         'chattable_type' => 'App\Models\Matches',
        //         //         'name' => $matchTitle . 'chat',
        //         //         'created_at' => now(),
        //         //         'updated_at' => now()
        //         //     ]
        //         // ]);

        //         // $teamMatchId1 = Str::uuid()->toString();
        //         // $teamMatchInsertRows[] = [
        //         //     'id' => $teamMatchId1,
        //         //     'match_id' => $matchId,
        //         //     'team_id' => $teamId1,
        //         // ];

        //         $matchOwnerInsertRows[] = [
        //             'user_id' => $userId1,
        //             'match_id' => $matchId,
        //             'created_at' => now()
        //         ];

        //         // $teamMatchPlayerId1 = Str::uuid()->toString();
        //         // $teamMatchPlayerInsertRows[] = [
        //         //     'id' => $teamMatchPlayerId1,
        //         //     'user_id' => $userId1,
        //         //     'position_id' => $this->faker->randomElement(Position::all()->pluck('id')),
        //         //     'team_match_id' => $teamMatchId1,
        //         //     'team_match_player_statuses_id' => $this->faker->randomElement([1, 2, 3])
        //         // ];

        //         // $teamMatchPlayerId2 = Str::uuid()->toString();
        //         // $teamMatchId2 = Str::uuid()->toString();
        //         // $teamId2 = $this->faker->randomElement(Team::all()->pluck('id'));
        //         // $teamMatchInsertRows[] = [
        //         //     'id' => $teamMatchId2,
        //         //     'match_id' => $matchId,
        //         //     'team_id' => $teamId2,
        //         // ];
        //         // $userId2 = $this->faker->randomElement(User::whereHas('teams', function($query) use($teamId2) {
        //         //     $query->where('teams.id', $teamId2);
        //         // })->get()->pluck('id'));
        //         $userId2 = $this->faker->randomElement(User::all()->pluck('id'));

        //         // $positionId = $this->faker->randomElement(Position::all()->pluck('id'));
        //         // $teamMatchPlayerInsertRows[] = [
        //         //     'id' => $teamMatchPlayerId2,
        //         //     'user_id' => $userId2,
        //         //     'position_id' => $positionId,
        //         //     'team_match_id' => $teamMatchId2,
        //         //     'team_match_player_status_id' => $this->faker->randomElement([1, 2, 3])
        //         // ];             $requestTeamMatchId1 = Str::uuid()->toString();
        //         // $requestTeamMatchId2 = Str::uuid()->toString();
        //         // $requestTeamMatchRows[] = [
        //         //     'id' => $requestTeamMatchId1,
        //         //     'requested_user_id' => $userId1,
        //         //     'requested_team_id' => $teamId1,
        //         //     'match_id' => $matchId,
        //         //     'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
        //         //             RequestStatusEnum::ACCEPTED->value,
        //         //             RequestStatusEnum::REJECTED->value]),
        //         //     'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),

        //         //     'title' => $this->faker->word,
        //         //     'expiring_date' => $expiringDate,
        //         // ];
        //         // $requestTeamMatchRows[] = [
        //         //     'id' => $requestTeamMatchId2,
        //         //     'requested_user_id' => $userId2,
        //         //     'requested_team_id' => $teamId2,
        //         //     'match_id' => $matchId,
        //         //     'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
        //         //             RequestStatusEnum::ACCEPTED->value,
        //         //             RequestStatusEnum::REJECTED->value]),
        //         //     'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),

        //         //     'title' => $this->faker->word,
        //         //     'expiring_date' => $expiringDate,

        //         // ];
        //         // $chatUser1Insert[] = [
        //         //     'id' => Str::uuid()->toString(),
        //         //     'user_id' => $userId1,
        //         //     'chat_channel_id' => $teamMatchChatChannel->id,
        //         //     'created_at' => now()
        //         // ];
        //         // $chatUser2Insert[] = [
        //         //     'id' => Str::uuid()->toString(),
        //         //     'user_id' => $userId2,
        //         //     'chat_channel_id' => $teamMatchChatChannel->id,
        //         //     'created_at' => now()
        //         // ];
        //         // foreach ($teamMatchSettingFields as $value) {
        //         //     $teamMatchSettingRows[] = [
        //         //         'match_id' => $matchId,
        //         //         'team_match_setting_field_id' => $value->id,
        //         //         'value' => $this->faker->randomElement([false, true]),
        //         //     ];
        //         // }

        //     }
        // }
        // Reservation::insert($reservations);

        // Matches::insert($matchInsertRows);
        // // TeamMatchSetting::insert($teamMatchSettingRows);
        // MatchOwner::insert($matchOwnerInsertRows);
        // TeamMatch::insert($teamMatchInsertRows);
        // RequestTeamMatch::insert($requestTeamMatchRows);
        // RequestReservation::insert($requestReservationRows);
        // RequestReservationMatch::insert($requestReservationMatchRows);
        // TeamMatchPlayer::insert($teamMatchPlayerInsertRows);
        // RequestTeamMatchPlayer::insert($requestTeamMatchPlayerInsertRows);
        // ChatUser::insert($chatUser1Insert);
        // ChatUser::insert($chatUser2Insert);
        // ChatMessage::create([
        //     'chat_user_id' => $this->faker->randomElement(collect($chatUser1Insert)->pluck('id')->toArray()),
        //     'content' => $this->faker->paragraph(3),
        // ]);

        // PLAYER MATCH
        // $matchSettingFields = MatchSettingField::all();
        $playerMatchRows = [];
        $playerMatchSettingRows = [];
        $matchTeamInsertRows = [];
        $matchOwnerInsertRows = [];
        $matchTeamPlayerInsertRows = [];
        $requestMatchTeamPlayerInsertRows = [];

        $chatUser1Insert = [];
        $chatUser2Insert = [];
        $me = User::where('email', 'kocakarabartu@gmail.com')->first();
        $x = 0;
        $reservations = [];
        $reservationSportTypes = [];
        $requestReservationRows = [];
        $requestReservationMatchRows = [];
        $requestReceiverInsertRows = [];
        $startDate = '';
        $expiringDate = '';
        $playDate = '';

        for ($i = 0; $i < 30; $i++) {
            $startDate = now()->addDays($i)->toDateString();
            $expiringDate = now()->addWeeks($i)->toDateString();
            $playDate = now()->addDays(5 + $i)->toDateString();
            for ($hour = 12; $hour < 20; $hour++) {
                $courtId = $this->faker->randomElement(Court::all()->pluck('id'));
                // $reservationId = Str::uuid()->toString();

                $id = Str::uuid()->toString();
                $matchTitle = $this->faker->word . ' Match';
                // if ($x % 5 == 0) {
                //     $userId1 = $me->id;  // Assign $myId if $x is a multiple of 5
                // } else {
                //     $userId1 = $this->faker->randomElement(User::all()->pluck('id')); // Assign random user id otherwise
                // }
                // $fieldUsageType = $this->faker->randomElement([FieldUsageTypeEnum::HALF->value, FieldUsageTypeEnum::FULL->value]);
                $sportTypeId = $this->faker->randomElement(SportType::all()->pluck('id'));
                $fromHour = sprintf('%02d', $hour) . ':00'; // Start from 08:00 and increment by an hour
                $toHour = date('H:i:s', strtotime($fromHour . ' + 1 hour'));
                // $courtReservationPricing = CourtReservationPricing::where([
                //     'court_id' => $courtId,
                //     'day_of_week' => Carbon::parse($startDate)->dayOfWeek
                // ])->whereJsonContains('hours', [
                //     'from_hour' => $fromHour,
                //     'to_hour' => $toHour
                // ])->first();
                // if ($courtReservationPricing) {
                //     $reservationPrice = $courtReservationPricing->price;
                // } else {
                //     $reservationPrice = 100; // Default price if no specific pricing found
                // }
                // $reservations[] = [
                //     'id' => $reservationId,
                //     'title' => $this->faker->word,
                //     'user_id' => $userId1,
                //     'court_id' => $courtId,
                //     'reservation_status_id' => $this->faker->randomElement(ReservationStatus::all()->pluck('id')),
                //     'code' => Str::random(8),
                //     'sport_type_id' => $sportTypeId,
                //     'field_usage_type' => $fieldUsageType,
                //     'from_hour' => $fromHour,
                //     'to_hour' => $toHour,
                //     'price' => $reservationPrice,
                //     'date' => Carbon::today()->addDays($i)->format('Y-m-d'), // Start from today and increment by a day for each iteration
                //     'created_at' => now(),
                //     'updated_at' => now(),
                // ];
                // $requestReservationId = Str::uuid()->toString();
                // $requestReservationRows[] = [
                //     'id' => $requestReservationId,
                //     'requested_user_id' => $userId1,
                //     'reservation_id' => $reservationId,
                //     'court_id' => $courtId,
                //     'from_hour' => $fromHour,
                //     'to_hour' => $toHour,
                //     'date' => Carbon::today()->addDays($i)->format('Y-m-d'),
                //     'price' => $reservationPrice,
                //     'field_usage_type' => $fieldUsageType,
                //     'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                //             RequestStatusEnum::ACCEPTED->value,
                //             RequestStatusEnum::REJECTED->value]),
                //     'title' => 'I want to rent a court',
                //     'expiring_date' =>  $expiringDate,
                //     'created_at' => now(),
                //     'updated_at' => now()
                // ];
                // $requestReservationMatchRows[] = [
                //     'id' => Str::uuid()->toString(),
                //     'request_reservation_id' => $requestReservationId,
                //     'match_id' => $id,
                //     'created_at' => now(),
                //     'updated_at' => now()
                // ];

                $playerMatchRows[] = [
                    'id' => $id,
                    'court_id' => $courtId,
                    'match_status' => $this->faker->randomElement(Definition::where('group_key', 'match_status')->get()->pluck('value')),
                    'sport_type_id' => $sportTypeId,
                    // 'reservation_id' => $reservationId,
                    'type' => 1,
                    'is_court_private' => $this->faker->boolean(),
                    // 'field_usage_type' => $this->faker->randomElement([FieldUsageTypeEnum::HALF->value, FieldUsageTypeEnum::FULL->value]),
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
                // $reservationSportTypes[] = [
                //     'id' => Str::uuid()->toString(),
                //     'reservation_id' => $reservationId,
                //     'sport_type_id' => $sportTypeId
                // ];
                $playerMatchChatChannelId = Str::uuid()->toString();

                // $playerMatchChatChannel = ChatChannel::insert([
                //     [
                //         'id' => $playerMatchChatChannelId,
                //         'chattable_id' => $id,
                //         'chattable_type' => 'App\Models\Matches',
                //         'name' => $matchTitle . 'chat',
                //         'created_at' => now(),
                //         'updated_at' => now()
                //     ]
                // ]);

                // $matchTeamId1 = Str::uuid()->toString();
                // $matchTeamInsertRows[] = [
                //     'id' => $matchTeamId1,
                //     'match_id' => $id,
                //     'title' => $this->faker->randomElement(['Team 1', 'Team 2', 'Team 3',
                //         'Team A', 'Team B', 'Team C',
                //         'Team D', 'Team E', 'Team F']),
                // ];
                // $matchTeamId2 = Str::uuid()->toString();

                // $matchTeamInsertRows[] = [
                //     'id' => $matchTeamId2,
                //     'match_id' => $id,
                //     'title' => $this->faker->randomElement(['Team 1', 'Team 2', 'Team 3',
                //         'Team A', 'Team B', 'Team C',
                //         'Team D', 'Team E', 'Team F']),
                // ];


                // $y = 0;
                for ($j = 0; $j < 5; $j++) {
                    // if ($y % 5 == 0) {
                    //     $userId1 = $me->id;  // Assign $myId if $x is a multiple of 5
                    // } else {
                    //     $userId1 = $this->faker->randomElement(User::all()->pluck('id')); // Assign random user id otherwise
                    // }
                    // $matchTeamPlayerId1 = Str::uuid()->toString();
                    // $matchTeamPlayerInsertRows[] = [
                    //     'id' => $matchTeamPlayerId1,
                    //     'user_id' => $userId1 ,
                    //     'position_id' => $this->faker->randomElement(Position::all()->pluck('id')),
                    //     'match_team_id' => $matchTeamId1,
                    //     'match_team_player_status_id' => $this->faker->randomElement([1, 2, 3])
                    // ];
                    // $matchTeamPlayerId2 = Str::uuid()->toString();
                    // $userId2 = $this->faker->randomElement(User::all()->pluck('id'));
                    // $positionId = $this->faker->randomElement(Position::where(['sport_type_id' => $sportTypeId])->get()->pluck('id'));
                    // $matchTeamPlayerInsertRows[] = [
                    //     'id' => $matchTeamPlayerId2,
                    //     'user_id' => $userId2,
                    //     'match_team_id' => $matchTeamId2,
                    //     'position_id' => $positionId,
                    //     'match_team_player_status_id' => $this->faker->randomElement([1, 2, 3])
                    // ];

                    // $requestMatchTeamPlayerInsertRows[] = [
                    //     'id' => Str::uuid()->toString(),
                    //     'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                    //     'position_id' => $positionId,
                    //     'match_team_id' => $matchTeamId1,
                    //     'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                    //         RequestStatusEnum::ACCEPTED->value,
                    //         RequestStatusEnum::REJECTED->value]),
                    //     'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                    //     'title' => $this->faker->word,
                    //     'expiring_date' => $expiringDate,
                    //     'created_at' => now(),
                    //     'updated_at' => now()
                    // ];
                    // $requestMatchTeamPlayerId = Str::uuid()->toString();
                    // $requestMatchTeamPlayerInsertRows[] = [
                    //     'id' => $requestMatchTeamPlayerId,
                    //     'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                    //     'position_id' => $positionId,
                    //     'match_team_id' => $matchTeamId2,
                    //     'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                    //         RequestStatusEnum::ACCEPTED->value,
                    //         RequestStatusEnum::REJECTED->value]),
                    //     'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                    //     'title' => $this->faker->word,
                    //     'expiring_date' => $expiringDate,
                    //     'created_at' => now(),
                    //     'updated_at' => now()
                    // ];
                    // $requestReceiverInsertRows[] = [
                    //     'id' => Str::uuid()->toString(),
                    //     'requestable_id' => $requestMatchTeamPlayerId,
                    //     'requestable_type' => 'App\Models\RequestMatchTeamPlayer',
                    //     'receiver_user_id' => $userId2,
                    //     'name' => 'match_team_player',
                    //     'created_at' => now(),
                    //     'updated_at' => now()
                    // ];

                    // $chatUser1Insert[] = [
                    //     'id' => Str::uuid()->toString(),
                    //     'user_id' => $userId1,
                    //     'chat_channel_id' => $playerMatchChatChannelId,
                    //     'created_at' => now()
                    // ];

                    // $chatUser2Insert[] = [
                    //     'id' => Str::uuid()->toString(),
                    //     'user_id' => $userId2,
                    //     'chat_channel_id' => $playerMatchChatChannelId,
                    //     'created_at' => now()
                    // ];
                    // $y++;
                }

                // $matchOwnerInsertRows[] = [
                //     'user_id' => $userId1,
                //     'match_id' => $id,
                //     'created_at' => now()
                // ];

                // foreach ($matchSettingFields as $value) {
                //     $playerMatchSettingRows[] = [
                //         'match_id' => $id,
                //         'match_setting_field_id' => $value->id,
                //         'value' => $this->faker->randomElement([false, true]),
                //     ];
                // }

                $x++;
            }
        }

        // Reservation::insert($reservations);
        // ReservationSportType::insert($reservationSportTypes);
        // RequestReservation::insert($requestReservationRows);
        // RequestReceiver::insert($requestReceiverInsertRows);

        Matches::insert($playerMatchRows);
        // RequestReservationMatch::insert($requestReservationMatchRows);

        // MatchSetting::insert($playerMatchSettingRows);
        // MatchOwner::insert($matchOwnerInsertRows);
        // MatchTeam::insert($matchTeamInsertRows);
        // MatchTeamPlayer::insert($matchTeamPlayerInsertRows);
        // RequestMatchTeamPlayer::insert($requestMatchTeamPlayerInsertRows);
        // ChatUser::insert($chatUser1Insert);
        // ChatUser::insert($chatUser2Insert);
        // ChatMessage::create([
        //     'id' => Str::uuid()->toString(),
        //     'chat_user_id' => $this->faker->randomElement(collect($chatUser1Insert)->pluck('id')->toArray()),
        //     'content' => $this->faker->paragraph(3),
        // ]);
    }
}
