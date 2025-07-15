<?php

namespace Database\Seeders\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Definition;
use App\Models\Matches;
use App\Models\Team;
use Faker\Generator;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\RequestTeamMatch;
use Illuminate\Container\Container;
use App\Models\RequestTeamMatchStatus;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestTeamMatchSeeder extends Seeder
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
        $rows = [];
        RequestTeamMatch::factory(350)->create();

        for ($i=0; $i < 100; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                'requested_team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),

                'match_id' => $this->faker->randomElement(Matches::all()->pluck('id')),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'title' => $this->faker->name,
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        RequestTeamMatch::insert($rows);
    }
}
