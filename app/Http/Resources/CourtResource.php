<?php

namespace App\Http\Resources;

use App\Models\CourtBusiness;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Calculate the 7-day average price for all court_reservation_pricings
        $totalPrice = 0;
        $totalCount = 0;

        // Loop through all court_reservation_pricings to calculate the total price and count of all hours
        $this->whenLoaded('courtReservationPricings')->each(function ($pricing) use (&$totalPrice, &$totalCount) {
            // Ensure pricing->hours is an array and not an Eloquent collection
            if (is_array($pricing->hours)) {
                foreach ($pricing->hours as $hour) {
                    $totalPrice += $hour['price']; // Add price of each hour
                    $totalCount++; // Increment the count of hours
                }
            }
        });

        // Calculate the 7-day average price across all hours
        $averagePrice = $totalCount > 0 ? $totalPrice / $totalCount : 0;

        // Format the average price with 2 decimal places and add the ₺ symbol
        $formattedAveragePrice = "₺" . number_format($averagePrice, 2, '.', ',');

        return [
            'id' => $this->id,
            'name' => $this->name,
            'sport_type_id' => $this->sport_type_id,
            'court_status_id' => $this->court_status_id,
            'title' => $this->title,
            'court_business_id' => $this->court_business_id,
            'court_business' => CourtBusinessResource::make($this->whenLoaded('courtBusiness')),
            'court_address' => CourtBusinessResource::make($this->whenLoaded('courtAddress')),
            'court_images' => CourtImageResource::collection($this->whenLoaded('courtImages')),
            // Only show court_reservation_pricings if court_address is not loaded
            'court_reservation_pricings' => $this->when(
                !$this->whenLoaded('courtAddress'),
                CourtReservationPricingResource::collection($this->whenLoaded('courtReservationPricings'))->map(function ($pricing) {
                    // Calculate average price of hours for the individual court_reservation_pricing
                    $averagePrice = collect($pricing->hours)->avg('price'); // Handling hours as array directly

                    return [
                        'id' => $pricing->id,
                        'court_id' => $pricing->court_id,
                        'day_of_week' => $pricing->day_of_week,
                        'status' => $pricing->status,
                        'hours' => collect($pricing->hours)->map(function ($hour) {
                            return [
                                'from_hour' => $hour['from_hour'],
                                'to_hour' => $hour['to_hour'],
                                'price' => $hour['price'],
                            ];
                        }),
                        'average_price' => $averagePrice,
                        'created_at' => $pricing->created_at,
                        'updated_at' => $pricing->updated_at,
                    ];
                })
            ),
            // Include the overall 7-day average price for the court
            'court_reservation_pricing_average_price' => $formattedAveragePrice,
        ];
    }
}
