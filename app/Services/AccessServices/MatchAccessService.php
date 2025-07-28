<?php

namespace App\Services\AccessServices;

use App\Models\Matches;
use App\Models\RequestMatchTeamPlayer;
use App\Models\User;

class MatchAccessService
{
    public function getUserRole(User $user, Matches $match): string
    {
        if ($this->isMatchOwner($user, $match)) {
            return 'leader';
        }

        if ($match->users->contains('id', $user->id)) {
            return 'member';
        }

        return 'none';
    }

    public function getUserRequestStatus(User $user, Matches $match): string
    {
        $request = $this->getMatchTeamPlayerRequest($user, $match);
        return $request?->status ?? 'none';
    }

    public function isMatchOwner(User $user, Matches $match): bool
    {
        return $match->matchOwners->pluck('user_id')->contains(fn ($id) => $id === $user->id);
    }

    public function getMatchTeamPlayerRequest(User $user, Matches $match): ?RequestMatchTeamPlayer
    {
        return $match->matchTeams()
            ->where('requested_user_id', $user->id)
            ->latest()
            ->first();
    }

    public function isRequestReceiver(User $user, Matches $match): bool
    {
        return $match->requestMatchTeamPlayers()
            ->where('type', 'invite')
            ->where('status', 'waiting_for_approval')
            ->whereHas('receivers', fn ($q) =>
                $q->where('receiver_user_id', $user->id)
            )
            ->exists();
    }
}
