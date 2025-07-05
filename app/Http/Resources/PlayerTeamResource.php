<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlayerTeamResource extends JsonResource
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
            'user_id' => $this->player->id,
            'full_name' => $this->player->first_name . ' ' . $this->player->last_name,
            'first_name' => $this->player->first_name,
            'last_name' => $this->player->last_name,
            'gender' => $this->player->gender,
            'avatar' => $this->player->avatar,
            'city' => $this->player->address ? $this->player->address->district->city->title : null,
            'created_at' => $this->created_at,
        ];
    }
}
