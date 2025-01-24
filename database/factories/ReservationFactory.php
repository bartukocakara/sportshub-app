<?php

namespace Database\Factories;

use App\Enums\ReservationPaymentStatusEnum;
use App\Enums\ReservationStatusEnum;
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
            'status' => $this->faker->randomElement([
                ReservationStatusEnum::WAITING_FOR_APPROVAL->value,
                ReservationStatusEnum::APPROVED->value,
                ReservationStatusEnum::PLAYING->value,
                ReservationStatusEnum::REJECTED->value,
                ReservationStatusEnum::CANCELED->value,
                ReservationStatusEnum::ENDED->value,
            ]),
            'payment_status' => $this->faker->randomElement([
                ReservationPaymentStatusEnum::WAITING_FOR_PAYMENT->value,
                ReservationPaymentStatusEnum::PAYMENT_APPROVED->value,
                ReservationPaymentStatusEnum::PAYMENT_CANCELED->value,
                ReservationPaymentStatusEnum::PAYMENT_REFUNDED->value,
            ]),
            'from_hour' => $this->faker->time('H:i', '08:00'),
            'to_hour' => $this->faker->time('H:i', '18:00'),
            'date' => $this->faker->dateTimeBetween('-3 days', '+3 days')->format('Y-m-d'),
            'price' => $this->faker->randomFloat(2, 100, 500),
        ];
    }
}
