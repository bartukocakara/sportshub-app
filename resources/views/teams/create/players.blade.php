@extends('layouts.no-sidebar')
@section('title', __('messages.create_team'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.teams') }}</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.create_team') }}</li>
                        </ul>
                        <h1 class="page-heading text-gray-900 fw-bolder fs-1">{{ __('messages.create_team') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid">
                    <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                        <div class="stepper-nav ps-lg-10">
                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.sport_type') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_sport_type') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.city') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_city') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item current">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.players') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_players') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.details') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.fill_team_details') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <form class="form" method="POST" action="{{ route('teams.create.players.store') }}">
                            @csrf
                            <div class="w-100">
                                <div class="fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                        <span class="required">{{ __('messages.players') }}</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="{{ __('messages.select_players') }}">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    @include('components.pagination.default', ['data' => $datas['users']])
                                    <div class="row g-6 g-xl-9">
                                        <div class="row g-6 g-xl-9">
                                            @php
                                                $selectedUserIds = collect($datas['selected_users'])->pluck('id')->toArray();
                                            @endphp

                                            @foreach ($datas['users']['data'] as $key => $user)
                                                <div class="col-md-6 col-xxl-4">
                                                    <div class="card border shadow-sm player-card {{ in_array($user['id'], $selectedUserIds) ? 'border-primary' : '' }}" style="border-width: {{ in_array($user['id'], $selectedUserIds) ? '2px' : '1px' }}">
                                                        <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                                            <div class="symbol symbol-65px symbol-circle mb-5">
                                                                <img src="{{ asset($user['avatar']) }}" alt="image" />
                                                                <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                                            </div>
                                                            <a href="{{ route('users.profile', ['id' => $user['id']]) }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $user['full_name'] }}</a>
                                                            <div class="fw-semibold text-gray-500 mb-6">Art Director at Novica Co.</div>
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" name="user_ids[]"
                                                                    value="{{ $user['id'] }}" id="player_{{ $user['id'] }}"
                                                                    {{ in_array($user['id'], $selectedUserIds) ? 'checked' : '' }} />
                                                                <label class="form-check-label" for="player_{{ $user['id'] }}">
                                                                    {{ __('messages.select_player') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('user_ids')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <div class="me-2">
                                    <a href="{{ route('teams.create.city') }}" class="btn btn-lg btn-light-primary me-3">
                                        <i class="ki-duotone ki-arrow-left fs-3 me-1">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i> {{ __('messages.back') }}
                                    </a>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('messages.continue') }}
                                        <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[name="user_ids[]"]'); // Changed name here

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const card = this.closest('.player-card'); // Added class for easier targeting
            if (this.checked) {
                card.classList.add('border-primary');
                card.style.borderWidth = '2px';
            } else {
                card.classList.remove('border-primary');
                card.style.borderWidth = '1px';
            }
        });

        // Initialize card border based on checked state on page load
        if (checkbox.checked) {
            const card = checkbox.closest('.player-card');
            card.classList.add('border-primary');
            card.style.borderWidth = '2px';
        }
    });
});
</script>
@endsection
