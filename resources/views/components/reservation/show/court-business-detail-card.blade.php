<div class="card w-50" id="kt_reservation_details_view">
    <div class="card-header cursor-pointer">
        <!-- Flex container: left side shows title/status, right side shows the small slider -->
        <div class="d-flex w-100 justify-content-between align-items-start">
            <div>
                <h3 class="fw-bold m-0">{{ $reservation->title }}</h3>
                <span class="badge position-absolute top-0 end-0 m-3
                    @switch($reservation->payment_status)
                        @case(1)
                            bg-warning
                            @break
                        @case(2)
                            bg-success
                            @break
                        @case(3)
                            bg-danger
                            @break
                        @case(4)
                            bg-info
                            @break
                        @default
                            bg-secondary
                    @endswitch
                ">
                    {{ __('messages.payment_status_list.' . $reservation['payment_status']) }}
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

                <span class="fw-bold fs-6 text-gray-800">{{ $reservation->user ? $reservation->user->first_name. ' ' . $reservation->user->last_name : $reservation->customer_name }}</span>
            </div>
        </div>
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.customer_email') }}</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $reservation->user ? $reservation->user->email : $reservation->customer_email }}</span>
            </div>
        </div>
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.customer_phone') }}</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $reservation->user ? $reservation->user->phone_number : $reservation->customer_phone }}</span>
            </div>
        </div>

        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.code') }}</label>
            <div class="col-lg-8">

                <span class="fw-bold fs-6 text-gray-800">{{ $reservation->code }}</span>
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
