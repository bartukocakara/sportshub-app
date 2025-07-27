<?php

namespace App\Http\Resources;

use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $subjectUrl = null;
        $subjectTitle = null;

        // Subject route üretimi
        if ($this->subject_type === Matches::class) {
            $subjectUrl = route('matches.profile', ['id' => $this->subject_id]);
            $subjectTitle = 'Match #' . $this->subject->title;
        }

        if ($this->subject_type === Team::class) {
            $subjectUrl = route('teams.profile', ['id' => $this->subject_id]);
            $subjectTitle = 'Team #' . $this->subject->title;
        }
        return [
            'id'            => $this->id,
            'type'          => $this->type,
            'causer_id'     => $this->causer_id,
            'subject_type'  => $this->subject_type,
            'subject_id'    => $this->subject_id,
            'properties'    => $this->properties,
            'is_public'     => $this->is_public,
            'activity_at'   => $this->activity_at,
            'subject_url'   => $subjectUrl,
            'subject_title' => $subjectTitle,
            'subject'       => $this->whenLoaded('subject'),
        ];
    }
}
