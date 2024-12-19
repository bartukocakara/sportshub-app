@extends('layouts.app')
@section('title', 'Ana Sayfa')

@section('content')

@section('custom-styles')
    <link href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css">

@endsection
@include('components.home.modals.filter-modal')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
                            {{ __('messages.home') }}
                        </h1>
                    </div>
                    <a href="#" class="btn btn-lg btn-success ms-3 px-4 py-3"
                       data-bs-toggle="modal"
                       data-bs-target="#kt_modal_create_app">
                       {{ __('messages.filter') }}
                    </a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card">
                    <div class="p-2">
                        <div class="row mb-3">
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
    <script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
	<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
@endsection
