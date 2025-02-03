@extends('layouts.no-sidebar')
@section('title', __('messages.reservations'))

@section(section: 'content')
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
                @php
                    $activeReservations = collect($data['data'])->filter(fn($reservation) => in_array($reservation['status'], [1, 2, 3]));
                    $completedReservations = collect($data['data'])->filter(fn($reservation) => $reservation['status'] === 6);
                    $canceledReservations = collect($data['data'])->filter(fn($reservation) => in_array($reservation['status'], [4, 5]));
                @endphp

                @if($activeReservations->isNotEmpty())
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('messages.active_reservations') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-4">
                                @foreach ($activeReservations as $reservation)
                                    @include('components.reservation.card', ['reservation' => $reservation])
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Completed Reservations -->
                @if($completedReservations->isNotEmpty())
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('messages.completed_reservations') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-4">
                                @foreach ($completedReservations as $reservation)
                                    @include('components.reservation.card', ['reservation' => $reservation])
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if($canceledReservations->isNotEmpty())
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('messages.canceled_reservations') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap gap-4">
                                @foreach ($canceledReservations as $reservation)
                                    @include('components.reservation.card', ['reservation' => $reservation])
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if($activeReservations->isEmpty() && $completedReservations->isEmpty() && $canceledReservations->isEmpty())
                    <div class="card">
                        <div class="card-body text-center py-15">
                            <h3 class="text-muted">{{ __('messages.no_reservations_found') }}</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
