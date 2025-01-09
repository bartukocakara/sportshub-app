<div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
    <div class="card card-flush pt-3 mb-0">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('messages.court_details') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 fs-6">
            <!-- Court Image -->
            <img class="w-100 card-rounded"
                src="{{ asset('storage/courts/' . (($court['court_images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}"
                alt="Court Image"
                id="courtImage"
                data-court-images="{{ json_encode($court['court_images']) }}"
                style="cursor: pointer;"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">

            <div class="separator separator-dashed mb-7"></div>
            @include('components.checkout.court-details')
            <div class="separator separator-dashed mb-7"></div>
            <div class="mb-0">
                <button type="submit" class="btn btn-primary" id="kt_subscriptions_create_button">
                    <span class="indicator-label">{{ __('messages.make_payment') }}</span>
                    <span class="indicator-progress">
                        Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

@include('components.modals.court-images-modal')
@include('components.modals.pricing-list-modal')
