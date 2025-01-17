@extends('layouts.no-sidebar')
@section('title', __('messages.payment'))

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column m-3 mb-2 text-center w-100">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.payment_successfull') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid d-flex justify-content-center align-items-center flex-column">
                <div class="card shadow-lg p-5 text-center w-50">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success display-1"></i>
                    </div>
                    <h2 class="text-success fw-bold">{{ __('messages.payment_successfull') }}</h2>
                    <p class="text-muted">{{ __('messages.payment_success_message') }}</p>

                    <h3 class="mt-4">{{ __('messages.reservation_details') }}</h3>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.court') }}:</strong> {{ $reservation->title }}</li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.sport_type') }}:</strong> {{ $checkoutData['sport_type_title'] }}</li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.date') }}:</strong> {{ \Carbon\Carbon::parse($checkoutData['date'])->format('l, F j, Y') }}</li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.time') }}:</strong> {{ $checkoutData['from_hour'] }} - {{ $checkoutData['to_hour'] }}</li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.price') }}:</strong> {{ number_format($reservation->price, 2) }}</li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.customer_name') }}:</strong> {{ $checkoutData['customer_name'] }}</li>
                        <li class="d-flex justify-content-between py-2 border-bottom"><strong>{{ __('messages.customer_email') }}:</strong> {{ $checkoutData['customer_email'] }}</li>
                        <li class="d-flex justify-content-between py-2"><strong>{{ __('messages.customer_phone') }}:</strong> {{ $checkoutData['customer_phone'] }}</li>
                    </ul>

                    <a href="{{ route('home') }}" class="btn btn-primary mt-4">{{ __('messages.back_to_home') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
