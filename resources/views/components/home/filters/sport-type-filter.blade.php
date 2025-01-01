<div class="form-group">
    <label for="sport_type">{{ __('messages.sport_type') }}</label>
    <select id="sport_type" name="sport_type" class="form-control" required>
        <option value="">{{ __('messages.select_sport') }}</option>
        @foreach ($homeData['sport_types'] as $item)
            <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>
