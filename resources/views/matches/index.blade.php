@extends('layouts.app')
@section('title', __('messages.matches'))
@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />

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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Pages</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">User Profile</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">Projects</li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> Create Project </a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-wrap flex-stack mb-6">
                    <div class="d-flex flex-wrap my-2">
                        <div class="me-4">
                            <a href="#" class="btn btn-sm btn-light-primary px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_filter_modal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 5h18v2H3V5zm4 6h10v2H7v-2zm-2 6h14v2H5v-2z"/>
                                </svg>
                                {{ __('messages.filter') }}
                            </a>
                            @if (request()->query())
                            <a href="{{ route('matches.index') }}" class="btn btn-sm btn-light-danger px-4 py-3">
                                <i class="bi bi-x-circle me-2"></i>
                                {{ __('messages.clear_filter') }}
                            </a>
                        @endif
                        </div>
                    </div>
                </div>
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
                @include('components.pagination.default', ['data' => $datas['matches']])
                <div class="row g-6 g-xl-9 mt-2">
                    @include('components.matches.card-list')
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.matches.modals.filter-modal')

@endsection
@section('page-scripts')
@include('components.scripts.filter-modal-scripts')
@endsection
