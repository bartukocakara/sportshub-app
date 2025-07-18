<?php

namespace App\Services\AccessServices;

use App\Models\Team;
use App\Models\User;

class TeamAccessService
{
    public function determineUserStatus(User $user, Team $team): string
    {
        if ($this->isTeamLeader($user, $team)) {
            return 'leader';
        }

        if ($team->users->contains('id', $user->id)) {
            return 'member';
        }

        $request = $team->requestPlayerTeams()
            ->where('requested_user_id', $user->id)
            ->latest()
            ->first();

        return $request?->status ?? 'none';
    }

    public function isTeamLeader(User $user, Team $team): bool
    {
        return $team->teamLeaders->pluck('user_id')->contains(fn ($id) => $id === $user->id);
    }
}
