<?php

namespace Database\Seeders;

use App\Models\Court;
use App\Models\CourtAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Court::factory(50)->create();

        Court::factory(50)
            ->create(['court_business_id' => null])
            ->each(function ($court) {
                $court->courtAddress()->create(
                    CourtAddress::factory()->make()->toArray()
                );
            });
    }
}
