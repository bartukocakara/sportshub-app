<?php

namespace App\Http\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

class MatchTeamPlayerResource extends JsonResource
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
            'full_name' => $this->user?->first_name . ' ' . $this->user?->last_name,
            'first_name' => $this->user?->first_name,
            'last_name' => $this->user?->last_name,
            'gender' => $this->user?->gender,
            'avatar' => $this->user?->avatar,
            'status_badge' => $this->status_badge,

        ];
    }
}
