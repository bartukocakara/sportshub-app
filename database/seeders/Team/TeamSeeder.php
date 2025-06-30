<?php

namespace Database\Seeders\Team;

use App\Models\City;
use App\Models\Team;
use App\Models\User;
use Faker\Generator;
use App\Models\Position;
use App\Models\SportType;
use App\Models\PlayerTeam;
use App\Models\TeamLeader;
use App\Models\TeamStatus;
use App\Models\TeamSetting;
use Illuminate\Support\Str;
use App\Enums\EventGenderEnum;
use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\ChatChannel;
use App\Models\ChatMessage;
use App\Models\ChatUser;
use App\Models\Definition;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use App\Models\RequestPlayerTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    use WithoutModelEvents;

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
     *
     * @return void
     */
    public function run()
    {
        $sportType = SportType::first();
        $playerTeamInsert = [];
        $requestPlayerTeamInsert = [];
        $chatUserInsert = [];

        for ($i=0; $i < 1000; $i++) {
            $expiringDate = now()->addWeeks($i)->toDateString();

            if($i % 5 === 0) {
                $teamTitle = $this->faker->city().' Team';
                $teamId = Str::uuid()->toString();
                Team::insert([
                    [
                        'id' => $teamId,
                        'title' => $teamTitle,
                        'city_id' => $this->faker->randomElement(City::all()->pluck('id')),
                        'sport_type_id' => $this->faker->randomElement(SportType::all()->pluck('id')),
                        'gender' => Definition::where('group_key', 'gender')->inRandomOrder()->first()->value,
                        'team_status' =>Definition::where('group_key', 'team_status')->inRandomOrder()->first()->value,
                        'player_count' => $this->faker->numberBetween(1, 20),
                        'min_player' => $this->faker->numberBetween(0, 4),
                        'max_player' => $this->faker->numberBetween(8, 24),
                    ]
                ]);
                // $chatChannel = ChatChannel::create([
                //     'chattable_id' => $teamId,
                //     'chattable_type' => 'App\Models\Team',
                //     'name' => $teamTitle . 'chat'
                // ]);

                # x * Takım oyuncu sayısına ve göre Chat Users oluştur
                # Takım liderinden Chat Message oluştur
            }
            $randomUserId = $this->faker->randomElement(User::all()->pluck('id'));

            $playerTeamId = Str::uuid()->toString();
            $playerTeamInsert[$i]['id'] = $playerTeamId;
            $playerTeamInsert[$i]['user_id'] = $randomUserId;
            $playerTeamInsert[$i]['team_id'] = $teamId;

            // $chatUserInsert[$i] = [
            //     'id' => Str::uuid()->toString(),
            //     'user_id' => $randomUserId,
            //     'chat_channel_id' => $chatChannel->id
            // ];
            // $requestPlayerTeamInsert[$i] = [
            //     'id' => Str::uuid()->toString(),
            //     'requested_user_id' => $randomUserId,
            //     'team_id' =>  $teamId,
            //     'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
            //                 RequestStatusEnum::ACCEPTED->value,
            //                 RequestStatusEnum::REJECTED->value]),
            //     // 'position_id' => $this->faker->randomElement(Position::where('sport_type_id', $sportType->id)->pluck('id')),
            //     'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
            //     'title' =>  $this->faker->word,
            //     'expiring_date' => $expiringDate
            // ];
        }
        PlayerTeam::insert($playerTeamInsert);
        // RequestPlayerTeam::insert($requestPlayerTeamInsert);
        // ChatUser::insert($chatUserInsert);

        // # Team Setting Insert
        // $teamSettingrows = [];
        // $teamLeadrows = [];
        // $x = 0;
        // for ($i = 1; $i < 250; $i++) {
        //     $x++;
        //     $teamId = $this->faker->randomElement(Team::all()->pluck('id'));
        //     $teamSettingrows[] = [
        //         'team_id' => $teamId,
        //         'team_setting_field_id' => $x,
        //         'value' => false
        //     ];
        //     $teamLeadrows[] = [
        //         'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
        //         'team_id' => $teamId,
        //     ];

        //     if($x === 4) {
        //         $x = 0;
        //     }
        // }
        // ChatMessage::create([
        //     'chat_user_id' => $this->faker->randomElement(collect($chatUserInsert)->pluck('id')->toArray()),
        //     'content' => $this->faker->paragraph(3),
        // ]);
        // TeamSetting::insert($teamSettingrows);
        // TeamLeader::insert($teamLeadrows);
    }
}
