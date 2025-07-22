<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Court;
use App\Models\Definition;
use App\Models\Matches;
use App\Models\Reservation;
use App\Models\SportType;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;
use Faker\Generator;
use Illuminate\Support\Str;

class AnnouncementSeeder extends Seeder
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

    public function run()
    {
        $announcements = [];

        $sportTypes = SportType::all();
        $users = User::all();

        // Reservation duyuruları
        Reservation::all()->each(function ($reservation) use (&$announcements, $sportTypes, $users) {
            $announcements[] = [
                'id' => Str::uuid()->toString(),
                'sport_type_id' => $sportTypes->random()->id,
                'type' => 'match_needs_player', // 🔧 yeni eklendi
                'subject_type' => Reservation::class,
                'subject_id' => $reservation->id,
                'created_user_id' => $users->random()->id,
                'title' => $sportTypes->random()->title . ' Match',
                'message' => 'We need ' . $this->faker->numberBetween(1, 5) . ' more players for this match!',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        // Court duyuruları
        Court::all()->each(function ($court) use (&$announcements, $sportTypes, $users) {
            $courtTypeDefs = Definition::where('group_key', 'court_announcement_type')->get();

            if ($courtTypeDefs->isEmpty()) {
                return;
            }

            $randomDefinition = $courtTypeDefs->random();

            $announcements[] = [
                'id'              => Str::uuid()->toString(),
                'sport_type_id'   => $sportTypes->random()->id,
                'type'            => $randomDefinition->value,
                'subject_type'    => Court::class,
                'subject_id'      => $court->id,
                'created_user_id' => $users->random()->id,
                'title'           => $this->generateCourtTitle($randomDefinition->value, $court),
                'message'         => $this->generateCourtMessage($randomDefinition->value, $court),
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        });


        // Team duyuruları
        Team::all()->each(function ($team) use (&$announcements, $users) {
            $definitionValues = Definition::where('group_key', 'team_announcement_type')->pluck('value')->toArray();

            if (empty($definitionValues)) {
                return;
            }

            $randomType = $this->faker->randomElement($definitionValues);

            $announcements[] = [
                'id'              => Str::uuid()->toString(),
                'sport_type_id'   => $team->sport_type_id,
                'type'            => $randomType,
                'subject_type'    => Team::class,
                'subject_id'      => $team->id,
                'created_user_id' => $users->random()->id,
                'title'           => $this->generateTeamTitle($randomType, $team),
                'message'         => $this->generateTeamMessage($randomType, $team),
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        });

        // Match duyuruları
        Matches::all()->each(function ($match) use (&$announcements, $users) {
            $definitionValues = Definition::where('group_key', 'match_announcement_type')->pluck('value')->toArray();

            if (empty($definitionValues)) {
                return;
            }

            $randomType = $this->faker->randomElement($definitionValues);

            $announcements[] = [
                'id'              => Str::uuid()->toString(),
                'sport_type_id'   => $match->sport_type_id,
                'type'            => $randomType,
                'subject_type'    => Matches::class,
                'subject_id'      => $match->id,
                'created_user_id' => $users->random()->id,
                'title'           => $this->generateMatchTitle($randomType, $match),
                'message'         => $this->generateMatchMessage($randomType, $match),
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        });

        User::all()->each(function ($user) use (&$announcements, $sportTypes)  {
            $userTypeValues = Definition::where('group_key', 'user_announcement_type')->get();

            foreach ($userTypeValues as $definition) {
                $announcements[] = [
                    'id'              => Str::uuid()->toString(),
                    'sport_type_id'   => $this->faker->randomElement($sportTypes->pluck('id')), // User direkt bir sport_type ile eşleşmiyorsa
                    'type'            => $definition->value,
                    'subject_type'    => User::class,
                    'subject_id'      => $user->id,
                    'created_user_id' => $user->id, // Duyuruyu oluşturan kişi kendisi
                    'title'           => $definition->description_en, // veya `description_tr`
                    'message'         => match ($definition->value) {
                        'user_needs_team'  => "I'm looking to join a team! Let's connect.",
                        'user_needs_match' => "Ready to play! Is there any match I can join?",
                        'user_needs_court' => "Anyone knows a free court? I'm ready to book.",
                        default            => "Looking for something!",
                    },
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ];
            }
        });

        Announcement::insert($announcements);
    }

    protected function generateMatchTitle(string $type, Matches $match): string
    {
        return match ($type) {
            'match_needs_player' => ($match->title ?: 'Unnamed Match') . ' is recruiting players!',
            'match_needs_team'   => ($match->title ?: 'Unnamed Match') . ' is recruiting teams!',
            default              => ($match->title ?: 'Unnamed Match') . ' has an announcement.',
        };
    }

    protected function generateMatchMessage(string $type, Matches $match): string
    {
        return match ($type) {
            'match_needs_player' => 'We are looking for ' . rand(1, 3) . ' more players to join our match.',
            'match_needs_team'   => 'We are looking for additional teams to participate in this match.',
            default              => 'Match details available soon.',
        };
    }

    protected function generateTeamTitle(string $type, Team $team): string
    {
        return match ($type) {
            'team_needs_player' => "{$team->title} needs players!",
            'team_needs_match'  => "{$team->title} is looking for matches!",
            default             => "{$team->title} has an announcement.",
        };
    }

    protected function generateTeamMessage(string $type, Team $team): string
    {
        return match ($type) {
            'team_needs_player' => 'We are looking for ' . rand(1, 3) . ' more players to join our team.',
            'team_needs_match'  => 'We are seeking matches to compete in.',
            default             => 'Team news and updates.',
        };
    }

    protected function generateCourtTitle(string $type, Court $court): string
    {
        return match ($type) {
            'court_available' => "Court {$court->title} is available!",
            'court_maintenance' => "Court {$court->title} under maintenance!",
            'court_price_change' => "Price update for court {$court->title}",
            'court_new_feature' => "New features at court {$court->title}",
            default => "Announcement for court {$court->title}",
        };
    }

    protected function generateCourtMessage(string $type, Court $court): string
    {
        return match ($type) {
            'court_available' => "We have availability at court {$court->title} for the upcoming hours.",
            'court_maintenance' => "Court {$court->title} will be closed for maintenance from 14:00 to 18:00.",
            'court_price_change' => "Prices have been updated for court {$court->title}. Check the new rates.",
            'court_new_feature' => "Exciting new facilities and features have been added to court {$court->title}. Come check it out!",
            default => "Updates and announcements regarding court {$court->title}.",
        };
    }

}
