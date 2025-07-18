<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestMatchOwnerResource extends JsonResource
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
            'user' => UserResource::make($this->whenLoaded('requestedUser')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date,
        ];
    }
}
