<?php

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

trait LogsActivity
{
    public function logActivity(string $type, Model $subject, array $params = [], bool $isPublic = true): void
    {
        Activity::create([
            'id' => Str::uuid(),
            'causer_id' => Auth::id(),
            'type' => $type,
            'subject_type' => get_class($subject),
            'subject_id' => $subject->id,
            'properties' => [
                'key' => $type,
                'params' => $params,
            ],
            'is_public' => $isPublic,
            'activity_at' => now(),
        ]);
    }
}

