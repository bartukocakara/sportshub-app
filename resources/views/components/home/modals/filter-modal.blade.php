<div class="modal fade" id="kt_modal_create_app" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.filter') }}</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="custom_stepper">
                    <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                        <div class="stepper-nav ps-lg-10">
                            <div class="stepper-item current" data-step="1">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.date') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.date_filtering') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item" data-step="2">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.price') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.price_filtering') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item" data-step="3">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.sport_type') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.sport_type_filtering') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="filter_form">
                            <div class="step-content" data-step="1">
                                @include('components.home.modals.filter-types.date-filtering')
                            </div>
                            <div class="step-content" data-step="2">
                                @include('components.home.modals.filter-types.price-filtering')
                            </div>
                            <div class="step-content" data-step="3">
                                @include('components.home.modals.filter-types.sport-type-filtering')
                            </div>
                            <div class="d-flex flex-stack pt-10">
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" id="prev_step">Back</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary" id="next_step">Continue</button>
                                    <button type="submit" class="btn btn-lg btn-primary" id="submit_stepper">Start Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
