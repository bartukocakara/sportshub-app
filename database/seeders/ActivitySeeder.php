<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use App\Models\Matches;
use App\Models\Activity;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::inRandomOrder()->take(10)->get();

        foreach ($users as $user) {
            $activities = [
                ['type' => 'match.created', 'subject' => Matches::inRandomOrder()->first()],
                ['type' => 'match.joined',  'subject' => Matches::inRandomOrder()->first()],
                ['type' => 'team.created',  'subject' => Team::inRandomOrder()->first()],
                ['type' => 'team.joined',   'subject' => Team::inRandomOrder()->first()],
            ];

            foreach ($activities as $item) {
                if (!$item['subject']) {
                    continue;
                }

                Activity::create([
                    'id'            => Str::uuid(),
                    'causer_id'     => $user->id,
                    'type'          => $item['type'],
                    'subject_type'  => get_class($item['subject']),
                    'subject_id'    => $item['subject']->id,
                    'properties'    => [
                        'key'    => $item['type'],
                        'params' => [
                            'user' => $user->first_name,
                            'id'   => $item['subject']->id,
                        ],
                    ],
                    'is_public'     => true,
                    'activity_at'   => now()->subMinutes(rand(1, 300)),
                ]);
            }
        }
    }
}
