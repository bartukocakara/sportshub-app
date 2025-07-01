<?php

namespace Database\Seeders;

use Database\Seeders\Address\CitySeeder;
use Database\Seeders\Address\CountrySeeder;
use Database\Seeders\Address\DistrictSeeder;
use Database\Seeders\CourtReservationPricingSeeder;
use Database\Seeders\Matches\MatchesSeeder;
use Database\Seeders\Team\TeamSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            UserSeeder::class,
            DefinitionSeeder::class,
            RolePermissionSeeder::class,
            AdminSeeder::class,
            SportTypeSeeder::class,
            CourtBusinessSeeder::class,
            CourtSeeder::class,
            CourtImageSeeder::class,
            ReservationSeeder::class,
            PaymentSeeder::class,
            RefundSeeder::class,
            CommissionSeeder::class,
            AccountSeeder::class,
            // InvoiceSeeder::class,
            CourtReservationPricingSeeder::class,
            AnnouncementSeeder::class,
            CommentSeeder::class,
            SubscriptionPlanSeeder::class,
            SubscriptionPromotionSeeder::class,
            SubscriptionSeeder::class,
            MatchesSeeder::class,
            TeamSeeder::class,
            ActivitySeeder::class,
            PlayerTeamSeeder::class
            // CourtAddressSeeder::class
        ]);
    }
}
