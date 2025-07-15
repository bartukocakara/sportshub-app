<?php

namespace Database\Seeders;

use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\MatchTeam;
use Illuminate\Support\Str;
use App\Models\MatchTeamPlayer;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class MatchTeamPlayerSeeder extends Seeder
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
        $userID = 1;
        for ($i=0; $i < 800; $i++) {
            if ( $i !== 0 && $i % 4 == 0)
            {
                $t++;
            }
            $userID++;
            $array[] = [
                'id' => Str::uuid()->toString(),
                'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                'match_team_id' => $this->faker->randomElement(MatchTeam::all()->pluck('id')),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'participant_status'])->get()->pluck('id'))
            ];
        }

        MatchTeamPlayer::insert($array);
    }
}
