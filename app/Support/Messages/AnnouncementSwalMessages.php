<?php

namespace App\Support\Messages;

use App\ValueObjects\SwalMessage;

class AnnouncementSwalMessages {
    public static function createSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.announcement_created_successfully'),
            '<br><small class="text-muted">' . __('messages.announcement_created_successfully_prompt') . '</small>'
        );
    }

    // Error message for team join request failure
    public static function createError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.announcement_create_error'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }
}
