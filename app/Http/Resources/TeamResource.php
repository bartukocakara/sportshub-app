<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'title' => $this->title,
            'users' => UserResource::collection($this->whenLoaded('users')),
            'sport_type' => SportTypeResource::make($this->whenLoaded('sportType')),
            'status_definition' => $this->team_status_text,
            'status_badge' => $this->status_badge,
            'city_title' => $this->city_title,
            'created_at' => $this->created_at,
        ];
    }
}
