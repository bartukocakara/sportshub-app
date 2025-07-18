<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestPlayerTeamResource extends JsonResource
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
            'status' => '',
            'first_name' => $this->requestedUser->first_name,
            'last_name' => $this->requestedUser->last_name,
            'full_name' => $this->requestedUser->first_name. ' '. $this->requestedUser->last_name,
            'avatar' => $this->requestedUser->avatar,
            'user' => UserResource::make($this->whenLoaded('requestedUser')),
            'request_title' => $this->title,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date
        ];
    }
}
