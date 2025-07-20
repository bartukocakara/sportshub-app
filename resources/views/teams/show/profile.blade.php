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
                <div class="card mb-5 border shadow-sm px-4 px-lg-10 px-xxl-20">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-4 mb-6">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                                    <h2 class="text-gray-900 text-primary fs-3 fs-md-2 fw-bold mb-0 text-break">
                                        {{ $datas['team']->title }}
                                    </h2>

                                    <div class="mt-2 mt-md-0 ms-md-4">
                                        <x-follow-buttons
                                            :follow-id="$datas['follow_id']"
                                            :followable-id="$datas['team']->id"
                                            followable-type="App\Models\Team"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <p class="badge {{ $datas['team']->status_badge }} text-900 fs-10 mb-0">
                                        {!! $datas['team']->status_badge_with_icon !!}
                                    </p>
                                </div>
                                <div class="d-flex align-items-center text-gray-700">
                                    📍
                                    <span class="fw-semibold fs-6 ms-2">
                                        {{ $datas['team']->city->title }}
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                @include('components.team.action-buttons', [
                                    'status' => $datas['user_status'],
                                    'role' => $datas['user_role'],
                                    'team' => $datas['team']->resource ?? null,
                                ])
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 my-5">
                            @php
                                $gender = $datas['team']->gender ?? 'mixed';
                                $genderEmoji = match($gender) {
                                    'male' => '👨🏻',
                                    'female' => '👩🏻',
                                    default => '🧑🏻‍🤝‍🧑🏻',
                                };
                                $genderText = match($gender) {
                                    'male' => __('messages.male'),
                                    'female' => __('messages.female'),
                                    'mixed' => __('messages.mixed'),
                                    'other' => __('messages.other'),
                                    default => __('messages.unknown'),
                                };
                            @endphp
                            <div class="col">
                                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.gender') }}</div>
                                    <div class="fs-3">{{ $genderEmoji }} {{ $genderText }}</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.min_player') }}</div>
                                    <div class="fs-3 fw-bold">{{ $datas['team']['min_player'] }}</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.max_player') }}</div>
                                    <div class="fs-3 fw-bold">{{ $datas['team']['max_player'] }}</div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.sport_type') }}</div>
                                    <div class="d-flex align-items-center justify-content-center gap-2">
                                        <img src="{{ $datas['team']->sportType->img }}" class="w-20px" alt="">
                                        <div class="fs-5 fw-bold">{{ $datas['team']->sportType->title }}</div>
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
