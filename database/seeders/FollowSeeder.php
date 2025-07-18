<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Follow;

class FollowSeeder extends Seeder
{
    public function run(): void
    {
        Follow::factory()->count(200)->create();
    }
}
