@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Account Settings</h2>
    <div class="list-group">
        <a href="{{ route('account.personal-info') }}" class="list-group-item list-group-item-action">
            Personal Information
        </a>
        <a href="{{ route('account.security') }}" class="list-group-item list-group-item-action">
            Security
        </a>
        <a href="{{ route('account.payments') }}" class="list-group-item list-group-item-action">
            Payments
        </a>
        <a href="{{ route('account.notifications') }}" class="list-group-item list-group-item-action">
            Notifications
        </a>
        <a href="{{ route('account.privacy') }}" class="list-group-item list-group-item-action">
            Privacy
        </a>
    </div>
</div>
@endsection
