<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\Court\CourtImageResource;
use App\Http\Resources\Court\CourtReservationPricingResource;
use App\Http\Resources\Match\MatchResource;
use App\Http\Resources\Player\PlayerResource;
use App\Http\Resources\Reservation\ReservationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'items' => RequestReservationMatchResource::collection($this->whenLoaded('requestReservationMatches')),
            'status' => config('status.request.'.$this->status),
            'expiring_date' => $this->expiring_date,
            'pricing' => CourtReservationPricingResource::make($this->whenLoaded('courtReservationPricing'))
        ];
    }
}
