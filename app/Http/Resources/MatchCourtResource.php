<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MatchCourtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sport_type_id' => $this->sport_type_id,
            'court_status_id' => $this->court_status_id,
            'title' => $this->title,
            'court_business_id' => $this->court_business_id,
            'court_business' => CourtBusinessResource::make($this->whenLoaded('courtBusiness')),
            'court_address' => CourtAddressResource::make($this->whenLoaded('courtAddress')),
            'images' => CourtImageResource::collection($this->whenLoaded('courtImages')),
            'first_image' => $this->getFirstImageUrl(),
        ];
    }

    private function getFirstImageUrl(): ?string
    {
        $firstImagePath = $this->courtImages->first()?->file_path;

        if ($firstImagePath) {
            return $firstImagePath; // returns e.g. /storage/courts/football/img.jpg
        }

        return null;
    }
}
