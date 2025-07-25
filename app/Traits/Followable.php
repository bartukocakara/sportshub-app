<?php

namespace App\Traits;

use App\Enums\FollowStatusEnum;
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

    public function follow($userId)
    {
        return $this->followers()->create([
            'user_id' => $userId,
            'status' => FollowStatusEnum::ACCEPTED->value,
        ]);
    }
}
