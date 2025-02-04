@extends('layouts.no-sidebar')
@section('title', __('messages.court_business'))
@section(section: 'content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <!-- Toolbar -->
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column m-2">
                        <h1 class="page-heading d-flex text-gray-900 fw-bolder fs-2">
                            Business Name Here
                        </h1>
                        <span class="text-gray-600 fw-semibold fs-6">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>Business Address Here
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row g-5 g-xl-8">
                    <!-- Left Column -->
                    <div class="col-xl-8">
                        <!-- Image Slider Card -->
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body p-0">
                                <div class="swiper images-swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="placeholder.jpg" class="w-100 h-100 object-fit-cover" alt="Business Image">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>

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
                                            <div class="col-md-6">
                                                <div class="card h-100">
                                                    <div class="card-body d-flex flex-column">
                                                        <div class="mb-5">
                                                            <img src="court-placeholder.jpg" class="w-100 h-200px object-fit-cover rounded" alt="Court Image">
                                                        </div>
                                                        <h3 class="fs-4 text-gray-900 mb-3">Court Name</h3>
                                                        <div class="mb-3">
                                                            <span class="badge badge-light-primary me-2">Indoor</span>
                                                            <span class="badge badge-light-info">Tennis</span>
                                                        </div>
                                                        <div class="fs-6 text-gray-600 mb-5">
                                                            <i class="fas fa-dollar-sign text-primary me-2"></i>Price per hour
                                                        </div>
                                                        <div class="mt-auto">
                                                            <button class="btn btn-primary w-100">Book Now</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Details Tab -->
                                    <div class="tab-pane fade" id="kt_tab_details">
                                        <div class="row mb-7">
                                            <div class="col-lg-12">
                                                <h3 class="fs-5 fw-bold mb-5">About</h3>
                                                <p class="text-gray-700">Business description and details here...</p>
                                            </div>
                                        </div>
                                        <div class="row mb-7">
                                            <div class="col-lg-6">
                                                <h3 class="fs-5 fw-bold mb-5">Working Hours</h3>
                                                <div class="d-flex flex-column gap-3">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-gray-600">Monday</span>
                                                        <span class="text-gray-800">09:00 - 22:00</span>
                                                    </div>
                                                    <!-- Repeat for other days -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="fs-5 fw-bold mb-5">Amenities</h3>
                                                <div class="d-flex flex-wrap gap-3">
                                                    <span class="badge badge-light-primary">Parking</span>
                                                    <span class="badge badge-light-primary">Showers</span>
                                                    <span class="badge badge-light-primary">Lockers</span>
                                                    <span class="badge badge-light-primary">Cafe</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reviews Tab -->
                                    <div class="tab-pane fade" id="kt_tab_reviews">
                                        <div class="d-flex flex-column gap-6">
                                            <!-- Review Item -->
                                            <div class="border rounded p-6">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="symbol symbol-35px me-3">
                                                        <img src="avatar.jpg" alt="User">
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <span class="fs-5 fw-bold">User Name</span>
                                                        <span class="text-gray-600">2 days ago</span>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="rating">
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                            <i class="fas fa-star text-warning"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-gray-700 mb-0">Review content here...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-xl-4">
                        <!-- Business Info Card -->
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-body">
                                <h3 class="fs-4 fw-bold mb-5">Business Information</h3>
                                <div class="d-flex flex-column gap-5">
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-user fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">Owner</span>
                                            <span class="text-gray-600">Owner Name</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-phone fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">Phone</span>
                                            <span class="text-gray-600">+1234567890</span>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-envelope fs-4 text-primary"></i>
                                        <div>
                                            <span class="d-block fw-bold text-gray-900">Email</span>
                                            <span class="text-gray-600">business@email.com</span>
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
