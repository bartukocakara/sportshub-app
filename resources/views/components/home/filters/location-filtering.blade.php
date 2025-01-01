<div class="mt-5">
    <button type="button" class="btn btn-light-primary me-3 show menu-dropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <i class="ki-duotone ki-filter fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>{{ __('messages.location_filtering') }}</button>
    <div class="menu menu-sub menu-sub-dropdown w-300px" data-kt-menu="true" style="z-index: 107; position: fixed; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-563.111px, 190.222px, 0px);" data-popper-placement="bottom-end">
        <div class="separator border-gray-200"></div>
        <div class="px-7 py-5" data-kt-user-table-filter="form">
            <div class="mb-10">
                <label class="form-label fs-6 fw-semibold">{{ __('messages.city') }}:</label>
                <select id="city-select" class="form-select form-select-solid fw-bold" data-placeholder="Select City" data-allow-clear="true">
                    <option value="">{{ __('messages.select_city') }}</option>
                    @foreach ($homeData['cities'] as $city)
                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-10">
                <label class="form-label fs-6 fw-semibold">{{ __('messages.district') }}:</label>
                <select id="district-select" class="form-select form-select-solid fw-bold" data-placeholder="Select District" data-allow-clear="true" disabled>
                    <option value="">{{ __('messages.select_district') }}</option>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
            </div>
        </div>
    </div>
</div>
