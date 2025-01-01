<div class="col-6">
    <label for="filter_date">{{ __('messages.date') }}</label>
    <input type="date" id="filter_date" name="filter_date" class="form-control" placeholder="Select a date" required>
</div>
<div class="col-6">
    <label for="time_range">{{ __('messages.time_range') }}</label>
    <div class="d-flex align-items-center">
        <select id="start_time" name="start_time" class="form-control me-2" required>
            <option value="" disabled selected>{{ __('messages.start_time') }}</option>
        </select>
        <span class="mx-2">-</span>
        <select id="end_time" name="end_time" class="form-control ms-2" required>
            <option value="" disabled selected>{{ __('messages.end_time') }}</option>
        </select>
    </div>
</div>
