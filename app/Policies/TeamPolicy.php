<?php

namespace App\Policies;

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TeamPolicy
{
    public function update(User $user, Team $team): bool
    {
        return $team->teamLeaders()->where('user_id', $user->id)->exists();
    }

    public function delete(User $user, Team $team): bool
    {
        return $team->teamLeaders()->where('user_id', $user->id)->exists();
    }
}
