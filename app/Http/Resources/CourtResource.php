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
                CourtReservationPricingResource::collection($this->whenLoaded('courtReservationPricings'))
            ),
        ];
    }
}
