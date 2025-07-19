@extends('layouts.team.index')

@section('title', __('messages.profile'))
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="{{ route('activities.index') }}" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">
                                 <a href="{{ route('teams.index') }}" class="text-gray-500 text-hover-primary">
                                    {{ __('messages.teams') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.details') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.details') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-5 mb-xxl-8 px-20 border shadow-sm">
                    <div class="card-body pt-9 pb-0 px-10">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-gray-900 text-primary fs-2 fw-bold me-1">{{ $datas['team']->title }}</div>
                                            <span class="badge {{ $datas['team']->status_badge }}">
                                                {!! $datas['team']->status_badge_with_icon !!}
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-3 mb-4 pe-2">
                                            <p class="d-flex align-items-center text-gray-900 me-5 mb-2">
                                                <i class="ki-duotone ki-geolocation fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>
                                                {{ $datas['team']->city->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex my-4">
                                        {{-- <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                            <i class="ki-duotone ki-check fs-2 d-none"></i>
                                            <span class="indicator-label">{{ __('messages.following') }}</span>
                                            <span class="indicator-progress">
                                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </a> --}}
                                        @include('components.team.action-buttons', [
                                            'status' => $datas['user_status'],
                                            'role' => $datas['user_role'],
                                            'team' => $datas['team']->resource ?? null,
                                        ])

                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            @php
                                                $gender = $datas['team']->gender ?? 'mixed';

                                                $genderEmoji = match($gender) {
                                                    'male' => '👨🏻',
                                                    'female' => '👩🏻',
                                                    'mixed' => '🧑🏻‍🤝‍🧑🏻',
                                                    'other' => '🧑🏻‍🤝‍🧑🏻',
                                                    default => '❓',
                                                };

                                                $genderText = match($gender) {
                                                    'male' => __('messages.male'),
                                                    'female' => __('messages.female'),
                                                    'other' => __('messages.other'),
                                                    'mixed' => __('messages.mixed'),
                                                    default => __('messages.unknown'),
                                                };
                                            @endphp

                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="fw-semibold fs-6 text-gray-900">{{ __('messages.gender') }}</div>
                                                <div class="d-flex align-items-center justify-content-center fs-2">
                                                    <span class="me-2">{{ $genderEmoji }}</span>
                                                    <span class="fw-bold">{{ $genderText }}</span>
                                                </div>
                                            </div>

                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="fw-semibold fs-6 text-gray-900">{{ __('messages.min_player') }}</div>
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold counted m-auto" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">
                                                        {{ $datas['team']['min_player'] }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="fw-semibold fs-6 text-gray-900">{{ __('messages.max_player') }}</div>
                                                <div class="d-flex align-items-center">
                                                    <div class="fs-2 fw-bold counted m-auto" data-kt-countup="true" data-kt-countup-value="80" data-kt-initialized="1">{{ $datas['team']['max_player'] }}</div>
                                                </div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="fw-semibold fs-6 text-gray-900">{{ __('messages.sport_type') }}</div>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ "{$datas['team']->sportType->img}" }}" class="w-20px me-3" alt="">
                                                    <div class="fs-2 fw-bold counted m-auto" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1">{{ $datas['team']->sportType->title }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.team.modals.edit-profile-modal')
@endsection
