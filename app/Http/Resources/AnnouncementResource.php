<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class AnnouncementResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $creator = null;
        if ($this->whenLoaded('user')) {
            $creator = [
                'id'        => $this->user->id,
                'full_name' => $this->user->full_name,
                'avatar'    => $this->user->avatar,
            ];
        }

        // Türkçe tarih formatlama
        $createdAt = $this->created_at?->copy()->locale('tr');
        $updatedAt = $this->updated_at?->copy()->locale('tr');

        return [
            'id'                  => $this->id,
            'sport_type_id'       => $this->sport_type_id,
            'type'                => $this->type,
            'subject_type'        => $this->subject_type,
            'subject_id'          => $this->subject_id,
            'title'               => $this->title,
            'message'             => $this->message,
            'created_at'          => $this->created_at?->toISOString(),
            'created_at_readable' => $this->created_at?->format('d M Y, H:i'),
            'created_at_diff'     => $createdAt?->diffForHumans(),
            'created_at_locale'   => $createdAt?->translatedFormat('d F Y l - H:i'), // Örn: 21 Temmuz 2025 Pazartesi - 13:45
            'updated_at'          => $this->updated_at?->toISOString(),
            'updated_at_locale'   => $updatedAt?->translatedFormat('d F Y l - H:i'),
            'created_by'          => $creator,
        ];
    }
}
