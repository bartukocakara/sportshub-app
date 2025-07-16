@extends('layouts.app')
@section('title', __('messages.activities'))
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
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.activity_list') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.activity_list') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card-body">
                    <div class="card-body p-0" role="tabpanel">
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
                        @include('components.activities.timeline')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.activities.modals.filter-modal')

@endsection
@section('page-scripts')
@endsection
