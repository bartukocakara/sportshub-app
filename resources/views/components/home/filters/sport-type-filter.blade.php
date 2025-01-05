<div class="form-group">
    <h4 for="sport_type">{{ __('messages.sport_type') }}</h4>
    <select id="sport_type" name="sport_type_id" class="form-control form-select text-dark" required>
        <option value="">{{ __('messages.select_sport') }}</option>
        @foreach ($homeData['sport_types'] as $item)
            <option value="{{ $item->id }}"
                @if(old('sport_type_id', request()->get('sport_type_id')) == $item->id) selected @endif>
                {{ $item->title }}
            </option>
        @endforeach
    </select>
</div>
