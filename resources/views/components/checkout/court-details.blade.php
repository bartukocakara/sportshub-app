<div class="mb-7">
    <div class="mb-3">
        <label for="courtTitle" class="form-label">{{ __('messages.court_title') }}</label>
        <span id="courtTitle" class="form-control-plaintext">{{ $court['title'] }}</span>
    </div>

    <div class="mb-3">
        <label for="courtLocation" class="form-label">{{ __('messages.court_location') }}</label>
        <span id="courtLocation" class="form-control-plaintext">
            {{ $court['court_location']['city'] }}, {{ $court['court_location']['district'] }}
        </span>
        <!-- Add a button to open the map modal -->
        <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#mapModal">
            {{ __('messages.find_location') }}
        </button>
    </div>

    <div class="mb-3">
        <label for="courtPrice" class="form-label">{{ __('messages.court_price') }}</label>
        <span id="courtPrice" class="form-control-plaintext">{{ $court['price'] }}</span>
    </div>

    <!-- Additional Address Details -->
    <div class="mb-3">
        <label for="courtCity" class="form-label">{{ __('messages.city') }}</label>
        <span id="courtCity" class="form-control-plaintext">{{ $court['court_location']['city'] }}</span>
    </div>

    <div class="mb-3">
        <label for="courtDistrict" class="form-label">{{ __('messages.district') }}</label>
        <span id="courtDistrict" class="form-control-plaintext">{{ $court['court_location']['district'] }}</span>
    </div>
</div>

<!-- Modal for Map Location -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">{{ __('messages.select_court_location') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('components.home.map')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                <button type="button" class="btn btn-primary">{{ __('messages.select_location') }}</button>
            </div>
        </div>
    </div>
</div>
