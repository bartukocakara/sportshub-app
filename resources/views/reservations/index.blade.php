@extends('layouts.no-sidebar')
@section('title', __('messages.reservations'))

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column m-2">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.reservations') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <!-- Reservation List -->
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($reservations as $reservation)
                        <div class="col">
                            <!-- Reservation Card Component -->
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-img-top position-relative">
                                    <img src="{{ asset('storage/' . $reservation->court_image) }}" class="img-fluid rounded-top" alt="{{ $reservation->court_title }}">
                                    <div class="badge bg-success position-absolute top-0 end-0 m-3">{{ $reservation->status }}</div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $reservation->court_title }}</h5>
                                    <p class="card-text text-muted">{{ $reservation->sport_type }} | {{ $reservation->date }}</p>
                                    <p class="card-text">{{ $reservation->time }} | {{ $reservation->price }}</p>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('reservation.show', $reservation->id) }}" class="btn btn-primary btn-sm">{{ __('messages.view_details') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
