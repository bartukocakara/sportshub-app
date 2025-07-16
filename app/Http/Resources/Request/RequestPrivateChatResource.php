<?php

namespace App\Http\Resources\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestPrivateChatResource extends JsonResource
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
            'requested_user_id' => $this->requested_user_id,
            'receiver_user_id' => $this->receiver_user_id,
            'status' => config('status.request.'.$this->status),
            'title' => $this->title,
            'expiring_date' => $this->expiring_date,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
