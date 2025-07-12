<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SportType;

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
                'description' => 'A racket sport that can be played individually or between two teams of two players.',
                'active' => true,
                'img' => 'sport-types/tennis.png',
            ],
            [
                'path' => 'basketball',
                'title' => 'Basketball',
                'description' => 'Two teams of five players try to score by shooting a ball through a hoop.',
                'active' => true,
                'img' => 'sport-types/Basketball.png',
            ],
            [
                'path' => 'football',
                'title' => 'Football',
                'description' => 'A popular team sport played by two teams with a spherical ball.',
                'active' => true,
                'img' => 'sport-types/football.webp',
            ],
            [
                'path' => 'volleyball',
                'title' => 'Volleyball',
                'description' => 'Two teams of six players separated by a net try to score points.',
                'active' => true,
                'img' => 'sport-types/volleyball.png',
            ],
            // [
            //     'path' => 'badminton',
            //     'title' => 'Badminton',
            //     'description' => 'A racket sport played using a shuttlecock and rackets.',
            //     'active' => true,
            //     'img' => 'sport-types/badminton.avif',
            // ],
            // [
            //     'path' => 'bowling',
            //     'title' => 'Bowling',
            //     'description' => 'Players roll a ball to knock down pins.',
            //     'active' => true,
            //     'img' => 'sport-types/bowling.png',
            // ],
            // [
            //     'path' => 'counter-strike',
            //     'title' => 'Counter Strike',
            //     'description' => 'A tactical first-person shooter video game.',
            //     'active' => true,
            //     'img' => 'sport-types/counter-strike.png',
            // ],
            // [
            //     'path' => 'gokart',
            //     'title' => 'Go Kart',
            //     'description' => 'A motorsport with small, open-wheel vehicles.',
            //     'active' => true,
            //     'img' => 'sport-types/gokart.png',
            // ],
            // [
            //     'path' => 'lol',
            //     'title' => 'League of Legends',
            //     'description' => 'A competitive online game of strategy and teamplay.',
            //     'active' => true,
            //     'img' => 'sport-types/lol.avif',
            // ],
            // [
            //     'path' => 'paintball',
            //     'title' => 'Paintball',
            //     'description' => 'A team shooting sport using paint-filled pellets.',
            //     'active' => true,
            //     'img' => 'sport-types/paintball.jpeg',
            // ],
            // [
            //     'path' => 'rugby',
            //     'title' => 'Rugby',
            //     'description' => 'A contact sport involving two teams competing to carry or kick a ball.',
            //     'active' => true,
            //     'img' => 'sport-types/rugby.avif',
            // ],
        ];

        foreach ($sportTypes as $sportType) {
            SportType::create($sportType);
        }
    }
}
