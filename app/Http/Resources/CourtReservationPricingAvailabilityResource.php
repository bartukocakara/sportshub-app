<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourtReservationPricingAvailabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $date = $request->get('date');

        return [
            'id' => $this->id,
            'court_id' => $this->court_id,
            'hours' => collect($this->hours)->map(function ($hour) use ($date) {
                $isReserved = $this->court->reservations->where('date', $date)
                    ->filter(function ($reservation) use ($hour) {
                        return $hour['from_hour'] < $reservation->to_hour &&
                               $hour['to_hour'] > $reservation->from_hour;
                    })
                    ->isNotEmpty();

                return [
                    'from_hour' => $hour['from_hour'],
                    'to_hour' => $hour['to_hour'],
                    'price' => $hour['price'],
                    'reserved' => $isReserved,
                ];
            }),
        ];
    }
}
