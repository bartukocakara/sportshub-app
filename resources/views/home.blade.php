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
                    <div class="mt-5" id="filters-form" method="GET" action="{{ route('home') }}">
                        <div class="row mt-4">
                            <div class="col-md-5">
                                @include('components.home.filters.sport-type-filter')
                            </div>
                            <div class="col-md-2 mt-4 d-flex justify-content-center align-items-center">
                                <button id="start-filter-btn" class="btn btn-lg btn-success px-4 py-3">
                                    {{ __('messages.filters') }}
                                </button>
                            </div>
                        </div>
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
@include('components.home.modals.filters-modal')
@endsection
@section('page-scripts')
@include('components.home.scripts.leaflet-scripts')
@include('components.home.scripts.filter-scripts')
@include('components.scripts.court-scripts')
@include('components.checkout.scripts.slider-scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
@include('components.home.scripts.price-slider-scripts')


@endsection
