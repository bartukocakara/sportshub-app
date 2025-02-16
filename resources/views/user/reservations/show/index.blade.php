@extends('layouts.no-sidebar')
@section('title', __('messages.reservation_details'))

@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/swiper.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

@endsection

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">{{ __('messages.reservation_details') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container d-flex" class="app-container container-fluid">
                <div class="d-flex flex-row gap-5">
                    <!-- Reservation Details Card -->
                    @include('components.reservation.show.court-business-detail-card', ['reservation' => $reservation])

                    <!-- Court Details Card -->
                    @include('components.reservation.show.court-detail-card', ['reservation' => $reservation])
                </div>

                <div class="card mb-5">
                    <div class="card-header cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">{{ __('messages.location_map') }}</h3>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div id="location_map" style="height: 400px;">
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
	<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Swiper for the court images in the Court Details card
            new Swiper('.images-swiper', {
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
            new Swiper('.thumbnail-swiper', {
                slidesPerView: 1,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.thumbnail-swiper .swiper-pagination',
                    clickable: true,
                },
                keyboard: {
                    enabled: true,
                },
            });

            // Initialize Leaflet map
            // Initialize Leaflet map
            const lat = {{ $reservation->court->courtBusiness->latitude ?? 'null' }};
            const lng = {{ $reservation->court->courtBusiness->longitude ?? 'null' }};

            if (lat && lng) {
                // Initialize map with provided coordinates
                const map = L.map('location_map').setView([lat, lng], 15);

                // Tile layer for the map
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Add a marker without custom icon (using default marker)
                const marker = L.marker([lat, lng]).addTo(map);

                // Popup content
                const popupContent = `
                    <div class="map-popup">
                        <h4>{{ json_encode($reservation->court->courtBusiness->name) }}</h4>
                        <p>{{ json_encode($reservation->court->courtBusiness->address) }}</p>
                    </div>
                `;

                // Bind popup to the marker
                marker.bindPopup(popupContent).openPopup();

                // Adjust the map zoom control position
                map.zoomControl.setPosition('bottomright');

                // Ensure the map properly resizes when visible
                map.invalidateSize();
            } else {
                // If no coordinates available, show a fallback message
                document.getElementById('location_map').innerHTML = `
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="text-center text-gray-600">
                            <i class="ki-duotone ki-geolocation fs-3x mb-3"></i>
                            <p class="mb-0">${{ __('messages.location_not_available') }}</p>
                        </div>
                    </div>
                `;
            }



        });
    </script>

@endsection
