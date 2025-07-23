<?php

namespace Database\Seeders;

use App\Models\SportType;
use App\Models\User;
use App\Models\UserSportType;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Faker\Generator;

class UserSportTypeSeeder extends Seeder
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
        for ($i = 0; $i < 100; $i++) {
            $rows[] = [
                    'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                    'sport_type_id' => $this->faker->randomElement(SportType::all()->pluck('id')),
            ];
        }
        UserSportType::insert($rows);

        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;

        UserSportType::insert([
            [
                'user_id' => $userId,
                'sport_type_id' => SportType::where('path', 'football')->first()->id,
            ],
            [
                'user_id' => $userId,
                'sport_type_id' => SportType::where('path', 'basketball')->first()->id,
            ],
            [
                'user_id' => $userId,
                'sport_type_id' => SportType::where('path', 'tennis')->first()->id,
            ]
        ]);
    }
}
