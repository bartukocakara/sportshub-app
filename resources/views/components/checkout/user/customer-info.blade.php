<div class="col-lg-6 col-sm-12 col-md-12 mb-10 mb-lg-0 p-5">
    <div class="card card-flush p-5">
        <h2 class="fw-bold">{{ __('messages.customer_details') }}</h2>
        <div class="card-body p-5">
            <div class="mb-3 row">
                <label for="customerName" class="form-label col-3">{{ __('messages.customer_name') }}:</label>
                <h6 class="col-9">{{ $court['customer_name'] }}</h6>
            </div>
            <div class="mb-3 row">
                <label for="customerEmail" class="form-label col-3">{{ __('messages.customer_email') }}:</label>
                <h6 class="col-9">{{ $court['customer_email'] }}</h6>
            </div>
            <div class="mb-3 row">
                <label for="customerPhone" class="form-label col-3">{{ __('messages.customer_phone') }}:</label>
                <h6 class="col-9">{{ $court['customer_phone'] }}</h6>
            </div>
        </div>
    </div>
</div>
