<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Faker\Generator;
use App\Models\TeamLeader;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamLeaderSeeder extends Seeder
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
        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        $rows = [];
        for ($i= 0; $i < 5; $i++) {
            $rows[] = [
                'user_id' => $userId,
                'team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
            ];
        }
        for ($i= 0; $i < 100; $i++) {
            $rows[] = [
                'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                'team_id' => $this->faker->randomElement(Team::all()->pluck('id')),
            ];
        }

        TeamLeader::insert($rows);
    }
}
