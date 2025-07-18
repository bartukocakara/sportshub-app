<?php

namespace App\Http\Resources\Request;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MatchTeamPlayerResource as ResourcesMatchTeamPlayerResource;
use App\Http\Resources\UserResource;

class RequestMatchTeamResource extends JsonResource
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
            'title' => $this->title,
            'sport_type_id' => $this->sport_type_id,
            'items' => ResourcesMatchTeamPlayerResource::collection($this->whenLoaded('requestMatchTeamPlayers')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date
        ];
    }
}
