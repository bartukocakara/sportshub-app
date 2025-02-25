<div class="w-100">
    <div class="fv-row fv-plugins-icon-container">
        <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
            <h3 class="required">{{ __('messages.price_filtering') }}</h3>
        </label>

        <div class="d-flex">
            <div class="form-group">
                <label for="min_price">{{ __('messages.min_price') }}</label>
                <input type="number" id="min_price" name="min_price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="max_price">{{ __('messages.max_price') }}</label>
                <input type="number" id="max_price" name="max_price" class="form-control" step="0.01" required>
            </div>
        </div>

        <div class="fv-plugins-message-container invalid-feedback" style="display: none;"></div>
    </div>
</div>
