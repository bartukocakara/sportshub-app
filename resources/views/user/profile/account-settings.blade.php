@extends('layouts.app')

@section('title', __('messages.profile'))
@section('custom-styles')
<link rel="stylesheet" href="{{ asset('assets/css/account-settings.css') }}">
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid" style="background-color: #1e1e2d;">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <h1 style="color: #ffffff;">{{ __('messages.account_settings') }}</h1>
                <div class="settings-grid">
                    <a href="{{ route('account.personal-info') }}" class="settings-card">
                        <span class="card-icon">👤</span>
                        <h3 style="color: #ffffff;">{{ __('messages.personel_info') }}</h3>
                        <p style="color: #cccccc;">{{ __('messages.update_personal_details') }}</p>
                    </a>

                    <a href="{{ route('account.security') }}" class="settings-card">
                        <span class="card-icon">🔒</span>
                        <h3 style="color: #ffffff;">{{ __('messages.security') }}</h3>
                        <p style="color: #cccccc;">{{ __('messages.manage_account_security_and_passwords') }}</p>
                    </a>

                    <a href="{{ route('account.payments') }}" class="settings-card">
                        <span class="card-icon">💳</span>
                        <h3 style="color: #ffffff;">{{ __('messages.payments') }}</h3>
                        <p style="color: #cccccc;">{{ __('messages.view_and_manage_payment_methods') }}</p>
                    </a>

                    <a href="{{ route('account.notifications') }}" class="settings-card">
                        <span class="card-icon">🔔</span>
                        <h3 style="color: #ffffff;">{{ __('messages.notifications') }}</h3>
                        <p style="color: #cccccc;">{{ __('messages.adjust_notification_preferences') }} </p>
                    </a>

                    <a href="{{ route('account.privacy') }}" class="settings-card">
                        <span class="card-icon">👁️</span>
                        <h3 style="color: #ffffff;">{{ __('messages.privacy') }}</h3>
                        <p style="color: #cccccc;">{{ __('messages.control_data_sharing_and_visibility') }} </p>
                    </a>

                    <a href="{{ route('account.professional-tools') }}" class="settings-card">
                        <span class="card-icon">🏢</span>
                        <h3 style="color: #ffffff;">{{ __('messages.professional_tools') }}</h3>
                        <p style="color: #cccccc;">{{ __('messages.access_tools_for_professionals') }}</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
