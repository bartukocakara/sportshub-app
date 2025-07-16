<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\Match\MatchResource;
use Illuminate\Http\Resources\Json\JsonResource;

 class RequestReservationMatchResource extends JsonResource
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
            'request_reservation_id' => $this->request_reservation_id,
            'match' => [
                'id' => $this->match->id,
                'title' => $this->match->title,
                'play_date' => $this->match->play_date,
                'field_usage_type' => $this->match->field_usage_type,
            ],
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
        ];
    }
}
