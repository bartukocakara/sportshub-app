<?php

namespace App\Traits;

use App\Models\Follow;

trait Followable
{
    public function followers()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function isFollowedBy($user)
    {
        return $this->followers()->where('user_id', $user->id)->exists();
    }
}
