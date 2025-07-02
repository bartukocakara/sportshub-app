<div class="modal fade" id="kt_filter_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form action="{{ route('teams.index') }}" method="GET" class="form">
                <div class="modal-header">
                    <h2 class="fw-bold">{{ __('messages.filter_teams') }}</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="row mb-5">
                        <div class="col-12 mb-5">
                            <label class="form-label">{{ __('messages.title') }}</label>
                            <input type="text" name="title" class="form-control" placeholder="{{ __('messages.search_team_title') }}">
                        </div>
                        <div class="col-12 mb-5">
                            @include('components.filters.location-filtering')
                        </div>
                        <div class="col-12">
                            <label class="form-label">{{ __('messages.gender') }}</label>
                            <select name="gender" class="form-select" data-control="select2" data-placeholder="Select Gender">
                                <option></option>
                                <option value="male">👨 Male</option>
                                <option value="female">👩 Female</option>
                                <option value="mixed">👫 Mixed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            <label class="form-label">{{ __('messages.min_player') }}</label>
                            <input type="number" name="min_player" class="form-control" placeholder="Min player">
                        </div>
                        <div class="col-12">
                            <label class="form-label">{{ __('messages.max_player') }}</label>
                            <input type="number" name="max_player" class="form-control" placeholder="Max player">
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
