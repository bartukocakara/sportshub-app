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
                            <div class="mt-5">
                                <button type="button" class="btn btn-light-primary me-3 show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-filter fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>{{ __('messages.location_filtering') }}
                                </button>
                                <div class="menu menu-sub menu-sub-dropdown w-300px" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-563.111px, 190.222px, 0px);" data-popper-placement="bottom-end">
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">{{ __('messages.city') }}:</label>
                                            <select id="city-select"
                                                    class="form-select form-select-solid fw-bold text-dark"
                                                    data-placeholder="Select City"
                                                    name="city_id"
                                                    data-allow-clear="true">
                                                <option value="">{{ __('messages.select_city') }}</option>
                                                @foreach ($datas['cities'] as $city)
                                                    <option value="{{ $city->id }}" style="text-transform: capitalize; font-size: 16px;">{{ $city->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">{{ __('messages.district') }}:</label>
                                            <select id="district-select"
                                                    name="district_id"
                                                    class="form-select form-select-solid fw-bold text-dark"
                                                    data-placeholder="Select District"
                                                    data-allow-clear="true"
                                                    disabled>
                                                <option value="">{{ __('messages.select_district') }}</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6">{{ __('messages.apply') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.apply_filters') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
