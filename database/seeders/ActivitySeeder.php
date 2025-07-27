<?php

namespace Database\Seeders;

use App\Enums\TypeEnums\ActivityTypeEnum;
use App\Models\Team;
use App\Models\User;
use App\Models\Matches;
use App\Models\Activity;
use App\Models\Court;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::inRandomOrder()->take(10)->get();

        foreach ($users as $user) {
            $activities = [
                ['type' => ActivityTypeEnum::MatchCreated,  'subject' => Matches::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::MatchUpdated,  'subject' => Matches::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::MatchCanceled, 'subject' => Matches::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::MatchJoined,   'subject' => Matches::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::TeamCreated,   'subject' => Team::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::TeamUpdated,   'subject' => Team::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::TeamJoined,    'subject' => Team::inRandomOrder()->first()],
                ['type' => ActivityTypeEnum::CourtCreated,  'subject' => Court::inRandomOrder()->first()],
            ];

            foreach ($activities as $item) {
                if (!$item['subject']) {
                    continue;
                }

                Activity::create([
                    'id'            => Str::uuid(),
                    'causer_id'     => $user->id,
                    'type'          => $item['type']->value,
                    'subject_type'  => get_class($item['subject']),
                    'subject_id'    => $item['subject']->id,
                    'properties'    => [
                        'key'    => $item['type']->value,
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
