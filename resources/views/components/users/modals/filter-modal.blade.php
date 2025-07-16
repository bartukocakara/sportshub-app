<div class="modal fade" id="kt_filter_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form action="{{ route('users.index') }}" method="GET" class="form">
                <div class="modal-header">
                    <h2 class="fw-bold">{{ __('messages.filter_users') }}</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="row mb-5">
                        <div class="col-12 mb-5">
                            <label class="form-label">{{ __('messages.title') }}</label>
                            <input type="text" name="full_name" class="form-control" placeholder="{{ __('messages.search_full_name') }}">
                        </div>
                        <div class="col-12 mb-5">
                            @include('components.filters.location-filtering')
                        </div>
                        <div class="col-12">
                            <label class="form-label">{{ __('messages.gender') }}</label>
                            <select name="gender" class="form-select" data-control="select2" data-placeholder="{{ __('messages.select_gender') }}">
                                <option></option>
                                <option value="male">👨 {{ __('messages.male') }}</option>
                                <option value="female">👩 {{ __('messages.female') }}</option>
                                <option value="mixed">👫 {{ __('messages.others') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            @include('components.filters.sport-type-filter')
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.apply_filters') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
