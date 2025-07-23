@extends('layouts.no-sidebar')
@section('title', __('messages.confirm_team_details'))
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
                        <h1 class="page-heading text-gray-900 fw-bolder fs-1">{{ __('messages.confirm_team_details') }}</h1>
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

                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.players') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_players') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.details') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.fill_team_details') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item current">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.confirm_details') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.review_and_confirm') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <form class="form" method="POST" action="{{ route('teams.create.confirm-details') }}">
                            @csrf
                            <div class="w-100">
                                <div class="pb-10 pb-lg-15">
                                    <h2 class="fw-bold text-dark mb-6">{{ __('messages.review_your_team_details') }}</h2>
                                    <div class="text-muted fw-semibold fs-6">{{ __('messages.please_review_the_details_below_before_creating_your_team') }}</div>
                                </div>

                                <div class="mb-10">
                                    <div class="fs-3 fw-bold mb-5">{{ __('messages.general_information') }}</div>

                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.team_name') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ $datas['team_details']['title'] ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.sport_type') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ $datas['sport_type_name'] ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.city') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ $datas['city_name'] ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.gender_preference') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ ucfirst($datas['team_details']['gender'] ?? 'N/A') }}</div>
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.min_players') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ $datas['team_details']['min_player'] ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.max_players') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ $datas['team_details']['max_player'] ?? 'N/A' }}</div>
                                    </div>
                                    <div class="row mb-7">
                                        <div class="col-md-4 fw-semibold text-muted">{{ __('messages.allow_following') }}:</div>
                                        <div class="col-md-8 fw-bold fs-6 text-gray-800">{{ $datas['team_details']['followable_status'] ? __('messages.yes') : __('messages.no') }}</div>
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <div class="fs-3 fw-bold mb-5">{{ __('messages.selected_players') }}</div>
                                    @if(isset($datas['selected_users']) && count($datas['selected_users']) > 0)
                                        <div class="row g-6 g-xl-9">
                                            <div class="symbol-group symbol-hover">
                                                @foreach ($datas['selected_users'] as $index => $user)
                                                    @if ($index < 3)
                                                        @if ($user['avatar'])
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $user['full_name'] }}" data-bs-original-title="{{ $user['full_name'] }}">
                                                                <img alt="Pic" src="{{ asset('storage/' . $user['avatar']) }}" class="symbol symbol-35px symbol-circle" alt="Pic" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ $user['full_name'] }}">
                                                                <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                                    {{ strtoupper(Str::substr($user['full_name'], 0, 1)) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach

                                                @if (count($datas['selected_users']) > 3)
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ count($datas['selected_users']) - 3 }} kişi daha">
                                                        <span class="symbol-label bg-light text-gray-600 fw-bold">
                                                            +{{ count($datas['selected_users']) - 3 }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <p class="text-muted">{{ __('messages.no_players_selected') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex flex-stack pt-10">
                                <div class="me-2">
                                    <a href="{{ route('teams.create.fill-details') }}" class="btn btn-lg btn-light-primary me-3">
                                        <i class="ki-duotone ki-arrow-left fs-3 me-1">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i> {{ __('messages.back') }}
                                    </a>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('messages.create_team') }}
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
@endsection
