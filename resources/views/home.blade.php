@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
#price-slider {
    margin: 20px 0;
}

#price-min, #price-max {
    font-size: 1rem;
    font-weight: bold;
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
                    <div class="col-12 text-center">
                        <h1 class="w-50 m-auto text-center page-heading d-flex justify-content-center align-items-center text-dark fw-bolder">
                            {{ __('messages.home') }}
                        </h1>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4">
                        @include('components.home.filters.location-filtering')
                    </div>
                    <div class="col-md-6 row">
                        @include('components.home.filters.date-filtering')
                    </div>
                    <div class="col-md-2">
                        @include('components.home.filters.sport-type-filter')
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="#" class="btn btn-lg btn-success px-4 py-3"
                           data-bs-toggle="modal"
                           data-bs-target="#kt_modal_create_app">
                           {{ __('messages.pricing_filter') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="p-2">
                        <div class="row mb-3">
                            <p>{{ __('messages.filters') }} : <div id="filters"></div></p>
                            <div class="col-md-6 pe-lg-10">
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
@include('components.home.scripts.card-scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

@endsection
