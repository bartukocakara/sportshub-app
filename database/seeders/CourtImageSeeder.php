<?php

namespace Database\Seeders;

use App\Models\CourtImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourtImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourtImage::factory(50)->create();
    }
}
