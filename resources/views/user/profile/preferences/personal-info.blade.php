@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Personal Information</h2>
    <form>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" value="{{ $data['name'] }}" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" value="{{ $data['email'] }}" disabled>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" value="{{ $data['phone'] }}" disabled>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
