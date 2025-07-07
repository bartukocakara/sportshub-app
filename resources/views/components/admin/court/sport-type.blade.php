<div class="mb-10 fv-row">
    <label class="form-label">{{ __('messages.sport_type') }}</label>
    <select name="sport_type_id" class="form-select" required>
        <option value="">{{ __('messages.select_sport_type') }}</option>
        @foreach ($datas['sport_types'] as $key => $sportType)
            <option value="{{ $sportType->id }}" @selected(old('sport_type_id', $datas['court']->sport_type_id) == $sportType->id)>
                {{ $sportType->title }}
            </option>
        @endforeach
    </select>
</div>
