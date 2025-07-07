<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.street_name') }}</label>
    <input type="text" name="court_address[street_name]" class="form-control mb-2"
        placeholder="Street name" value="{{ old('court_address.street_name', $datas['court']->courtAddress->street_name ?? '') }}" />
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.address_detail') }}</label>
    <input type="text" name="court_address[address_detail]" class="form-control mb-2"
        placeholder="Address detail" value="{{ old('court_address.address_detail', $datas['court']->courtAddress->address_detail ?? '') }}" />
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.neighborhood') }}</label>
    <input type="text" name="court_address[neighborhood]" class="form-control mb-2"
        placeholder="Neighborhood" value="{{ old('court_address.neighborhood', $datas['court']->courtAddress->neighborhood ?? '') }}" />
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.building_number') }}</label>
    <input type="text" name="court_address[building_number]" class="form-control mb-2"
        placeholder="Building Number" value="{{ old('court_address.building_number', $datas['court']->courtAddress->building_number ?? '') }}" />
</div>
<!-- City -->
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.city') }}</label>
    <select id="city-select"
        class="form-select form-select-solid fw-bold text-dark"
        name="city_id"
        data-placeholder="Select City"
        data-allow-clear="true">
        <option value="">{{ __('messages.select_city') }}</option>
        @foreach ($datas['cities'] as $city)
            <option value="{{ $city->id }}"
                @selected(old('city_id', $datas['court']->city_id) == $city->id)>
                {{ $city->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.district') }}</label>
    <select name="court_address[district_id]" id="district-select" class="form-select mb-2">
        <option value="{{ old('court_address.district_id', $datas['court']->courtAddress->district_id ?? '') }}">
            {{ __('messages.select_district') }}
        </option>
    </select>
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.longitude') }}</label>
    <input type="text" name="court_address[longitude]" class="form-control mb-2"
        placeholder="Longitude" value="{{ old('court_address.longitude', $datas['court']->courtAddress->longitude ?? '') }}" />
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.latitude') }}</label>
    <input type="text" name="court_address[latitude]" class="form-control mb-2"
        placeholder="Latitude" value="{{ old('court_address.latitude', $datas['court']->courtAddress->latitude ?? '') }}" />
</div>
<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.map_location') }}</label>
    <div id="kt_contact_map" style="height: 400px; border-radius: 8px;"></div>
</div>
