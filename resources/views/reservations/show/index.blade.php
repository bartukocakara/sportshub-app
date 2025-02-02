@extends('layouts.no-sidebar')
@section('title', __('messages.reservation_details'))

@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    .court-images-swiper {
        width: 100%;
        height: 300px;
        position: relative;
    }
    .court-images-swiper .swiper-button-next,
    .court-images-swiper .swiper-button-prev {
        color: #ffffff;
        background: rgba(0, 0, 0, 0.3);
        padding: 30px 20px;
        border-radius: 5px;
    }
    .court-images-swiper .swiper-button-next:hover,
    .court-images-swiper .swiper-button-prev:hover {
        background: rgba(0, 0, 0, 0.5);
    }
    .court-images-swiper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: #ffffff;
        opacity: 0.5;
    }
    .court-images-swiper .swiper-pagination-bullet-active {
        opacity: 1;
        background: #009ef7;
    }
    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #court_location_map {
        width: 100%;
        border-radius: 0.625rem;
    }
    .leaflet-popup-content-wrapper {
        border-radius: 8px;
    }
    .map-popup {
        padding: 10px;
    }
    .map-popup h4 {
        margin: 0 0 5px 0;
        color: #181C32;
        font-weight: 600;
    }
    .map-popup p {
        margin: 0;
        color: #7E8299;
    }
    .court-thumbnail-slider {
        width: 150px;
        height: 100px;
        position: relative;
    }
    .court-thumbnail-slider .swiper-pagination-bullet {
        width: 6px;
        height: 6px;
        background: #ffffff;
        opacity: 0.7;
    }
    .court-thumbnail-slider .swiper-pagination-bullet-active {
        opacity: 1;
        background: #009ef7;
    }
</style>
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
                                <a href="../dist/index.html" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Pages</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Account</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">Overview</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">{{ __('messages.reservation_details') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container d-flex" class="app-container container-fluid">
                <div class="d-flex flex-row gap-5">
                    <!-- Reservation Details Card -->
                    <div class="card w-50" id="kt_reservation_details_view">
                        <div class="card-header cursor-pointer">
                            <!-- Flex container: left side shows title/status, right side shows the small slider -->
                            <div class="d-flex w-100 justify-content-between align-items-start">
                                <div>
                                    <h3 class="fw-bold m-0">{{ $reservation->title }}</h3>
                                    <span class="badge badge-light-{{ $reservation->status === 'active' ? 'success' : 'warning' }} px-2 py-1">
                                        {{ $reservation->status }}
                                    </span>
                                </div>

                            </div>
                        </div>

                        <div class="card-body p-9">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.date') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">
                                        {{ \Carbon\Carbon::parse($reservation->date)->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.time') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">
                                        {{ \Carbon\Carbon::parse($reservation->from_hour)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($reservation->to_hour)->format('H:i') }}
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.customer_name') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->customer_name }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.customer_email') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->customer_email }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.customer_phone') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->customer_phone }}</span>
                                </div>
                            </div>

                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.confirmation_code') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->code }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.payment_status') }}</label>
                                <div class="col-lg-8">
                                    <span class="badge badge-light-{{ $reservation->payment_status === 'paid' ? 'success' : 'warning' }}">
                                        {{ $reservation->payment_status }}
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.price') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">₺{{ number_format($reservation->price, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Court Details Card -->
                    <div class="card w-50" id="kt_court_details_view">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">{{ $reservation->court->name }}</h3>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="swiper court-images-swiper">
                                <div class="swiper-wrapper">
                                    @foreach($reservation->court->courtImages as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/courts/' . $image->file_path) }}"
                                                 class="w-100 rounded"
                                                 style="height: 300px; object-fit: cover;"
                                                 alt="Court image">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="card-body p-9">
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.court_type') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->court->type }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.business_name') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->court->courtBusiness?->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.location') }}</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $reservation->court->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5">
                    <div class="card-header cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">{{ __('messages.location_map') }}</h3>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="court_location_map" style="height: 400px;">
                            <div id="kt_contact_map" class="w-100 rounded mb-2 mb-lg-0 mt-2" style="height: 486px; width: 100%;" tabindex="0">
                                <div class="leaflet-control-container">
                                    <div class="leaflet-top leaflet-left">
                                        <div class="leaflet-control-zoom leaflet-bar leaflet-control">
                                            <a class="leaflet-control-zoom-in leaflet-disabled"
                                               href="#"
                                               title="Zoom in"
                                               role="button"
                                               aria-label="Zoom in"
                                               aria-disabled="true"
                                            ><span aria-hidden="true">+</span></a>
                                            <a class="leaflet-control-zoom-out"
                                               href="#"
                                               title="Zoom out"
                                               role="button"
                                               aria-label="Zoom out"
                                               aria-disabled="false"
                                            ><span aria-hidden="true">-</span></a>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Swiper for the court images in the Court Details card
            new Swiper('.court-images-swiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                keyboard: {
                    enabled: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                touchEventsTarget: 'container',
                grabCursor: true,
            });

            // New Swiper for the small court thumbnail in the Reservation Details card
            new Swiper('.court-thumbnail-swiper', {
                slidesPerView: 1,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.court-thumbnail-swiper .swiper-pagination',
                    clickable: true,
                },
                keyboard: {
                    enabled: true,
                },
            });

            // Initialize Leaflet map
            const courtLat = {{ $reservation->court->courtBusiness->latitude ?? 'null' }};
            const courtLng = {{ $reservation->court->courtBusiness->longitude ?? 'null' }};

            if (courtLat && courtLng) {
                const map = L.map('court_location_map').setView([courtLat, courtLng], 15);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Custom icon for the marker
                const courtIcon = L.icon({
                    iconUrl: '{{ asset("assets/media/icons/court-marker.png") }}',
                    iconSize: [32, 32],
                    iconAnchor: [16, 32],
                    popupAnchor: [0, -32]
                });

                // Add marker with custom popup
                const marker = L.marker([courtLat, courtLng], { icon: courtIcon }).addTo(map);

                const popupContent = `
                    <div class="map-popup">
                        <h4>${@json($reservation->court->name)}</h4>
                        <p>${@json($reservation->court->address)}</p>
                    </div>
                `;

                marker.bindPopup(popupContent).openPopup();

                // Add zoom controls
                map.zoomControl.setPosition('bottomright');

                // Refresh map when it becomes visible
                map.invalidateSize();
            } else {
                document.getElementById('court_location_map').innerHTML = `
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="text-center text-gray-600">
                            <i class="ki-duotone ki-geolocation fs-3x mb-3"></i>
                            <p class="mb-0">${@json(__('messages.location_not_available'))}</p>
                        </div>
                    </div>
                `;
            }
        });
    </script>
@endsection
