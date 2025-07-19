<?php

namespace App\Enums;

enum UserTeamStatusEnum: string
{
    case None = 'none';
    case Rejected = 'rejected';
    case WaitingForApproval = 'waiting_for_approval';
    case Leader = 'leader';
    case Member = 'member';
    case Accepted = 'accepted';

    public function label(): string
    {
        return match($this) {
            self::None, self::Rejected => __('messages.join'),
            self::WaitingForApproval => __('messages.waiting_for_approval'),
            self::Leader => __('messages.leader'),
            self::Accepted, self::Member => __('messages.member'),
        };
    }

    public function badgeClass(): string
    {
        return match($this) {
            self::None, self::Rejected => 'badge badge-secondary',
            self::WaitingForApproval => 'badge badge-warning',
            self::Leader => 'badge badge-info',
            self::Accepted, self::Member => 'badge badge-success',
        };
    }

}
