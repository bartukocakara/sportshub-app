<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestMatchTeamPlayerResource extends JsonResource
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
            'match_team' => $this->matchTeam,
            'first_name' => $this->requestedUser->first_name,
            'last_name' => $this->requestedUser->last_name,
            'full_name' => $this->requestedUser->first_name. ' '. $this->requestedUser->last_name,
            'avatar' => $this->requestedUser->avatar,
            'status' => config('status.request.'.$this->status),
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date,
        ];
    }
}
