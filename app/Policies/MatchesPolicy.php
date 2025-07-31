<?php

namespace App\Policies;

use App\Models\Matches;
use App\Models\User;

class MatchesPolicy
{
    public function viewRequestedPlayers(User $user, Matches $match): bool
    {
        return $match->matchOwners()->where('user_id', $user->id)->exists();
    }

    public function deleteRequestMatchTeamPlayer(User $user, Matches $match): bool
    {
        return $match->matchOwners()->where('user_id', $user->id)->exists();
    }

    public function update(User $user, Matches $match): bool
    {
        return $match->matchOwners()->where('user_id', $user->id)->exists();
    }

    public function delete(User $user, Matches $match): bool
    {
        return $match->matchOwners()->where('user_id', $user->id)->exists();
    }

    public function createMatchTeam(User $user, Matches $match): bool
    {
        return $match->matchOwners()->where('user_id', $user->id)->exists();
    }

    public function matchTeamsSort(User $user, Matches $match): bool
    {
        return $match->matchOwners()->where('user_id', $user->id)->exists();
    }
}
