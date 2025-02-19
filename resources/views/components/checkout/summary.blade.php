<div class="col-lg-6 col-sm-12 col-md-12">
    <div class=" mb-0">
        <div class="card-header p-3">
            <div class="card-title">
                <h2>{{ __('messages.court_details') }}</h2>
            </div>
        </div>
        <div class="row p-4">
            <img class="col-lg-6 col-md-12 col-sm-12"
                src="{{ asset('storage/courts/' . (($court['court_images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}"
                alt="Court Image"
                id="courtImage"
                data-court-images="{{ json_encode($court['court_images']) }}"
                style="cursor: pointer;"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">
            <div class="col-6 separator mb-7">
                @include('components.checkout.court-details')
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 p-4">

            </div>
        </div>
    </div>
</div>

@include('components.modals.court-images-modal')
@include('components.modals.pricing-list-modal')
