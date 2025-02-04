@extends('layouts.no-sidebar')
@section('title', __('messages.court_business'))

@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset(path: 'assets/css/swiper-bundle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}">
@endsection

@section(section: 'content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column m-2">
                        <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-2">
                            {{ $courtBusiness->name }}
                        </h1>
                        <span class="text-gray-600 fw-semibold fs-6">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            {{ $courtBusiness->district->city->title }}, {{ $courtBusiness->district->title }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-8">
                        <!-- Tabs -->
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body p-0">
                                <!-- Tabs Header -->
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_courts">
                                            <i class="fas fa-volleyball-ball me-2"></i>Courts
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_details">
                                            <i class="fas fa-info-circle me-2"></i>Details
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_reviews">
                                            <i class="fas fa-star me-2"></i>Reviews
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tabs Content -->
                                <div class="tab-content" id="myTabContent">
                                    <!-- Courts Tab -->
                                    <div class="tab-pane fade show active" id="kt_tab_courts">
                                        <div class="row g-6">
                                            <!-- Court Card -->
                                            @foreach($courtBusiness->courts as $court)
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="mb-5">
                                                            <img src="{{ asset('storage/courts/' . $court->courtImages->first()?->file_path) }}" class="w-100 h-200px object-fit-cover rounded" alt="Court Image">
                                                        </div>
                                                        <h3 class="fs-4 text-gray-900 mb-3">{{ $court->name }}</h3>
                                                        <div class="mb-3">
                                                            <span class="badge badge-light-primary me-2">{{ $court->type }}</span>
                                                            <span class="badge badge-light-info">{{ $court->sportType->title }}</span>
                                                        </div>
                                                        <div class="fs-6 text-gray-600 mb-5">
                                                            <i class="fas fa-dollar-sign text-primary me-2"></i>{{ $court->price_per_hour }}
                                                        </div>
                                                        <div class="mt-auto">
                                                            <button class="btn btn-primary w-100">Book Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Details Tab -->
                                    <div class="tab-pane fade" id="kt_tab_reviews">

                                    </div>

                                    <!-- Reviews Tab -->
                                    <div class="tab-pane fade" id="kt_tab_reviews">
                                        <div class="d-flex flex-column gap-6">
                                            <!-- Review Item -->
                                            @foreach($courtBusiness->comments as $comment)
                                            <div class="border rounded p-6">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="symbol symbol-35px me-3">
                                                        <img src="{{ asset('storage/users/' . $comment->user->avatar) }}" alt="{{ $comment->user->first_name }}">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-5 fw-bold">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</span>
                                                        <span class="text-gray-600">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </div>
                                                </div>
                                                <p class="text-gray-700 mb-0">{{ $comment->comment }}</p>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <!-- Business Info Card -->
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body">
                                <h3 class="fs-4 fw-bold mb-5">{{ __('messages.business_info') }}</h3>
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-user fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.name') }}</span>
                                            <span class="text-gray-600">{{ $courtBusiness->owner_name }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-phone fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.phone') }}</span>
                                            <span class="text-gray-600">{{ $courtBusiness->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-envelope fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.email') }}</span>
                                            <span class="text-gray-600">{{ $courtBusiness->email }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-map-marker-alt fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">{{ __('messages.location') }}</span>
                                            <span class="text-gray-600">
                                                {{ $courtBusiness->district->city->country->name }},
                                                {{ $courtBusiness->district->city->name }},
                                                {{ $courtBusiness->district->name }}
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
<script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Leaflet map
        var map = L.map('location_map').setView([{{ $courtBusiness->latitude }}, {{ $courtBusiness->longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        L.marker([{{ $courtBusiness->latitude }}, {{ $courtBusiness->longitude }}]).addTo(map);
    });
</script>
@endsection
