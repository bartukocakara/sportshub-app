<?php

namespace Database\Seeders\Team;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\MatchTypeEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Definition;
use App\Models\Team;
use App\Models\User;
use Faker\Generator;
use App\Models\Matches;
use App\Models\TeamMatch;
use App\Models\TeamLeader;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\RequestTeamMatch;
use Illuminate\Container\Container;

class TeamMatchSeeder extends Seeder
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
        $matches = Matches::where('type', MatchTypeEnum::TEAM->value)->limit(200)->get();
        $teamMatchInsert = [];
        $requestTeamMatchInsert = [];
        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        foreach ($matches as $match) {
            for ($i = 0; $i < 2; $i++) {
                $expiringDate = now()->addWeeks($i)->toDateString();

                $teamMatchId = Str::uuid()->toString();
                $teamMatchInsert[] = [
                    'id' => $teamMatchId,
                    'team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
                    'match_id' => $match->id
                ];

                $requestTeamMatchInsert[] = [
                    'id' => Str::uuid()->toString(),
                    'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                    'requested_team_id' => $this->faker->randomElement(TeamLeader::where('user_id', $userId)->pluck('team_id')),
                    'match_id' => $match->id,
                    'status' => $this->faker->randomElement(Definition::where('group_key', 'request_status')->get()->pluck('value')),
                    'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                    'title' => $this->faker->word,
                    'expiring_date' => $expiringDate
                ];

            }
        }

        foreach ($matches as $match) {
            for ($i = 0; $i < 2; $i++) {
                $expiringDate = now()->addWeeks($i)->toDateString();
                $teamMatchId = Str::uuid()->toString();
                $teamMatchInsert[] = [
                    'id' => $teamMatchId,
                    'team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
                    'match_id' => $match->id
                ];

                $requestTeamMatchInsert[] = [
                    'id' => Str::uuid()->toString(),
                    'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                    'requested_team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
                    'status' => $this->faker->randomElement(Definition::where('group_key', 'request_status')->get()->pluck('value')),
                    'match_id' => $match->id,
                    'title' => $this->faker->word,
                    'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                    'expiring_date' => $expiringDate
                ];

            }
        }
        TeamMatch::insert($teamMatchInsert);
        RequestTeamMatch::insert($requestTeamMatchInsert);
    }
}
