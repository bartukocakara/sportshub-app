<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
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
            // 'users' => UserResource::collection($this->whenLoaded('users')),
            'court' => MatchCourtResource::make($this->whenLoaded('court')),
            'sport_type' => SportTypeResource::make($this->whenLoaded('sportType')),
            'status_definition' => $this->match_status_text,
            'status_badge' => $this->status_badge,
            'city_title' => $this->court?->courtAddress?->district?->city?->title,
            'play_date' => $this->play_date,
            'expiring_date' => $this->expiring_date,
            'min_team' => $this->min_team,
            'max_team' => $this->max_team,
            'from_hour' => $this->from_hour,
            'to_hour' => $this->to_hour,
            'created_at' => $this->created_at,
        ];
    }
}
