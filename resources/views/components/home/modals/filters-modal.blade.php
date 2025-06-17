<div class="modal fade" id="kt_modal_pricing" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="flex-row-fluid py-lg-5 px-lg-15">
                    <form class="form mx-auto" style="max-width: 600px;" id="filter_form" method="GET" action="{{ route('home') }}">
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="location" id="modal_location" value="{{ request()->get('location', '') }}">
                        <input type="hidden" name="date" id="modal_date" value="{{ request()->get('date', '') }}">
                        <input type="hidden" name="sport_type" id="modal_sport_type" value="{{ request()->get('sport_type', '') }}">

                        <!-- Location Filter -->
                        <div class="mb-4 text-center">
                            <div class="w-100 d-block mx-auto">
                                @include('components.home.filters.location-filtering')
                            </div>
                        </div>

                        <!-- Date Filter -->
                        <div class="mb-4 text-center">
                            <div class="w-100 d-block mx-auto">
                                @include('components.home.filters.date-filtering')
                            </div>
                        </div>

                        <!-- Sport Type Filter -->
                        <div class="mb-4 text-center">
                            <div class="w-100 d-block mx-auto">
                                @include('components.home.filters.sport-type-filter')
                            </div>
                        </div>

                        <!-- Price Slider -->
                        <div class="mb-4 text-center">
                            <h4>{{ __('messages.price_range') }}</h4>
                            <div id="price-slider" style="width: 100%; max-width: 500px; margin: 20px auto;"></div>
                            <div class="d-flex justify-content-between px-4">
                                <span id="price-min" class="text-light">₺0</span>
                                <span id="price-max" class="text-light">₺1000</span>
                            </div>
                            <input type="hidden" name="minimum_price" id="price_min_input" value="{{ request()->get('minimum_price', 0) }}">
                            <input type="hidden" name="maximum_price" id="price_max_input" value="{{ request()->get('maximum_price', 1000) }}">
                        </div>

                        <!-- Action Buttons -->
                        <div class="mt-5 text-center">
                            <button type="button" class="btn btn-light-primary me-3" data-bs-dismiss="modal">
                                {{ __('messages.back') }}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.start_filter') }}
                            </button>
                        </div>
                        <input type="hidden" name="minimum_price" id="main_min_price" value="{{ request()->get('minimum_price', 0) }}">
                        <input type="hidden" name="maximum_price" id="main_max_price" value="{{ request()->get('maximum_price', 1000) }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
