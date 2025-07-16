<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\Player\PlayerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestCreateCourtBusinessResource extends JsonResource
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
            'user' => PlayerResource::make($this->whenLoaded('requestedUser')),
            'court_business_id' => $this->court_id,
            'title' => $this->title,
            'expiring_date' => $this->expiring_date,
            'status' => config('status.request.'.$this->status),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date,
        ];
    }
}
