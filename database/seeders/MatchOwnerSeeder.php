<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use App\Models\Matches;
use App\Models\MatchOwner;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class MatchOwnerSeeder extends Seeder
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
        for ($i= 0; $i < 100; $i++) {
            $rows[] = [
                'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
                'match_id' => $this->faker->randomElement(Matches::all()->pluck('id')),
            ];
        }

        MatchOwner::insert($rows);
    }
}
