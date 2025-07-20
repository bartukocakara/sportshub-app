<?php

namespace App\Services\AccessServices;

use App\Enums\FollowStatusEnum;
use App\Models\Team;
use App\Models\User;

class TeamAccessService
{
    public function getUserRole(User $user, Team $team): string
    {
        if ($this->isTeamLeader($user, $team)) {
            return 'leader';
        }

        if ($team->users->contains('id', $user->id)) {
            return 'member';
        }

        return 'none';
    }

    public function getUserRequestStatus(User $user, Team $team): string
    {
        $request = $this->getUserTeamRequest($user, $team);
        return $request?->status ?? 'none';
    }

    public function isTeamLeader(User $user, Team $team): bool
    {
        return $team->teamLeaders->pluck('user_id')->contains(fn ($id) => $id === $user->id);
    }

    public function getUserTeamRequest(User $user, Team $team): ?\App\Models\RequestPlayerTeam
    {
        return $team->requestPlayerTeams()
            ->where('requested_user_id', $user->id)
            ->latest()
            ->first();
    }

    public function isRequestReceiver(User $user, Team $team): bool
    {
        return $team->requestPlayerTeams()
            ->where('type', 'invite')
            ->where('status', 'waiting_for_approval')
            ->whereHas('receivers', fn ($q) =>
                $q->where('receiver_user_id', $user->id)
            )
            ->exists();
    }

    public function isFollowing(User $user, Team $team): bool
    {
        return $team->followers()
            ->where('user_id', $user->id)
            ->where('status', FollowStatusEnum::ACCEPTED->value) // opsiyonel: sadece kabul edilmiş takipleri say
            ->exists();
    }

    public function getFollowId(User $user, Team $team): ?string
    {
        return $team->followers()
            ->where('user_id', $user->id)
            ->first()?->id;
    }

}
