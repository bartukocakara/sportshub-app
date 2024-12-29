<?php

namespace Database\Seeders;

use App\Models\CourtBusiness;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourtBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourtBusiness::factory(50)->create();
    }
}
