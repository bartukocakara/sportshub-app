<?php

namespace Database\Seeders;

use App\Models\Commission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Commission::factory(100)->create();
    }
}
