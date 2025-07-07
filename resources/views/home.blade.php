@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/form-select.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div class="app-container container-fluid">
                <div class="row">
                    <div class="mb-4 col-12 text-center">
                        <h1 class="w-50 m-auto text-center page-heading d-flex justify-content-center align-items-center text-dark fw-bolder">
                            {{ __('messages.courts') }}
                        </h1>
                    </div>
                    <div class="mt-5" id="filters-form">
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
                            <a href="{{ route('home') }}" class="btn btn-sm btn-light-danger px-4 py-3">
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
                    </div>
                </div>

            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="p-2">
                        <div class="row mb-3">
                            @include('components.pagination.default', ['data' => $datas['courts']])
                            <div class="col-md-6 pe-lg-10" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                @include('components.home.card-list')
                            </div>
                            <div class="col-md-6 ps-lg-10">
                                @include('components.home.map')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.home.modals.filter-modal')
@endsection
@section('page-scripts')
@include('components.home.scripts.leaflet-scripts')
@include('components.home.scripts.filter-scripts')
@include('components.scripts.court-scripts')
@include('components.checkout.scripts.slider-scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
@include('components.home.scripts.price-slider-scripts')
@include('components.scripts.filter-modal-scripts')

@endsection
