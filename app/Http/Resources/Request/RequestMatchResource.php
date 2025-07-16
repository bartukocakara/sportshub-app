<?php

namespace App\Http\Resources\Request;

use App\Enums\StatusEnum;
use App\Http\Resources\Match\MatchTeamResource;
use App\Http\Resources\Player\PlayerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $requestedUserId = $request->requested_user_id;
        $baseArray = [
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'expiring_date' => $this->expiring_date,
        ];

        if(!$requestedUserId) {
            $additionalDatas = [
                'id' => $this->id,
                'user' => PlayerResource::make($this->whenLoaded('requestedUser')),
                'court' => $this->match?->court->title,
                'image' => $this->match->court->courtImage?->file_path,
                'district' => $this->match->court->district->title,
                'city' => $this->match->court->district->city->title,
                'field_usage' => $this->match->field_usage_type,
                'gender' => $this->match->gender,
                'status' => $this->status,
                'time' => [
                    'from_hour' => $this->match->from_hour,
                    'to_hour' => $this->match->to_hour,
                ],
                'date' => [
                    'start_date' => $this->match->start_date,
                    'expiring_date' => $this->match->expiring_date,
                ],
                'title' => $this->title,
                'match_title' => $this->match->title,
                'items' => MatchTeamResource::collection($this->match->matchTeams),
                'actions' => [
                    'cancel_request' => true, // $this->requestMatchStatus?->id === StatusEnum::WAITING,
                    ],
            ];
            $baseArray = array_merge($additionalDatas, $baseArray);
        }
        return $baseArray;
    }
}
