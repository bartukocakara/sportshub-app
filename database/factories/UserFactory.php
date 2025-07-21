<?php

namespace Database\Factories;

use App\Models\Definition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $avatarList = [];
        $files = Storage::disk('public')->files('avatar'); // ✅ Correct
        foreach ($files as $file) {
            $avatarList[] = basename($file);
        }
        return [
            'id'    => Str::uuid()->toString(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'birth_date' => $this->faker->date('Y-m-d', '2005-01-01'),
            'gender' => Definition::where('group_key', 'personal_gender')->inRandomOrder()->first()->value,
            'password' => Hash::make('password'),
            'provider' => null,
            'provider_id' => null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'avatar' => 'avatar/'.fake()->randomElement($avatarList),
        ];
    }
}
