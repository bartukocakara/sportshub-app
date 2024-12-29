<?php

namespace App\Http\Resources;

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
            'is_private' => $this->is_private,
            'court_business_id' => $this->court_business_id,
            'zipcode' => $this->zipcode,
            'street_name' => $this->street_name,
            'address_detail' => $this->address_detail,
            'district_id' => $this->district_id,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'neighborhood' => $this->neighborhood,
            'court_images' => CourtImageResource::collection($this->whenLoaded('courtImages')),
            'court_reservation_pricings' => CourtReservationPricingResource::collection($this->whenLoaded('courtReservationPricings')),
            'building_number' => $this->building_number,
        ];
    }
}
