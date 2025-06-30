<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // 50 rastgele kullanıcı
        User::factory(50)->create();

        // Test kullanıcıları
        $users = [
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Admin',
                'last_name' => 'User',
                'email' => 'admin@example.com',
                'phone_number' => '5000000001',
                'birth_date' => '1990-01-01',
                'password' => 'password',
            ],
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Team',
                'last_name' => 'Leader',
                'email' => 'teamleader@example.com',
                'phone_number' => '5000000002',
                'birth_date' => '1991-02-02',
                'password' => 'password',
            ],
            [
                'id' => Str::uuid()->toString(),
                'first_name' => 'Player',
                'last_name' => 'User',
                'email' => 'player@example.com',
                'phone_number' => '5000000003',
                'birth_date' => '1992-03-03',
                'password' => 'password',
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }
    }
}
