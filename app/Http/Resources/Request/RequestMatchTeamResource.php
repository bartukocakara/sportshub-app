<?php

namespace App\Http\Resources\Request;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Match\MatchTeamPlayerResource;
use App\Http\Resources\Player\PlayerResource;

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
            'user' => PlayerResource::make($this->whenLoaded('requestedUser')),
            'title' => $this->title,
            'sport_type_id' => $this->sport_type_id,
            'items' => MatchTeamPlayerResource::collection($this->whenLoaded('requestMatchTeamPlayers')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date
        ];
    }
}
