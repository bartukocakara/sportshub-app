@php
    function generateTimeOptions() {
    $options = [];
    $startHour = 0; // 00:00
    $endHour = 24; // 24:00 (not inclusive)

    for ($hour = $startHour; $hour < $endHour; $hour++) {
        $formattedTime = str_pad($hour, 2, "0", STR_PAD_LEFT) . ":00"; // Format time as HH:00
        $options[] = $formattedTime;
    }

    return $options;
}
@endphp
<div class="col-6">
    <label for="filter_date">{{ __('messages.date') }}</label>
    <input type="date"
           id="filter_date"
           name="filter_date"
           class="form-select form-control text-dark"
           placeholder="Select a date"
           required
           value="{{ old('filter_date', request()->get('filter_date')) }}">
</div>

<div class="col-6">
    <label for="time_range">{{ __('messages.time_range') }}</label>
    <div class="d-flex align-items-center">
        <select id="start_time"
                name="start_time"
                class="form-select form-control me-2 text-dark"
                required>
            <option value="" disabled selected>{{ __('messages.start_time') }}</option>
            @foreach(generateTimeOptions() as $time)
                <option value="{{ $time }}"
                        @if(old('start_time', request()->get('start_time')) == $time) selected @endif>
                    {{ $time }}
                </option>
            @endforeach
        </select>
        <span class="mx-2">-</span>
        <select id="end_time"
                name="end_time"
                class="form-select form-control ms-2 text-dark"
                required>
            <option value="" disabled selected>{{ __('messages.end_time') }}</option>
            @foreach(generateTimeOptions() as $time)
                <option value="{{ $time }}"
                        @if(old('end_time', request()->get('end_time')) == $time) selected @endif>
                    {{ $time }}
                </option>
            @endforeach
        </select>
    </div>
</div>
