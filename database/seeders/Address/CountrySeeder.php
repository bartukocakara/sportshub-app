<?php

namespace Database\Seeders\Address;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countriesData = [

            ['title' => 'Turkey', 'code' => 'TR'],

        ];

        $countries = [];
        $id = 1; // Starting ID

        foreach ($countriesData as $countryData) {
            $countries[] = [
                'id' => $id++,
                'title' => $countryData['title'],
                'code' => $countryData['code'],
            ];
        }

        Country::insert($countries);
    }
}
