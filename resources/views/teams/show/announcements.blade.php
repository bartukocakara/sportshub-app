@extends('layouts.team.index')

@section('title', __('messages.announcements'))

@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
{{-- You might also want to add custom styles for announcements here if needed --}}
<style>
    /* Example: Make announcement messages more readable */
    .announcement-message {
        font-size: 1.1rem;
        line-height: 1.6;
        color: var(--bs-gray-800);
    }
</style>
@endsection

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
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.announcement_list') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.announcement_list') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-row">
                    <div class="w-100 flex-lg-row-fluid">
                        <div class="w-100 flex-lg-row-fluid">
                            <div class="mb-10" id="kt_social_feeds_posts">
                                <x-filter :clearRoute="route(Route::currentRouteName(), ['id' => request()->route('id')])" />
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
                                {{-- Pagination will render here --}}
                                @include('components.pagination.default', ['data' => $datas['announcements']])

                                @forelse ($datas['announcements']['data'] as $key => $announcement)
                                <div class="card card-flush mb-10 mt-5">
                                    <div class="card-header pt-9">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-50px me-5">
                                                {{-- Dynamic user avatar --}}
                                                <img src="{{'avatar/'. $announcement['created_by']['avatar'] ?? '/assets/media/avatars/blank.png' }}" class="" alt="User Avatar" />
                                            </div>

                                            <div class="flex-grow-1">
                                                {{-- Dynamic user name --}}
                                                <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">
                                                    {{ $announcement['created_by']['full_name'] ?? 'Unknown User' }}
                                                </a>
                                                {{-- Dynamic created at time --}}
                                                <span class="text-gray-500 fw-semibold d-block">
                                                    {{ $announcement['created_at_diff'] }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="card-toolbar">
                                            {{-- Options menu (keep as is if it's generic, or make dynamic based on announcement type/permissions) --}}
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
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
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"> Staff Group </a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3"> Member Group </a>
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
                                    </div>

                                    <div class="card-body">
                                        <div class="fs-6 fw-normal text-gray-700 mb-5 announcement-message">
                                            {{-- Dynamic announcement message --}}
                                            {{ $announcement['message'] }}
                                        </div>
                                    </div>

                                    {{-- Card Footer - Comments and Likes section (mostly static for now, but ready for dynamic) --}}
                                    <div class="card-footer pt-0">
                                        <div class="mb-6">
                                            <div class="separator separator-solid"></div>

                                            <ul class="nav py-3">
                                                <li class="nav-item">
                                                    <a
                                                        class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active"
                                                        data-bs-toggle="collapse"
                                                        href="#kt_social_feeds_comments_{{ $announcement['id'] }}" {{-- Unique ID for each comment section --}}
                                                    >
                                                        <i class="ki-duotone ki-message-text-2 fs-2 me-1">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                        {{-- Dynamic comment count (if you add comments to resource) --}}
                                                        0 Comments
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1">
                                                        <i class="ki-duotone ki-heart fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                        0 Likes {{-- Dynamic likes count (if you add likes to resource) --}}
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="separator separator-solid mb-1"></div>

                                            <div class="collapse show" id="kt_social_feeds_comments_{{ $announcement['id'] }}"> {{-- Unique ID --}}
                                                {{-- This section would ideally loop through actual comments if available --}}
                                                <div class="d-flex pt-6">
                                                    <div class="symbol symbol-45px me-5">
                                                        <img src="/assets/media/avatars/300-2.jpg" alt="" />
                                                    </div>

                                                    <div class="d-flex flex-column flex-row-fluid">
                                                        <div class="d-flex align-items-center flex-wrap mb-0">
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Mrs. Anderson</a>
                                                            <span class="text-gray-500 fw-semibold fs-7 me-5">2 Days ago</span>
                                                            <a href="#" class="ms-auto text-gray-500 text-hover-primary fw-semibold fs-7">Reply</a>
                                                        </div>
                                                        <span class="text-gray-800 fs-7 fw-normal pt-1">Long before you sit dow to put digital pen to paper</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Comment input section --}}
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-3">
                                                <img src="/assets/media/avatars/300-3.jpg" alt="" />
                                            </div>

                                            <div class="position-relative w-100">
                                                <textarea
                                                    type="text"
                                                    class="form-control form-control-solid border ps-5"
                                                    rows="1"
                                                    name="comment_{{ $announcement['id'] }}" {{-- Unique name for textarea --}}
                                                    data-kt-autosize="true"
                                                    placeholder="Write your comment.."
                                                    data-kt-initialized="1"
                                                    style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 44px;"
                                                ></textarea>

                                                <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
                                                    <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                        <i class="ki-duotone ki-paper-clip fs-2"></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                        <i class="ki-duotone ki-like fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                    </button>
                                                    <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                        <i class="ki-duotone ki-badge fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span> </i>
                                                    </button>
                                                    <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                        <i class="ki-duotone ki-geolocation fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-info text-center">
                                    No announcements to display at the moment.
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
