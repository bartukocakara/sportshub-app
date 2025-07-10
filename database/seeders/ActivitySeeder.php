<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Court;
use App\Models\Matches;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::inRandomOrder()->take(10)->get();

        foreach ($users as $user) {
            // Simulate random activity types for a user
            $activities = [
                ['type' => 'match.created',    'subject' => Matches::inRandomOrder()->first()],
                ['type' => 'match.joined',    'subject' => Matches::inRandomOrder()->first()],
                ['type' => 'team.created',    'subject' => Team::inRandomOrder()->first()],
                ['type' => 'team.joined',    'subject' => Team::inRandomOrder()->first()],
            ];

            foreach ($activities as $item) {
                if (!$item['subject']) continue;

                Activity::create([
                    'id'            => Str::uuid(),
                    'causer_id'     => $user->id,
                    'type'          => $item['type'],
                    'subject_type'  => get_class($item['subject']),
                    'subject_id'    => $item['subject']->id,
                    'properties'    => [
                        'message' => "{$user->first_name} did {$item['type']} on {$item['subject']->id}",
                    ],
                    'is_public'     => true,
                    'activity_at'   => now()->subMinutes(rand(1, 300)),
                ]);
            }
        }
    }
}
