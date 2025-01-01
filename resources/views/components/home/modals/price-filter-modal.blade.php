<div class="modal fade" id="kt_modal_create_app" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="flex-row-fluid py-lg-5 px-lg-15">
                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" id="filter_form">
                        <div class="mb-5">
                            <label for="priceRange" class="form-label fw-bold">{{ __('messages.price_range') }}</label>
                            <div id="price-slider" style="width: 100%; margin: 20px 0;"></div>
                            <div class="d-flex justify-content-between">
                                <span id="price-min" class="text-muted">₺0</span>
                                <span id="price-max" class="text-muted">₺1000</span>
                            </div>
                        </div>
                        <div class="d-flex flex-stack pt-10">
                            <div class="me-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3">
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
