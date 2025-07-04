@extends('layouts.no-sidebar')
@section('title', __('messages.court_business'))

@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset(path: 'assets/css/swiper-bundle.min.css') }}" />
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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.dashboard') }}</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.court_business_create') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-8">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body p-0">
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_courts">
                                            <i class="fas fa-volleyball-ball me-2"></i>{{ __('messages.courts') }}
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kt_tab_courts">
                                        <div class="row g-6">

                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="kt_tab_reviews">
                                        <div class="d-flex flex-column gap-6">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body">
                                <h3 class="fs-4 fw-bold mb-5">{{ __('messages.business_info') }}</h3>
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-user fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.full_name') }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-phone fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.phone') }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-envelope fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.email') }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-map-marker-alt fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.location') }}</span>
                                            <span class="text-gray-600">

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body p-0">
                                <div id="location_map" style="height: 300px;"></div>
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
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

@endsection
