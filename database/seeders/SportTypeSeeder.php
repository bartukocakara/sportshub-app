<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SportType;
use Illuminate\Support\Str;

class SportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sportTypes = [
            [
                'path' => 'tennis',
                'title' => 'Tennis',
                'description' => 'A racket sport that can be played individually against a single opponent or between two teams of two players each.',
                'active' => true,
                'img' => 'images/sports/tennis.png',
            ],
            [
                'path' => 'basketball',
                'title' => 'Basketball',
                'description' => 'A team sport where two teams of five players each try to score by shooting a ball through a hoop.',
                'active' => true,
                'img' => 'images/sports/basketball.png',
            ],
            [
                'path' => 'football',
                'title' => 'Football',
                'description' => 'A popular team sport played by two teams of 11 players with a spherical ball.',
                'active' => true,
                'img' => 'images/sports/football.png',
            ],
            [
                'path' => 'volleyball',
                'title' => 'Volleyball',
                'description' => 'A team sport in which two teams of six players are separated by a net and try to score points by grounding the ball on the opponent\'s side.',
                'active' => true,
                'img' => 'images/sports/volleyball.png',
            ],
            [
                'path' => 'badminton',
                'title' => 'Badminton',
                'description' => 'A racket sport played using rackets to hit a shuttlecock across a net.',
                'active' => true,
                'img' => 'images/sports/badminton.png',
            ],
        ];

        foreach ($sportTypes as $sportType) {
            SportType::create([
                'path' => $sportType['path'],
                'title' => $sportType['title'],
                'description' => $sportType['description'],
                'active' => $sportType['active'],
                'img' => $sportType['img'],
            ]);
        }
    }
}
