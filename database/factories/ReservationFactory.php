<?php

namespace Database\Factories;

use App\Models\Court;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')), // Assuming user IDs between 1 and 5 exist
            'court_id' => $this->faker->randomElement(Court::all()->pluck('id')), // Assuming court IDs between 1 and 5 exist
            'code' => strtoupper($this->faker->bothify('??###')), // Random code like AB123
            'from_hour' => $this->faker->time('H:i', '08:00'),
            'to_hour' => $this->faker->time('H:i', '18:00'),
            'date' => $this->faker->date(),
            'price' => $this->faker->randomFloat(2, 100, 500), // Price between 100 and 500
        ];
    }
}
