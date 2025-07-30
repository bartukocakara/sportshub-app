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
            return 'match_owner';
        }

        if ($match->matchTeams()->whereHas('matchTeamPlayers', fn ($query) => $query->where('user_id', $user->id))->exists()) {
            return 'participant';
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
        return $match->matchOwners->pluck('id')->contains(fn ($id) => $id === $user->id);
    }

    public function getMatchTeamPlayerId(User $user, Matches $match): ?string
    {
        $matchTeam = $match->matchTeams()->whereHas('matchTeamPlayers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        if ($matchTeam) {
            $matchTeamPlayer = $matchTeam->matchTeamPlayers()->where('user_id', $user->id)->first();
            return $matchTeamPlayer?->id;
        }

        return null;
    }

    public function getMatchTeamPlayerRequest(User $user, Matches $match): ?RequestMatchTeamPlayer
    {
        return $match->requestMatchTeamPlayers()
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
