<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\CourtBusiness;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourtBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourtBusiness::factory(50)->create();
        CourtBusiness::create([
            'id' => Str::uuid(),
            'name' => 'Sports Hub Bartu',
            'owner_first_name' => 'Bartu',
            'owner_last_name' => 'Kocakara',
            'phone' => '5309101193',
            'email' => 'kocakarabartu@gmail.com',
            'address' => '123 Sports Ave, Game City, District X',
            'district_id' => 5,
            'longitude' => 28.9784,
            'latitude' => 41.0082,
            'postal_code' => '34000',
            'standard_price' => 150.00,
            'tax_no' => Str::random(8),
            'password' => 'password'
        ]);
    }
}
