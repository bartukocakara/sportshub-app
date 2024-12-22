<?php

namespace Database\Seeders;

use App\Enums\DayEnum;
use App\Models\Court;
use App\Models\CourtReservationPricing;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Faker\Generator;

class CourtReservationPricingSeeder extends Seeder
{
    public $faker;

    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve all court IDs
        $courtIds = Court::pluck('id')->toArray();
        // Loop through each court
        foreach ($courtIds as $courtId) {
            // Loop through each day of the week
            foreach (DayEnum::cases() as $dayEnum) {
                // Define the hourly intervals
                $hours = [];
                for ($i = 0; $i < 24; $i++) {
                    $fromHour = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00';
                    $toHour = str_pad(($i + 1) % 24, 2, '0', STR_PAD_LEFT) . ':00';

                    $hours[] = [
                        'from_hour' => $fromHour,
                        'to_hour' => $toHour,
                        'price' => $this->faker->randomFloat(2, 50, 200)
                    ];
                }

                // Create court reservation pricing entry
                CourtReservationPricing::create([
                    'court_id' => $courtId,
                    'day_of_week' => $dayEnum->value,
                    'hours' => $hours,
                    'status' => true
                ]);
            }
        }
    }
}
