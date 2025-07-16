<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $selectedPlayers = session($request->key ?? 'selected_players', collect([]));
        $selectedIds = $selectedPlayers instanceof \Illuminate\Support\Collection
            ? $selectedPlayers->pluck('id')->toArray()
            : (is_array($selectedPlayers) ? array_column($selectedPlayers, 'id') : []);
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'avatar' => $this->avatar,
            'status_definition' => $this->user_status_text,
            'status_badge' => $this->status_badge,
            // Diğer alanlar
            'is_checked' => in_array($this->id, $selectedIds),
            'created_at' => $this->created_at,
        ];
    }
}
