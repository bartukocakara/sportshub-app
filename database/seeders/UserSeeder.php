<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Bartu',
            'last_name' => 'Kocakara',
            'birth_date' => date('Y-m-d'),
            'email' => 'kocakarabartu@gmail.com',
            'password' => 'password',
        ]);
    }
}
