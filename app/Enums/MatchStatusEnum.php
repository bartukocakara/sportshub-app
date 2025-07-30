<?php

namespace App\Enums;

enum MatchStatusEnum: string
{
    case None = 'none';
    case Canceled = 'canceled';
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Completed = 'completed';
    case Accepted = 'accepted';

    public function label(): string
    {
        return match ($this) {
            self::None       => __('messages.none'),
            self::Canceled   => __('messages.canceled'),
            self::Pending    => __('messages.pending'),
            self::Confirmed  => __('messages.confirmed'),
            self::Completed  => __('messages.completed'),
            self::Accepted   => __('messages.accepted'),
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::None       => 'badge badge-secondary',
            self::Canceled   => 'badge badge-danger',
            self::Pending    => 'badge badge-warning',
            self::Confirmed  => 'badge badge-primary',
            self::Completed  => 'badge badge-dark',
            self::Accepted   => 'badge badge-success',
        };
    }

}
