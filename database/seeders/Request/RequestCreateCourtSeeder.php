<?php

namespace Database\Seeders\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Models\Court;
use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\RequestCreateCourt;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class RequestCreateCourtSeeder extends Seeder
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

        $userId = User::where('email', 'kocakarabartu@gmail.com')->first()->id;
        for ($i=0; $i < 150; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'requested_user_id' => $userId,
                'court_id' => $this->faker->randomElement(Court::all()->pluck('id')),
                'title' => 'Please accept my court request in izmir ?',
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),

                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        RequestCreateCourt::insert($rows);
    }
}
