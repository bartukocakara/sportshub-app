<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Container\Container;
use Faker\Generator;
use Illuminate\Support\Str;

class UserAddressSeeder extends Seeder
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
        for ($i=0; $i < 300; $i++) {
            $rows[] = [
                'id' => Str::uuid()->toString(),
                'title' => 'Home',
                'zipcode' => fake()->postcode,
                'detail' => fake()->streetAddress,
                'street_name' => fake()->streetName,
                'district_id' => fake()->randomElement(District::all()->pluck('id')),
                'latitude' => fake()->numberBetween(37.500, 39.200),
                'longitude' => fake()->numberBetween(26.500, 30.200),
                'neighborhood' => fake()->state,
                'building_number' => fake()->buildingNumber,
                'user_id' => fake()->randomElement(User::all()->pluck('id')),
                'status' => false
            ];
        }
        UserAddress::insert($rows);
    }
}
