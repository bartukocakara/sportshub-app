@php
    $userRole = $datas['user_role'] ?? 'none';
    $userStatus = $datas['user_status'] ?? 'none';
    $isTeamLeader = $datas['is_team_leader'] ?? false;
    $isRequestReceiver = $datas['is_request_receiver'] ?? false;
    $requestId = $datas['request_id'] ?? null;
@endphp

@if ($isRequestReceiver && $userStatus === 'waiting_for_approval')
    <form action="{{ route('request-player-teams.accept', ['id' => $requestId]) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-sm btn-success me-2">
            <i class="fas fa-check-circle me-1"></i> {{ __('messages.accept_invitation') }}
        </button>
    </form>

    <a href="#" class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_reject_invite">
        <i class="fas fa-times-circle me-1"></i> {{ __('messages.reject_invitation') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_reject_invite"
        :route="route('request-player-teams.destroy', ['id' => $requestId])"
        :title="__('messages.reject_invitation_title')"
        :message="__('messages.reject_invitation_message')"
        :emotionalWarning="__('messages.reject_invitation_emotional_warning')"
        :buttonText="__('messages.reject_invitation')"
        icon="fas fa-times-circle"
        color="secondary"
        emoji="🙅‍♂️"
    />

@elseif ($userRole === 'leader')
    <button class="btn btn-sm btn-info me-2" disabled>
        <i class="fas fa-star me-1"></i> {{ __('messages.leader') }}
    </button>

    @if ($isTeamLeader || (isset($team) && auth()->user()->can('update', $team)))
        <a href="#" id="kt_team_edit_button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_team_info">
            <i class="fas fa-pencil-alt me-1"></i> {{ __('messages.edit') }}
        </a>
    @endif

@elseif ($userRole === 'member')
    <button class="btn btn-sm btn-success me-2" disabled>
        <i class="fas fa-user-check me-1"></i> {{ __('messages.member') }}
    </button>

    <a href="#" class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_quit_membership">
        <i class="fas fa-sign-out-alt me-1"></i> {{ __('messages.quit_membership') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_quit_membership"
        :route="route('player-teams.destroy', $team->id)"
        :title="__('messages.quit')"
        :message="__('messages.quit_membership')"
        :emotionalWarning="__('messages.quit_team_emotional_warning')"
        :buttonText="__('messages.quit')"
        icon="fas fa-sign-out-alt"
        color="secondary"
        emoji="🙅‍♂️"
    />

@elseif ($userStatus === 'waiting_for_approval')
    <button class="btn btn-sm btn-success me-2" disabled>
        <i class="fas fa-user-clock me-1"></i> {{ __('messages.waiting_for_approval') }}
    </button>

    <a href="#" class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_cancel_request">
        <i class="fas fa-times-circle me-1"></i> {{ __('messages.cancel_request') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_cancel_request"
        :route="route('request-player-teams.destroy', ['id' => $requestId])"
        :title="__('messages.cancel_request_title')"
        :message="__('messages.cancel_request_message')"
        :emotionalWarning="__('messages.cancel_request_emotional_warning')"
        :buttonText="__('messages.cancel_request')"
        icon="fas fa-times-circle"
        color="secondary"
        emoji="🙅‍♂️"
    />

@else
    <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_join_team">
        <i class="fas fa-plus me-1"></i> {{ __('messages.join') }}
    </a>

    <x-modals.request-confirmation-modal
        id="kt_modal_join_team"
        :route="route('request-player-teams.store')"
        :title="__('messages.join_team_title')"
        :message="__('messages.join_team_confirmation')"
        :emotionalWarning="__('messages.join_team_emotional_warning')"
        :buttonText="__('messages.join')"
        icon="fas fa-handshake"
        color="secondary"
        :params="[
            'team_id' => $team->id,
            'type' => 'join',
        ]"
    />
@endif

{{-- Delete team button - only visible if not request receiver --}}
@if (!$isRequestReceiver && (($isTeamLeader ?? false) || (isset($team) && auth()->user()->can('delete', $team))))
    <div style="width: 1px; height: 34px; background-color: #ccc;" class="mx-2"></div>

    <a href="#" id="kt_team_delete_button" class="btn btn-sm btn-grey-action mx-5" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_team_confirm">
        <i class="fas fa-trash me-1"></i> {{ __('messages.delete') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_delete_team_confirm"
        :route="route('teams.destroy', $team->id)"
        :message="__('messages.delete_team_warning')"
        :emotionalWarning="__('messages.delete_team_emotional_warning')"
        icon="fas fa-trash"
        color="secondary"
        emoji="🗑️"
    />
@endif
