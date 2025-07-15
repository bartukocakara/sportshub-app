<?php

namespace Database\Seeders\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\Matches;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use App\Models\RequestTeamMatchPlayer;
use App\Models\TeamMatch;

class RequestTeamMatchPlayerSeeder extends Seeder
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
        // RequestTeamMatchPlayer::factory(650)->create();
        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        for ($i=0; $i < 60; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),

                'requested_user_id' => $userId,
                'team_match_id' => $this->faker->randomElement(TeamMatch::all()->pluck('id')),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'title' => $this->faker->randomElement(Matches::all()->pluck('title')),
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        RequestTeamMatchPlayer::insert($rows);
    }
}
