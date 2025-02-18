<div class="modal fade" id="kt_modal_pricing" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="flex-row-fluid py-lg-5 px-lg-15">
                    <form class="form" id="filter_form" method="GET" action="{{ route('home') }}">
                        <!-- Include Hidden Inputs for Existing Filters -->
                        <input type="hidden" name="location" id="modal_location" value="{{ request()->get('location', '') }}">
                        <input type="hidden" name="date" id="modal_date" value="{{ request()->get('date', '') }}">
                        <input type="hidden" name="sport_type" id="modal_sport_type" value="{{ request()->get('sport_type', '') }}">

                        <!-- Price Range Filter -->
                        <div class="mb-5">
                            <label for="priceRange" class="form-label fw-bold">{{ __('messages.price_range') }}</label>
                            <div id="price-slider" style="width: 100%; margin: 20px 0;"></div>
                            <div class="d-flex justify-content-between">
                                <span id="price-min" class="text-muted">₺0</span>
                                <span id="price-max" class="text-muted">₺1000</span>
                            </div>
                            <input type="hidden" name="minimum_price" id="price_min_input" value="{{ request()->get('minimum_price', 0) }}">
                            <input type="hidden" name="maximum_price" id="price_max_input" value="{{ request()->get('maximum_price', 1000) }}">
                        </div>
                        <div class="d-flex flex-stack pt-10">
                            <div class="me-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-bs-dismiss="modal">
                                    {{ __('messages.back') }}
                                </button>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-lg btn-primary">
                                    {{ __('messages.start_filter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
