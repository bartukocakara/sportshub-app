<?php

namespace App\Support\Messages;

use App\ValueObjects\SwalMessage;

class TeamSwalMessages
{
    public static function teamCreateSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.team_created_successfully'),
            '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
        );
    }

    // Success message for team join request
    public static function teamJoinRequestSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.team_join_request_sent_successfully'),
            '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
        );
    }

    // Error message for team join request failure
    public static function teamJoinRequestError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.team_join_request_sent_failed'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }

    // Success message for accepting an invitation
    public static function acceptInvitationSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.accept_invitation_body'),
            '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
        );
    }

    // Error message for accepting an invitation failure
    public static function acceptInvitationError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.invite_rejection_failed'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }

    // Success message for rejecting an invitation
    public static function rejectInvitationSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '🤝 ' . __('messages.reject_invitation_body'),
            '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
        );
    }

    // Error message for rejecting a request failure
    public static function rejectRequestError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.request_rejection_failed'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }

    // Success message for cancelling a join request
    public static function cancelJoinRequestSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '✅ ' . __('messages.request_cancelled_title'),
            '<strong>' . __('messages.request_cancelled_body') . '</strong><br><small class="text-muted">' . __('messages.request_cancelled_small') . '</small>'
        );
    }

    // Success message for rejecting an invitation
    public static function rejectInviteSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '✅ ' . __('messages.invite_rejected_title'),
            '<strong>' . __('messages.invite_rejected_body') . '</strong><br><small class="text-muted">' . __('messages.invite_rejected_small') . '</small>'
        );
    }

    // Generic success message for other cases
    public static function genericSuccess(): SwalMessage
    {
        return new SwalMessage(
            __('messages.success'),
            '✅ ' . __('messages.success'),
            '<small>' . __('messages.operation_completed') . '</small>'
        );
    }

    // Error message for cancelling a request failure
    public static function cancelRequestError(): SwalMessage
    {
        return new SwalMessage(
            __('messages.error'),
            '😓 ' . __('messages.failed_to_cancel_request'),
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }

    public static function deletedSuccessfully(): SwalMessage
    {
        return SwalMessage::warning(
            '🗑️ ' . __('messages.team_deleted_successfully'),
            '<strong>' . __('messages.team_deleted_body_line_1') . '</strong><br>' .
            '<small class="text-muted">' . __('messages.team_deleted_body_line_2') . '</small>'
        );
    }

    public static function deleteError(): SwalMessage
    {
        return SwalMessage::error(
            '😔 ' . __('messages.unexpected_error'),
            '<strong>' . __('messages.failed_to_delete_team') . '</strong><br>' .
            '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
        );
    }
}
