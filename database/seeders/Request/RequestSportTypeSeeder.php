<?php

namespace Database\Seeders\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\SportType;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\RequestSportType;
use App\Models\RequestSportTypeStatus;
use Illuminate\Container\Container;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RequestSportTypeSeeder extends Seeder
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
        RequestSportType::factory(350)->create();

        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        for ($i=0; $i < 60; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'requested_user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                'sport_type_id' => $this->faker->randomElement(SportType::all()->pluck('id')),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),

                'title' => $this->faker->word,
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        RequestSportType::insert($rows);
    }

}
