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
            'user_id' => $this->faker->randomElement(User::all()->pluck('id')),
            'court_id' => $this->faker->randomElement(Court::all()->pluck('id')),
            'code' => strtoupper($this->faker->bothify('??###')),
            'from_hour' => $this->faker->time('H:i', '08:00'),
            'to_hour' => $this->faker->time('H:i', '18:00'),
            'date' => $this->faker->dateTimeBetween('-3 days', '+3 days')->format('Y-m-d'),
            'price' => $this->faker->randomFloat(2, 100, 500),
        ];
    }
}
