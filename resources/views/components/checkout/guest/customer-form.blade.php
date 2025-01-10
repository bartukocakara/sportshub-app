<div class="mb-3">
    <label for="customerName" class="form-label">{{ __('messages.customer_name') }}</label>
    <input type="text"
           id="customerName"
           name="customer_name"
           class="form-control @error('customer_name') is-invalid @enderror"
           placeholder="{{ __('messages.enter_customer_name') }}"
           value="{{ old('customer_name') }}"
           required />
    @error('customer_name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="customerEmail" class="form-label">{{ __('messages.customer_email') }}</label>
    <input type="email"
           id="customerEmail"
           name="customer_email"
           class="form-control @error('customer_email') is-invalid @enderror"
           placeholder="{{ __('messages.enter_customer_email') }}"
           value="{{ old('customer_email') }}"
           required />
    @error('customer_email')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="customerPhone" class="form-label">{{ __('messages.customer_phone') }}</label>
    <input type="text"
           id="customerPhone"
           name="customer_phone"
           class="form-control @error('customer_phone') is-invalid @enderror"
           placeholder="{{ __('messages.enter_customer_phone') }}"
           value="{{ old('customer_phone') }}"
           required />
    @error('customer_phone')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

