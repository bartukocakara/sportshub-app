<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Court;
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
            $announcements[] = [
                'id' => Str::uuid()->toString(),
                'sport_type_id' => $sportTypes->random()->id,
                'type' => 'court_available', // 🔧 yeni eklendi
                'subject_type' => Court::class,
                'subject_id' => $court->id,
                'created_user_id' => $users->random()->id,
                'title' => 'Court available between: 18:00 - 24:00',
                'message' => 'We have ' . $this->faker->numberBetween(1, 5) . ' courts available between these hours!',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        // Team duyuruları
        Team::all()->each(function ($team) use (&$announcements, $users) {
            $announcements[] = [
                'id' => Str::uuid()->toString(),
                'sport_type_id' => $team->sport_type_id,
                'type' => 'team_needs_player', // 🔧 yeni eklendi
                'subject_type' => Team::class,
                'subject_id' => $team->id,
                'created_user_id' => $users->random()->id,
                'title' => "{$team->title} is recruiting!",
                'message' => 'We are looking for ' . $this->faker->numberBetween(1, 3) . ' more players to join our team.',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        // Match duyuruları
        Matches::all()->each(function ($match) use (&$announcements, $users) {
            $announcements[] = [
                'id' => Str::uuid()->toString(),
                'sport_type_id' => $match->sport_type_id,
                'type' => 'match_needs_player', // 🔧 yeni eklendi
                'subject_type' => Matches::class,
                'subject_id' => $match->id,
                'created_user_id' => $users->random()->id,
                'title' => ($match->title ?: 'Unnamed Match') . ' is recruiting!',
                'message' => 'We are looking for ' . $this->faker->numberBetween(1, 3) . ' more players to join our match.',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        Announcement::insert($announcements);
    }

}
