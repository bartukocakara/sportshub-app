<?php

namespace App\Http\Resources\Request;

use App\Http\Resources\Match\MatchResource;
use App\Http\Resources\Match\MatchStatusResource;
use App\Http\Resources\Player\PlayerResource;
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
        $match = $this->matchTeam->match;
        return [
            'id' => $this->id,
            'user' => PlayerResource::make($this->whenLoaded('requestedUser')),
            'team_title' => $this->matchTeam->title,
            'match' => [
                'id' => $match->id,
                'title' => $match->title,
                'status' => MatchStatusResource::make($match->status),
                'play_date' => $match->play_date,
                'time' => [
                    'from_hour' => $match->from_hour,
                    'to_hour' => $match->to_hour,
                ],
                'date' => [
                    'start_date' => $this->start_date,
                    'expiring_date' => $this->expiring_date,
                    'play_date' => $this->play_date,
                ],
                'price' => $match->price,
                'created_at' => $match->created_at
            ],
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
