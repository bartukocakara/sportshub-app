<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // Generate a fake name
            'email' => $this->faker->unique()->safeEmail(), // Generate a unique fake email
            'password' => bcrypt('password'), // Set a default password (bcrypt is used for encryption)
        ];
    }
}
