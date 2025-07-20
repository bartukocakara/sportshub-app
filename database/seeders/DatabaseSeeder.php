<?php

namespace Database\Seeders;

use Database\Seeders\Address\CitySeeder;
use Database\Seeders\Address\CountrySeeder;
use Database\Seeders\Address\DistrictSeeder;
use Database\Seeders\CourtReservationPricingSeeder;
use Database\Seeders\Matches\MatchesSeeder;
use Database\Seeders\Request\RequestCreateCourtSeeder;
use Database\Seeders\Request\RequestMatchSeeder;
use Database\Seeders\Request\RequestMatchTeamPlayerSeeder;
use Database\Seeders\Request\RequestMatchTeamSeeder;
use Database\Seeders\Request\RequestPlayerTeamSeeder;
use Database\Seeders\Request\RequestReceiverSeeder;
use Database\Seeders\Request\RequestSportTypeSeeder;
use Database\Seeders\Request\RequestTeamMatchPlayerSeeder;
use Database\Seeders\Request\RequestTeamMatchSeeder;
use Database\Seeders\Team\TeamMatchSeeder;
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
            DefinitionSeeder::class,
            UserSeeder::class,
            RolePermissionSeeder::class,
            // AdminSeeder::class,
            SportTypeSeeder::class,
            CourtBusinessSeeder::class,
            CourtSeeder::class,
            CourtImageSeeder::class,
            // ReservationSeeder::class,
            // PaymentSeeder::class,
            // RefundSeeder::class,
            // CommissionSeeder::class,
            // AccountSeeder::class,
            // InvoiceSeeder::class,
            CourtReservationPricingSeeder::class,
            TeamSeeder::class,
            MatchesSeeder::class,
            AnnouncementSeeder::class,
            CommentSeeder::class,
            // SubscriptionPlanSeeder::class,
            // SubscriptionPromotionSeeder::class,
            // SubscriptionSeeder::class,
            ActivitySeeder::class,
            PlayerTeamSeeder::class,
            TeamLeaderSeeder::class,
            TeamMatchSeeder::class,
            MatchTeamSeeder::class,
            MatchTeamPlayerSeeder::class,
            // RequestMatchTeamSeeder::class,
            // RequestMatchSeeder::class,
            // RequestMatchTeamPlayerSeeder::class,
            RequestPlayerTeamSeeder::class,
            // RequestTeamMatchSeeder::class,
            // RequestSportTypeSeeder::class,
            RequestCreateCourtSeeder::class,
            RequestReceiverSeeder::class,
            FollowSeeder::class,
            // CourtAddressSeeder::class
        ]);
    }
}
