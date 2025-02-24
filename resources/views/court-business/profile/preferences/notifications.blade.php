@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Notification Settings</h2>
    <form>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="email-notifications" @if($data['email_notifications'] == 'Enabled') checked @endif>
            <label class="form-check-label" for="email-notifications">
                Email Notifications
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="sms-notifications" @if($data['sms_notifications'] == 'Enabled') checked @endif>
            <label class="form-check-label" for="sms-notifications">
                SMS Notifications
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Save Notification Settings</button>
    </form>
</div>
@endsection
