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
            <div class="row mb-3">
                <div class="col-12  mt-5">
                    <img class="col-lg-6 col-md-12 col-sm-12"
                        src="{{ asset('storage/courts/' . (($checkout['images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}"
                        alt="Court Image"
                        id="courtImage"
                        data-court-images="{{ json_encode($checkout['images']) }}"
                        style="cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#imageModal">
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.modals.court-images-modal')
