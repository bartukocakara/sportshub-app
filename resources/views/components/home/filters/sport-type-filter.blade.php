<div class="form-group">
    <label for="sport_type">{{ __('messages.sport_type') }}</label>
    <select id="sport_type" name="sport_type_id" class="form-control form-select text-white" required>
        <option value="">{{ __('messages.select_sport') }}</option>
        @foreach ($homeData['sport_types'] as $item)
            <option value="{{ $item->id }}"
                @if(old('sport_type_id', request()->get('sport_type_id')) == $item->id) selected @endif>
                {{ $item->title }}
            </option>
        @endforeach
    </select>
</div>
