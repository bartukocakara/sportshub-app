<div class="w-100">
    <div class="fv-row mb-10 fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
            <span class="required">{{ __('messages.date_filtering') }}</span>
        </label>
        <div id="date_error" class="fv-plugins-message-container invalid-feedback" style="display: none;"></div>
    </div>
    <div class="fv-row">
        <div class="form-group">
            <label for="start_date">{{ __('messages.start_date') }}</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">{{ __('messages.end_date') }}</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
        </div>
    </div>
</div>
