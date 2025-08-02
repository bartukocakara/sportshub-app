@extends('layouts.match.index')

@section('title', __('messages.players'))
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/index.html" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.requested_players') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-row">
                    <div class="w-100 flex-lg-row-fluid">
                        @forelse ($datas['grouped_requested_players_by_team'] as $teamGroup)
                            <div class="card card-xl-stretch mb-xl-9">
                                <div class="card-header pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bold text-gray-900">{{ __('messages.team') }}: {{ $teamGroup['title'] }}</span>
                                    </h3>
                                </div>
                                <div class="card-body py-3">
                                    <div class="row g-6 g-xl-9">
                                        @foreach ($teamGroup['players'] as $user)
                                            @php
                                                $deleteModalId = 'delete-request-' . $user->id;
                                            @endphp
                                            <div class="col-md-6 col-xxl-4">
                                                <div class="card border shadow-sm">
                                                    <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                                        <div class="symbol symbol-65px symbol-circle mb-5">
                                                            @if (!empty($user->requestedUser->avatar)) {{-- Use $user->avatar directly from resource --}}
                                                                <img src="{{ $user->requestedUser->avatar }}" alt="image" />
                                                            @else
                                                                <span class="symbol-label fs-2 fw-bold text-white bg-primary">
                                                                    {{ strtoupper(substr($user->first_name, 0, 1)) }} {{-- Use $user->first_name directly --}}
                                                                </span>
                                                            @endif
                                                            <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                                        </div>
                                                        <a href="{{ route('users.profile', ['id' => $user->requested_user_id]) }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $user->full_name }}</a> {{-- Use $user->full_name --}}
                                                        <div class="fw-semibold text-gray-500 mb-6"></div>

                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $deleteModalId }}">
                                                            <i class="fas fa-trash me-2"></i> {{ __('messages.cancel') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <x-modals.delete-confirmation-modal
                                                id="{{ $deleteModalId }}"
                                                :route="route('request-match-team-players.destroy', ['id' => $user->id])"
                                                :title="__('messages.delete_confirmation')"
                                                :message="__('messages.delete_request_player_team_message')"
                                                icon="fas fa-trash"
                                                color="danger"
                                                emoji="😢"
                                            />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info text-center">{{ __('messages.no_requested_players_found') }}</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection