<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\Team\TeamResource;
use App\Http\Resources\Player\PlayerResource;
use App\Http\Resources\Team\TeamStatusResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestPlayerTeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $team = $this->team;
        return [
            'id' => $this->id,
            'status' => config('status.request.'.$this->status),
            'first_name' => $this->requestedUser->first_name,
            'last_name' => $this->requestedUser->last_name,
            'full_name' => $this->requestedUser->first_name. ' '. $this->requestedUser->last_name,
            'avatar' => $this->requestedUser->avatar,
            'team' => [
                'id' => $team->id,
                'title' => $team->title,
                'status' => TeamStatusResource::make($team->status),
                'created_at' => $team->created_at
            ],
            'items' => PlayerResource::collection($this->team->users),
            'user' => PlayerResource::make($this->whenLoaded('requestedUser')),
            'request_title' => $this->title,
            'created_at' => $this->created_at?->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date
        ];
    }
}
