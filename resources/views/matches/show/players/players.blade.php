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
                        <div class="row g-6 mb-6 g-xl-9">
                            <x-filter :clearRoute="route(Route::currentRouteName(), ['id' => request()->route('id')])" />
                            @foreach ($datas['users'] as $playerTeam)
                                @php
                                    $deleteModalId = 'delete-' . $playerTeam->id;
                                @endphp
                                <div class="col-md-6 col-xxl-4">
                                    <div class="card border shadow-sm">
                                        <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                            <div class="symbol symbol-65px symbol-circle mb-5">
                                                @if (!empty($playerTeam->player['avatar']))
                                                    <img src="{{ $playerTeam->player['avatar'] }}" alt="image" />
                                                @else
                                                    <span class="symbol-label fs-2 fw-bold text-white bg-primary">
                                                        {{ strtoupper(substr($playerTeam->player['first_name'], 0, 1)) }}
                                                    </span>
                                                @endif
                                                <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                            </div>
                                            <a href="{{ route('users.profile', ['id' => $playerTeam->player['id']]) }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $playerTeam->player['full_name'] }}</a>
                                            <div class="fw-semibold text-gray-500 mb-6"></div>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#{{ $deleteModalId }}">
                                                <i class="fas fa-trash me-2"></i> {{ __('messages.remove') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <x-modals.delete-confirmation-modal
                                    id="{{ $deleteModalId }}"
                                    :route="route('teams.players.destroy', ['id' => request()->route('id'), 'playerTeamId' => $playerTeam->id])"
                                    :title="__('messages.delete_confirmation')"
                                    :message="__('messages.delete_player_team_message')"
                                    icon="fas fa-trash"
                                    color="danger"
                                    emoji="😢"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
