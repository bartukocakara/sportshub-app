<?php

namespace Database\Seeders\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Models\Definition;
use App\Models\User;
use Faker\Generator;
use App\Models\Matches;
use Illuminate\Support\Str;
use App\Models\RequestMatch;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class RequestMatchSeeder extends Seeder
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
        for ($i=0; $i < 200; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'status' => $this->faker->randomElement(Definition::where(['group_key' => 'request_status'])->get()->pluck('value')),

                'requested_user_id' => $userId,
                'match_id' => $this->faker->randomElement(Matches::all()->pluck('id')),
                'title' => 'Would you like to join our match ?',
                'expiring_date' =>  $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        RequestMatch::insert($rows);
    }
}
