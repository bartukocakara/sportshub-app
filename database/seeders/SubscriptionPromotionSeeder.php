<?php

namespace Database\Seeders;

use App\Models\SubscriptionPromotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionPromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionPromotion::factory()->count(3)->create();
    }
}
