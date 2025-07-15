<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Faker\Generator;
use App\Enums\StatusEnum;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\PlayerTeam;
use App\Models\RequestPlayerTeam;
use App\Models\TeamLeader;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class PlayerTeamSeeder extends Seeder
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

        for ($i=1; $i < 100; $i++) {

            if ($i % 4 == 0)
            {
                $t++;
            }
            $teamId = $this->faker->randomElement(Team::all()->pluck('id'));

            PlayerTeam::create(
                [
                    'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                    'team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
            ]);
        }

        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        for ($i=0; $i < 60; $i++) {
            $teamId = $this->faker->randomElement(Team::all()->pluck('id'));
            PlayerTeam::create(
                [
                    'user_id' => $userId,
                    'team_id' => $teamId,
                ]
            );
        }
    }
}
