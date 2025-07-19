@php
    $status = $datas['user_status'] ?? 'none';
@endphp

@if (in_array($status, ['none', 'rejected']))
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
        color="primary"
        :params="[
            'team_id' => $team->id,
            'type' => 'join',
        ]"
    />

@elseif ($status === 'waiting_for_approval')
    <a href="#" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_cancel_request">
        <i class="fas fa-times-circle me-1"></i> {{ __('messages.cancel_request') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_cancel_request"
        :route="route('request-player-teams.destroy', ['id' => $datas['request_id']])"
        :title="__('messages.cancel_request_title')"
        :message="__('messages.cancel_request_message')"
        :emotionalWarning="__('messages.cancel_request_emotional_warning')"
        :buttonText="__('messages.cancel_request')"
        icon="fas fa-times-circle"
        color="warning"
    />
@elseif ($status === 'leader')
    <button class="btn btn-sm btn-info me-2" disabled>
        <i class="fas fa-star me-1"></i> {{ __('messages.leader') }}
    </button>

    @if (($isTeamLeader ?? false) || (isset($team) && auth()->user()->can('update', $team)))
        <a href="#" id="kt_team_edit_button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_team_info">
            <i class="fas fa-pencil-alt me-1"></i> {{ __('messages.edit') }}
        </a>
    @endif

@elseif (in_array($status, ['accepted', 'member']))
    <button class="btn btn-sm btn-success me-2" disabled>
        <i class="fas fa-user-check me-1"></i> {{ __('messages.member') }}
    </button>
    @if ($status === 'member')
        <a href="#" class="btn btn-sm btn-warning me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_team">
            <i class="fas fa-sign-out-alt me-1"></i> {{ __('messages.quit_membership') }}
        </a>
        <x-modals.delete-confirmation-modal
            id="kt_modal_delete_team"
            :route="route('player-teams.destroy', $team->id)"
            :title="__('messages.quit')"
            :message="__('messages.quit_membership')"
            :emotionalWarning="__('messages.quit_team_emotional_warning')"
            :buttonText="__('messages.quit')"
            icon="fas fa-sign-out-alt"
            color="warning"
        />
    @endif
@endif

@if (($isTeamLeader ?? false) || (isset($team) && auth()->user()->can('delete', $team)))
    <a href="#" id="kt_team_delete_button" class="btn btn-sm btn-danger mx-2" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_team">
        <i class="fas fa-trash me-1"></i> {{ __('messages.delete') }}
    </a>
    <x-modals.delete-confirmation-modal
        id="kt_modal_delete_team"
        :route="route('teams.destroy', $team->id)"
        :message="__('messages.delete_team_warning')"
        :emotionalWarning="__('messages.delete_team_emotional_warning')"
        icon="fas fa-trash"
        color="danger"
    />
@endif
