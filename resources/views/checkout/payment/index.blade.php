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
                            {{ __('messages.checkout_details') }}
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
                        <form action="{{ route('guest.make.payment') }}" method="POST" id="paymentForm">
                            @csrf
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">{{ __('messages.payment_details') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <!-- Full Name -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('messages.full_name') }}</label>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="fname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="{{ __('messages.first_name') }}" required>
                                                    @error('fname')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <input type="text" name="lname" class="form-control form-control-lg form-control-solid" placeholder="{{ __('messages.last_name') }}" required>
                                                    @error('lname')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Number -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('messages.card_number') }}</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="card_number" class="form-control form-control-lg form-control-solid" placeholder="{{ __('messages.enter_card_number') }}" required>
                                            @error('card_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Expiry Date -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('messages.expiry_date') }}</label>
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <!-- Month Dropdown -->
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <select name="expiry_month" class="form-control form-control-lg form-control-solid" required>
                                                        <option value="" disabled selected>{{ __('messages.select_month') }}</option>
                                                        @for ($i = 1; $i <= 12; $i++)
                                                            <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                                                {{ str_pad($i, 2, '0', STR_PAD_LEFT) }} - {{ \Carbon\Carbon::createFromFormat('m', $i)->format('F') }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('expiry_month')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Year Dropdown -->
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <select name="expiry_year" class="form-control form-control-lg form-control-solid" required>
                                                        <option value="" disabled selected>{{ __('messages.select_year') }}</option>
                                                        @for ($i = 0; $i < 10; $i++) <!-- Display next 10 years -->
                                                            <option value="{{ \Carbon\Carbon::now()->addYears($i)->format('Y') }}">
                                                                {{ \Carbon\Carbon::now()->addYears($i)->format('Y') }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                    @error('expiry_year')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- CVV -->
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">{{ __('messages.cvv') }}</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="cvv" class="form-control form-control-lg form-control-solid" placeholder="CVV" required>
                                            @error('cvv')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">{{ __('messages.complete_payment') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Reservation Details -->
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
@section('page-scripts')
@include('components.checkout.scripts.payment-scripts')
@endsection
