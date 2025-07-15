<?php

namespace Database\Seeders\Request;

use App\Models\Team;
use App\Models\User;
use Faker\Generator;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Definition;
use App\Models\PlayerTeam;
use App\Models\TeamLeader;
use Illuminate\Database\Seeder;
use App\Models\RequestPlayerTeam;
use Illuminate\Container\Container;

class RequestPlayerTeamSeeder extends Seeder
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
     *
     * @return void
     */
    public function run()
    {
        $t = 1;


        for ($i=1; $i < 1000; $i++) {
            if ($i % 4 == 0)
            {
                $t++;
            }
            $randomTeam = Team::inRandomOrder()->first();
            $userId = $this->faker->randomElement(TeamLeader::all()->pluck('user_id'));
            $teamId = $this->faker->randomElement(Team::all()->pluck('id'));
            PlayerTeam::create(
                [
                    'user_id' => $userId,
                    'team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
            ]);

            RequestPlayerTeam::create([
                'requested_user_id' => $userId,
                'team_id' => $teamId,
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),
                'title' => 'Request team title',
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            ]);
        }

        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        for ($i=0; $i < 100; $i++) {
            $randomTeam = Team::inRandomOrder()->first();
            PlayerTeam::create(
                [
                    'user_id' => $userId,
                    'team_id' => $randomTeam->id,
                ]
            );

            RequestPlayerTeam::create([
                'requested_user_id' => $userId,
                'team_id' => $randomTeam->id,
                'status' => $this->faker->randomElement([RequestStatusEnum::ACCEPTED->value,
                                                         RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                                                         RequestStatusEnum::REJECTED->value]),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'title' => 'Request team title',
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            ]);
        }
    }
}
