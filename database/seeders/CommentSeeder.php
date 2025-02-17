<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\User;
use App\Models\Court;
use App\Models\CourtBusiness;
use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $records = [];

        // Define the available commentable types
        $commentableTypes = [
            Court::class,
            CourtBusiness::class,
            Reservation::class,
        ];

        for ($i = 0; $i < 100; $i++) {
            // Pick a random commentable type
            $commentableType = $faker->randomElement($commentableTypes);

            // Get a random instance of the selected model
            $commentable = $commentableType::inRandomOrder()->first();

            // If no instance exists, skip this iteration
            if (!$commentable) {
                continue;
            }

            $records[] = [
                'id' => Str::uuid()->toString(),
                'rating' => $faker->numberBetween(1, 5),
                'comment' => $faker->paragraph(),
                'user_id' => User::factory()->create()->id,
                'commentable_type' => $commentableType,
                'commentable_id' => $commentable->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert all records at once
        if (!empty($records)) {
            Comment::insert($records);
        }
    }
}
