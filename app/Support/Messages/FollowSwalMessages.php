<?php

namespace App\Support\Messages;

use App\ValueObjects\SwalMessage;

class FollowSwalMessages
{
    public static function followSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.follow_success'),
            '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
        );
    }

    public static function unfollowSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.unfollow_success'),
            '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
        );
    }

    public static function followError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.follow_failed'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }

    public static function unfollowError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.unfollow_failed'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }
}
