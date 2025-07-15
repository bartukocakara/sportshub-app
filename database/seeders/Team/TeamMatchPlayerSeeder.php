<?php

namespace Database\Seeders\Team;

use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\TeamMatch;
use App\Models\PlayerTeam;
use Illuminate\Support\Str;
use App\Models\TeamMatchPlayer;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use App\Models\TeamMatchPlayerStatus;

class TeamMatchPlayerSeeder extends Seeder
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
        $teamMatches = TeamMatch::all();
        $playerTeams = PlayerTeam::all();
        $users = User::all();

        $array = [];

        foreach ($teamMatches as $teamMatch) {
            $teamId = $teamMatch->team_id;
            $playerTeamsForTeam = $playerTeams->where('team_id', $teamId);

            foreach ($playerTeamsForTeam as $playerTeam) {
                $array[] = [
                    'id' => Str::uuid()->toString(),
                    'user_id' => $this->faker->randomElement($users->pluck('id')),
                    'team_match_id' => $teamMatch->id,
                    'status' => $this->faker->randomElement(Definition::where(['group_key' => 'participant_status'])->get()->pluck('value'))
                ];
            }
        }

        TeamMatchPlayer::insert($array);
    }
}
