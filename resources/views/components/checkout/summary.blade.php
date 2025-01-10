<div class="col-6">
    <div class="card card-flush pt-3 mb-0">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('messages.court_details') }}</h2>
            </div>
        </div>
        <div class="row">
            <img class="col-6"
                src="{{ asset('storage/courts/' . (($court['court_images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}"
                alt="Court Image"
                id="courtImage"
                data-court-images="{{ json_encode($court['court_images']) }}"
                style="cursor: pointer;"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">
            <div class="col-6 separator separator-dashed mb-7">
            @include('components.checkout.court-details')
            </div>
            <div class="col-12 p-4">
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
