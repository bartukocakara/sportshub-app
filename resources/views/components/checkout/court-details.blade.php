<div class="mb-7">
    <!-- Court Title -->
    <div class="row mb-3">
        <div class="col-4 fw-bold">{{ __('messages.court_title') }}:</div>
        <div class="col-8">{{ $court['title'] }}</div>
    </div>

    <!-- Court Location -->
    <div class="row mb-3">
        <div class="col-4 fw-bold">{{ __('messages.court_location') }}:</div>
        <div class="col-8">
            {{ $court['court_location']['city'] }}, {{ $court['court_location']['district'] }}
            <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#mapModal">
                {{ __('messages.find_location') }}
            </button>
        </div>
    </div>

    <!-- Court Price -->
    <div class="row mb-3">
        <div class="col-4 fw-bold">{{ __('messages.court_price') }}:</div>
        <div class="col-8">
            <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                <span class="fs-6 fw-semibold text-gray-400">₺</span>
                {{ $court['price'] }}
            </span>
            <button class="btn btn-sm btn-info show-pricing-list"
                data-bs-toggle="modal"
                data-bs-target="#pricingModal"
                data-id="{{ $court['court_id'] }}"
                data-pricings="{{ json_encode($court['court_reservation_pricings']) }}"
                data-route="{{ Auth::check() ? route('checkout.user.index') : route('checkout.guest.index') }}"
                data-court-title="{{ $court['title'] }}"
                data-court-address="{{ $court['address'] }}">
                {{ __('messages.show_pricing_list') }}
            </button>
        </div>
    </div>

    <!-- Court City -->
    <div class="row mb-3">
        <div class="col-4 fw-bold">{{ __('messages.city') }}:</div>
        <div class="col-8">{{ $court['court_location']['city'] }}</div>
    </div>

    <!-- Court District -->
    <div class="row mb-3">
        <div class="col-4 fw-bold">{{ __('messages.district') }}:</div>
        <div class="col-8">{{ $court['court_location']['district'] }}</div>
    </div>
</div>

@include('components.checkout.modals.map-modal')
@include('components.modals.pricing-list-modal')
