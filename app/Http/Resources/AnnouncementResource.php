<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $creator = null;
        if ($this->whenLoaded('user')) {
            // dd($this->user); // <<< REMOVE OR COMMENT OUT THIS LINE
            // Access the full_name accessor and avatar attribute from the loaded User model
            $creator = [
                'id'        => $this->user->id,
                'full_name' => $this->user->full_name, // This correctly calls the getFullNameAttribute() accessor
                'avatar'    => $this->user->avatar,    // This assumes 'avatar' is a direct column or another accessor
            ];
        }

        return [
            'id'             => $this->id,
            'sport_type_id'  => $this->sport_type_id,
            'type'           => $this->type,
            'subject_type'   => $this->subject_type,
            'subject_id'     => $this->subject_id,
            'title'          => $this->title,
            'message'        => $this->message,
            'created_at'     => $this->created_at->format('M d, Y H:i A'), // Formatted for display
            'created_at_diff' => $this->created_at->diffForHumans(), // e.g., "5 hours ago"
            'updated_at'     => $this->updated_at->format('M d, Y H:i A'),
            'created_by'     => $creator, // Include creator info if relationship loaded
        ];
    }
}
