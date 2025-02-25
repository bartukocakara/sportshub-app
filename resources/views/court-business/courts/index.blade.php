@extends('layouts.court-business')
@section('title', 'Saha Listesi')
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
                    <div>
                        <form class="mt-5 w-75" id="filters-form" method="GET" action="{{ route('home') }}">
                            <div class="row mt-4">
                                <div class="col-2">
                                    @include('components.home.filters.sport-type-filter')
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="m-4 btn btn-primary">{{ __('messages.start_filter') }}</button>
                                </div>
                            </div>

                        </form>
                        <div class="w-25 col-md-2 d-flex align-items-center ">
                            <a href="{{ route('court_business.courts.create') }}" class="btn btn-success">{{ __('messages.create_court') }}</a>
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
                            @include('components.pagination.default', ['data' => $homeData['courts']])
                            <div class="col-md-8 pe-lg-10" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                @include('components.court-business.courts.card-list')
                            </div>
                            <div class="col-md-4 ps-lg-10">
                                @include('components.court-business.courts.map')
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
    @include('components.court-business.courts.scripts.leaflet-scripts')
    @include('components.court-business.courts.scripts.filter-scripts')
    @include('components.scripts.court-scripts')
    @include('components.checkout.scripts.slider-scripts')
@endsection
