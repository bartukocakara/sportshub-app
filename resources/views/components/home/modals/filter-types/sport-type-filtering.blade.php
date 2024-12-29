<div class="w-100">
    <div class="fv-row mb-10 fv-plugins-icon-container">
        <label class="required fs-5 fw-semibold mb-2">{{ __('messages.sport_type_filtering') }}</label>
    <div class="fv-plugins-message-container invalid-feedback"></div></div>
    <div class="fv-row fv-plugins-icon-container">
        <div class="form-group">
            <label for="sport_type">{{ __('messages.sport_type') }}</label>
            <select id="sport_type" name="sport_type" class="form-control" required>
                <option value="">{{ __('messages.select_sport') }}</option>
                <option value="football">{{ __('messages.football') }}</option>
                <option value="basketball">{{ __('messages.basketball') }}</option>
                <option value="tennis">{{ __('messages.tennis') }}</option>
            </select>
        </div>
    <div class="fv-plugins-message-container invalid-feedback"></div></div>
</div>
