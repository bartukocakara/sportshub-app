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
    <h4 for="date">{{ __('messages.date') }}</h4>
    <input type="date"
           id="date"
           name="date"
           class="form-control text-dark"
           placeholder="Select a date"
           required
           value="{{ old('date', request()->get('date')) }}">
</div>

<div class="col-6">
    <h4 for="time_range">{{ __('messages.time_range') }}</h4>
    <div class="d-flex align-items-center">
        <select id="from_hour"
                name="from_hour"
                class="form-select form-control me-2 text-dark"
                required>
            <option value="" disabled selected>{{ __('messages.start_time') }}</option>
            @foreach(generateTimeOptions() as $time)
                <option value="{{ $time }}"
                        @if(old('from_hour', request()->get('from_hour')) == $time) selected @endif>
                    {{ $time }}
                </option>
            @endforeach
        </select>
        <span class="mx-2">-</span>
        <select id="to_hour"
                name="to_hour"
                class="form-select form-control ms-2 text-dark"
                required>
            <option value="" disabled selected>{{ __('messages.end_time') }}</option>
            @foreach(generateTimeOptions() as $time)
                <option value="{{ $time }}"
                        @if(old('to_hour', request()->get('to_hour')) == $time) selected @endif>
                    {{ $time }}
                </option>
            @endforeach
        </select>
    </div>
</div>
