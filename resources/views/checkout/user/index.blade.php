@extends('layouts.no-sidebar')
@section('title', __('messages.guest_checkout'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid detail-container" >
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container"
                class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column m-2">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.checkout_details') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row">
                    @include('components.checkout.user.customer-info')
                    @include('components.checkout.summary')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('components.scripts.court-scripts')
@include('components.checkout.scripts.customer-validation-scripts')

@include('components.checkout.scripts.leaflet-scripts')
@include('components.checkout.scripts.slider-scripts')
@endsection
