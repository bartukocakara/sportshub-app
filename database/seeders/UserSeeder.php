<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();
        User::create([
            'id' => Str::uuid(),
            'first_name' => 'Bartu',
            'last_name' => 'Kocakara',
            'phone_number' => '5309101193',
            'email' => 'kocakarabartu@gmail.com',
            'birth_date' => '06-06-1993',
            'password' => 'password'
        ]);
    }
}
