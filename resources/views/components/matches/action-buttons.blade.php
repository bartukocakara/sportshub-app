@php
    $userRole = $datas['user_role'] ?? 'none';
    $userStatus = $datas['user_status'] ?? 'none';
    $isMatchOwner = $datas['is_match_owner'] ?? false;
    $isRequestReceiver = $datas['is_request_receiver'] ?? false;
    $requestId = $datas['request_id'] ?? null;
    $matchTeamPlayerId = $datas['match_team_player_id'] ?? null;
@endphp
@if ($isRequestReceiver && $userStatus === 'waiting_for_approval')
    <form action="{{ route('request-match-team-players.accept', ['id' => $requestId]) }}" method="POST" class="d-inline">
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
        :route="route('request-match-team-players.destroy', ['id' => $requestId])"
        :title="__('messages.reject_invitation_title')"
        :message="__('messages.reject_invitation_message')"
        :emotionalWarning="__('messages.reject_invitation_emotional_warning')"
        :buttonText="__('messages.reject_invitation')"
        icon="fas fa-times-circle"
        color="secondary"
        emoji="🙅‍♂️"
    />

@elseif ($userRole === 'match_owner')
    <button class="btn btn-sm btn-info me-2" disabled>
        <i class="fas fa-star me-1"></i> {{ __('messages.match_owner') }}
    </button>

    @if ($isMatchOwner || (isset($match) && auth()->user()->can('update', $match)))
        <a href="#" id="kt_match_edit_button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_match_info">
            <i class="fas fa-pencil-alt me-1"></i> {{ __('messages.edit') }}
        </a>
    @endif

@elseif ($userRole === 'participant')
    <button class="btn btn-sm btn-success me-2" disabled>
        <i class="fas fa-user-check me-1"></i> {{ __('messages.participant') }}
    </button>

    <a href="#" class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_quit_match">
        <i class="fas fa-sign-out-alt me-1"></i> {{ __('messages.quit_match') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_quit_match"
        :route="route('matches.match-team-players.destroy', ['id' => $match->id, 'matchTeamPlayerId' => $matchTeamPlayerId])"
        :title="__('messages.quit')"
        :message="__('messages.quit_match')"
        :emotionalWarning="__('messages.quit_match_emotional_warning')"
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
        :route="route('request-match-team-players.destroy', ['id' => $requestId])"
        :title="__('messages.cancel_request_title')"
        :message="__('messages.cancel_request_message')"
        :emotionalWarning="__('messages.cancel_request_emotional_warning')"
        :buttonText="__('messages.cancel_request')"
        icon="fas fa-times-circle"
        color="secondary"
        emoji="🙅‍♂️"
    />

@else
    <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_join_match">
        <i class="fas fa-plus me-1"></i> {{ __('messages.join') }}
    </a>

    <x-modals.request-match-join-modal
        id="kt_modal_join_match"
        :route="route('request-match-team-players.store')"
        :title="__('messages.join_match_title')"
        :message="__('messages.join_match_confirmation')"
        :emotionalWarning="__('messages.join_match_emotional_warning')"
        :buttonText="__('messages.join')"
        icon="fas fa-handshake"
        color="secondary"
        :params="[
            'match_id' => $match->id,
            'type' => 'join',
        ]"
        :matchTeams="$datas['match_teams'] ?? []"
    />
@endif

{{-- Delete team button - only visible if not request receiver --}}
@if (!$isRequestReceiver && (($isMatchOwner ?? false) || (isset($match) && auth()->user()->can('delete', $match))))
    <div style="width: 1px; height: 34px; background-color: #ccc;" class="mx-2"></div>

    <a href="#" id="kt_team_delete_button" class="btn btn-sm btn-grey-action mx-5" data-bs-toggle="modal" data-bs-target="#kt_modal_delete_match_confirm">
        <i class="fas fa-trash me-1"></i> {{ __('messages.delete') }}
    </a>

    <x-modals.delete-confirmation-modal
        id="kt_modal_delete_match_confirm"
        :route="route('matches.destroy', $match->id)"
        :message="__('messages.delete_match_warning')"
        :emotionalWarning="__('messages.delete_emotional_warning')"
        icon="fas fa-trash"
        color="secondary"
        emoji="🗑️"
    />
@endif
