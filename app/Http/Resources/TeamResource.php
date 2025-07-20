<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            'gender' => $this->gender,
            'users' => UserResource::collection($this->whenLoaded('users')),
            'users_count' => $this->users_count,
            'sport_type' => SportTypeResource::make($this->whenLoaded('sportType')),
            'status_definition' => $this->team_status_text,
            'status_badge' => $this->status_badge,
            'status_badge_with_icon ' => $this->status_badge_with_icon,
            'city_title' => $this->city_title,

            'created_at' => Carbon::parse($this->created_at)->translatedFormat('d F Y'),
        ];
    }
}
