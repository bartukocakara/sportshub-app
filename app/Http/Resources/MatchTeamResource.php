<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchTeamResource extends JsonResource
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
            'match_id' => $this->match_id,
            'title' => $this->title,
            'match_team_players' => MatchTeamPlayerResource::collection($this->whenLoaded('matchTeamPlayers')),
            'created_at' => $this->created_at,
        ];
    }
}
