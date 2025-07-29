<?php

namespace Database\Seeders\Address;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            ['country_id' => '1', 'title' => 'ankara', 'code' => 35],
            ['country_id' => '1', 'title' => 'antalya', 'code' => 35],
            ['country_id' => '1', 'title' => 'eskisehir', 'code' => 35],
            ['country_id' => '1', 'title' => 'istanbul', 'code' => 35],
            ['country_id' => '1', 'title' => 'izmir', 'code' => 35],
        ]);
    }
}
