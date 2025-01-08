@extends('layouts.app')
@section('title', __('messages.guest_checkout'))
@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
@endsection
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container"
                class="app-container container-fluid d-flex align-items-stretch">
                <div
                    class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <h1
                            class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.checkout_details') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                        <form class="form"
                            action="#"
                            id="kt_subscriptions_create_new">
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">{{ __('messages.customer_details') }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-body pt-0">
                                    @include('components.checkout.guest.customer-form')
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('components.checkout.summary')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('components.checkout.scripts.leaflet-scripts')
@endsection
