<?php

namespace Database\Seeders;

use Database\Seeders\Address\CitySeeder;
use Database\Seeders\Address\CountrySeeder;
use Database\Seeders\Address\DistrictSeeder;
use Database\Seeders\CourtReservationPricingSeeder;
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
            InvoiceSeeder::class,
            CourtReservationPricingSeeder::class,
            AnnouncementSeeder::class,
            // CourtAddressSeeder::class

        ]);
    }
}
