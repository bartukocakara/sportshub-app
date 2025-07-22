@extends('layouts.app')
@section('title', __('messages.announcements'))
@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')

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
                    <li class="breadcrumb-item text-gray-700">{{ __('messages.announcements') }}</li>
                </ul>
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.announcements') }}</h1>
            </div>
            <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> {{ __('messages.create_announcement') }} </a>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="d-flex flex-row">
            <div class="w-100 flex-lg-row-fluid mx-lg-13">
                <form method="POST" action="{{ route('announcements.store') }}">
                        @csrf
                        <div class="card card-flush mb-10">
                            <div class="card-header justify-content-start align-items-center pt-4">
                                <div class="symbol symbol-45px me-3">
                                    @if(auth()->user()->avatar)
                                        <img src="{{ auth()->user()->avatar }}" alt="user" />
                                    @else
                                        <div class="symbol-label bg-primary text-white fw-bold d-flex align-items-center justify-content-center rounded-circle" style="width: 45px; height: 45px;">
                                            {{ strtoupper(mb_substr(auth()->user()->first_name, 0, 1)) }}
                                        </div>
                                    @endif
                                </div>
                                <span class="text-gray-600 fw-semibold fs-6">
                                    {{ __('messages.whats_on_your_mind', ['name' => auth()->user()->first_name ?? '']) }}
                                </span>
                            </div>
                            <div class="card-body pt-3 pb-0 border">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="sport_type_id" class="form-label fw-bold">
                                            <i class="bi bi-trophy-fill me-2 text-primary"></i> {{ __('messages.sport_type') }}
                                        </label>
                                        <select name="sport_type_id" id="sport_type_id" class="form-select select2 @error('sport_type_id') is-invalid @enderror" required>
                                            <option disabled selected>{{ __('messages.select_sport_type') }}</option>
                                            @foreach($datas['sport_types'] as $sportType)
                                                <option value="{{ $sportType->id }}" {{ old('sport_type_id') == $sportType->id ? 'selected' : '' }}>{{ $sportType->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('sport_type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="type" class="form-label fw-bold">
                                            <i class="bi bi-person-plus-fill me-2 text-primary"></i> {{ __('messages.type') }}
                                        </label>
                                        <select name="type" id="type" class="form-select select2 @error('type') is-invalid @enderror" required>
                                            <option disabled selected>{{ __('messages.select_type') }}</option>
                                            @foreach ($datas['announcement_types'] as $announcementType)
                                                <option value="{{ $announcementType->value  }}" {{ old('type') == 'participant' ? 'selected' : '' }}>{{ $announcementType->description_tr }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" name="subject_type" value="User">
                                <input type="hidden" name="subject_id" value="{{ auth()->user()->id }}">
                                <div class="mt-4">
                                    <label for="title" class="form-label fw-bold">
                                        <i class="bi bi-type me-2 text-primary"></i> {{ __('messages.title') }}
                                    </label>
                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                        value="{{ old('title') }}" required minlength="3" maxlength="255">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="message" class="form-label fw-bold">
                                        <i class="bi bi-chat-text me-2 text-primary"></i> {{ __('messages.message') }}
                                    </label>
                                    <textarea
                                        class="form-control @error('message') is-invalid @enderror"
                                        id="message"
                                        name="message"
                                        rows="3"
                                        placeholder="{{ __('messages.write_your_announcement') }}"
                                        required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end pt-3">
                                <button type="submit" class="btn btn-sm btn-primary" id="kt_social_feeds_post_btn">
                                    <span class="indicator-label">
                                        <i class="bi bi-send-fill me-1"></i> {{ __('messages.post') }}
                                    </span>
                                    <span class="indicator-progress">
                                        {{ __('messages.please_wait') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mb-10" id="kt_social_feeds_posts">
                        <x-filter :clearRoute="route(Route::currentRouteName())" />
                        @php
                            $cityTitles = collect($datas['cities'] ?? [])->pluck('title', 'id')->toArray();
                            $sportTypeTitles = collect($datas['sport_types'] ?? [])->pluck('title', 'id')->toArray();
                        @endphp

                        <x-filter-tags
                            :excludedFilters="['page', 'per_page']"
                            :titleMaps="[
                                'city_id' => $cityTitles,
                                'sport_type_id' => $sportTypeTitles,
                            ]"
                            translationsPrefix="messages"
                        />
                        @include('components.pagination.default', ['data' => $datas['announcements']])
                        @include('components.announcements.card-list', ['announcements' => $datas['announcements']['data']])
                    </div>
                </div>
                <div
                    class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px"
                    data-kt-drawer="true"
                    data-kt-drawer-name="end-sidebar"
                    data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                    data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_social_end_sidebar_toggle"
                >
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Suggestions for you</span>

                            <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                        </h3>

                        <div class="card-toolbar">
                            <button
                                class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true"
                            >
                                <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                            </button>

                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                </div>

                                <div class="separator mb-3 opacity-75"></div>

                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3"> New Ticket </a>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3"> New Customer </a>
                                </div>

                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>

                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"> Admin Group </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3"> New Contact </a>
                                </div>

                                <div class="separator mt-3 opacity-75"></div>

                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-flex flex-stack">
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-11.jpg" class="h-50 align-self-center" alt="" />
                            </div>

                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">Jacob Jones </a>

                                    <span class="text-muted fw-semibold d-block fs-7">Barone LLC.</span>
                                </div>
                                <a href="/pages/user-profile/overview.html" class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-4"></div>

                        <div class="d-flex flex-stack">
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-9.jpg" class="h-50 align-self-center" alt="" />
                            </div>

                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <div class="flex-grow-1 me-2">
                                    <a href="/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold"> Kristin Watson </a>

                                    <span class="text-muted fw-semibold d-block fs-7">Biffco Enterprises Ltd.</span>
                                </div>
                                <a href="/pages/user-profile/overview.html" class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.announcements.modals.filter-modal')

@endsection
@section('page-scripts')
@include('components.scripts.filter-modal-scripts')
@endsection
