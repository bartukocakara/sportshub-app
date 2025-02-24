@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payment Information</h2>
    <form>
        <div class="form-group">
            <label for="payment-method">Payment Method</label>
            <input type="text" class="form-control" id="payment-method" value="{{ $data['payment_method'] }}" disabled>
        </div>
        <div class="form-group">
            <label for="billing-address">Billing Address</label>
            <input type="text" class="form-control" id="billing-address" value="{{ $data['billing_address'] }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Update Payment Information</button>
    </form>
</div>
@endsection
