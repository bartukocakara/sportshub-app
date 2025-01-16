@extends('layouts.no-sidebar')
@section('title', __('messages.payment'))

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column m-3 mb-2">
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.payment_successfull') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="row">
                    <!-- Payment Form -->
                    <div class="col-md-6">
                        <form action="{{ Auth::check() ? route('reservation.user.make.payment') : route('reservation.guest.make.payment') }}" method="POST" id="paymentForm">
                            @csrf
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">{{ __('messages.payment_details') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row mb-6">
                                        <div class="col-lg-8">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-flush pt-3 mb-5 mb-lg-10">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="fw-bold">{{ __('messages.reservation_details') }}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row mb-3">
                                    <div class="col-4 fw-bold">{{ __('messages.court_name') }}:</div>
                                    <div class="col-8">{{ $checkout['title'] }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 fw-bold">{{ __('messages.date') }}:</div>
                                    <div class="col-8">{{ $checkout['date'] }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 fw-bold">{{ __('messages.from_hour') }}:</div>
                                    <div class="col-8">{{ $checkout['from_hour'] }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 fw-bold">{{ __('messages.to_hour') }}:</div>
                                    <div class="col-8">{{ $checkout['to_hour'] }}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4 fw-bold">{{ __('messages.price') }}:</div>
                                    <div class="col-8">{{ $checkout['price'] }} {{ __('messages.currency') }}</div>
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
