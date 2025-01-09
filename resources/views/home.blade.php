@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
#pagination {
    position: sticky;
    top: 0;
    z-index: 100; /* Ensure it's above other content */
    background-color: white; /* Optional: Add background to prevent text overlap */
    padding: 10px; /* Add some padding for spacing */
}

.pagination-link {
    margin-right: 10px;
    text-decoration: none;
    color: #007bff;
}

.pagination-link:hover {
    text-decoration: underline;
}
.form-select option {
    text-transform: capitalize; /* Capitalize first letter of city and district names */
    font-size: 16px; /* Increase font size */
}
input[type="date"] {
    font-size: 18px; /* Adjust this value to change the font size */
    padding: 8px 12px;
}

/* For larger calendar cells and better styling */
input[type="date"]::-webkit-calendar-picker-indicator {
    padding: 10px;
    font-size: 16px; /* Increase the size of the date picker trigger */
}
</style>
@endsection
@section('content')
@include('components.home.modals.price-filter-modal')
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
                    <form class="mt-5" id="filters-form" method="GET" action="{{ route('home') }}">
                        <div class="row mt-4">
                            <div class="col-md-3 text-center">
                                @include('components.home.filters.location-filtering')
                            </div>
                            <div class="col-md-5 row">
                                @include('components.home.filters.date-filtering')
                            </div>
                            <div class="col-md-2">
                                @include('components.home.filters.sport-type-filter')
                            </div>
                            <div class="col-md-2 mt-4 d-flex justify-content-center align-items-center">
                                <a href="#" class="btn btn-lg btn-success px-4 py-3"
                                data-bs-toggle="modal"
                                data-bs-target="#kt_modal_create_app">
                                {{ __('messages.pricing_filter') }}
                                </a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="m-4 btn btn-primary">{{ __('messages.start_filter') }}</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="p-2">
                        <div class="row mb-3">
                            @include('components.pagination.default', ['data' => $homeData['courts']])
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
@endsection
@section('page-scripts')
@include('components.home.scripts.leaflet-scripts')
@include('components.home.scripts.filter-scripts')
@include('components.scripts.court-scripts')
@include('components.checkout.scripts.slider-scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

@endsection
