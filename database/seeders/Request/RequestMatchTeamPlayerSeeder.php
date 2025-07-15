<?php

namespace Database\Seeders\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\Matches;
use App\Models\MatchTeam;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use App\Models\RequestMatchTeamPlayer;

class RequestMatchTeamPlayerSeeder extends Seeder
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

        for ($i=0; $i < 50; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),
                'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                'match_team_id' => $this->faker->randomElement(MatchTeam::all()->pluck('id')),
                'title' => $this->faker->randomElement(Matches::all()->pluck('title')),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }

        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        for ($i=0; $i < 100; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'status' => $this->faker->randomElement([RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                            RequestStatusEnum::ACCEPTED->value,
                            RequestStatusEnum::REJECTED->value]),
                'requested_user_id' => $userId,
                'match_team_id' => $this->faker->randomElement(MatchTeam::all()->pluck('id')),
                'title' => $this->faker->randomElement(Matches::all()->pluck('title')),
                'type' => $this->faker->randomElement([RequestTypeEnum::JOIN->value, RequestTypeEnum::INVITE->value]),
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),

            ];
        }
        RequestMatchTeamPlayer::insert($rows);
    }
}
