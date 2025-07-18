@php
    $status = $status ?? 'none';
@endphp

@if (in_array($status, ['none', 'rejected']))
    <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">
        <i class="ki-duotone ki-plus fs-4 me-1"></i> {{ __('messages.join') }}
    </a>
@elseif ($status === 'waiting_for_approval')
    <button class="btn btn-sm btn-warning me-2" disabled>
        <i class="ki-duotone ki-clock fs-4 me-1"></i> {{ __('messages.waiting_for_approval') }}
    </button>
@elseif ($status === 'leader')
    <button class="btn btn-sm btn-info me-2" disabled>
        <i class="ki-duotone ki-star fs-4 me-1"></i> {{ __('messages.leader') }}
    </button>
@elseif (in_array($status, ['accepted', 'member']))
    <button class="btn btn-sm btn-success me-2" disabled>
        <i class="ki-duotone ki-user-check fs-4 me-1"></i> {{ __('messages.member') }}
    </button>
@endif

{{-- Edit butonu için yetki veya lider kontrolü yapılmalı --}}
@if (($isTeamLeader ?? false) || (isset($team) && auth()->user()->can('update', $team)))
    <a href="#" id="kt_team_edit_button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_team_info">
        <i class="ki-duotone ki-pencil fs-4 me-1"></i> {{ __('messages.edit') }}
    </a>
@endif
