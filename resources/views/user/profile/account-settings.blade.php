@extends('layouts.app')

@section('title', __('messages.profile'))
@section('custom-styles')
<style>
.settings-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    padding: 20px;
}

.app-content {
    background-color: #1e1e2d;
    color: #ffffff;
    min-height: 100vh;
}

.settings-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    background-color: #2d2d3f; /* Slightly lighter than the background for contrast */
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    text-decoration: none;
    color: #ffffff;
    transition: transform 0.2s, box-shadow 0.2s;
}

.settings-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
}

.card-icon {
    font-size: 24px;
    margin-bottom: 10px;
    color: #ffffff;
}

.settings-card h3 {
    margin: 10px 0 5px;
    font-size: 18px;
    color: #ffffff;
}

.settings-card p {
    margin: 0;
    font-size: 14px;
    color: #cccccc;
}
</style>
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid" style="background-color: #1e1e2d;">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <h1 style="color: #ffffff;">Account Settings</h1>
                <div class="settings-grid">
                    <a href="{{ route('account.personal-info') }}" class="settings-card">
                        <span class="card-icon">👤</span>
                        <h3 style="color: #ffffff;">Personal Info</h3>
                        <p style="color: #cccccc;">Update your personal details</p>
                    </a>

                    <a href="{{ route('account.security') }}" class="settings-card">
                        <span class="card-icon">🔒</span>
                        <h3 style="color: #ffffff;">Security</h3>
                        <p style="color: #cccccc;">Manage account security and passwords</p>
                    </a>

                    <a href="{{ route('account.payments') }}" class="settings-card">
                        <span class="card-icon">💳</span>
                        <h3 style="color: #ffffff;">Payments</h3>
                        <p style="color: #cccccc;">View and manage payment methods</p>
                    </a>

                    <a href="{{ route('account.notifications') }}" class="settings-card">
                        <span class="card-icon">🔔</span>
                        <h3 style="color: #ffffff;">Notifications</h3>
                        <p style="color: #cccccc;">Adjust notification preferences</p>
                    </a>

                    <a href="{{ route('account.privacy') }}" class="settings-card">
                        <span class="card-icon">👁️</span>
                        <h3 style="color: #ffffff;">Privacy</h3>
                        <p style="color: #cccccc;">Control data sharing and visibility</p>
                    </a>

                    <a href="{{ route('account.travel-preferences') }}" class="settings-card">
                        <span class="card-icon">✈️</span>
                        <h3 style="color: #ffffff;">Travel Preferences</h3>
                        <p style="color: #cccccc;">Set travel-related settings</p>
                    </a>

                    <a href="{{ route('account.professional-tools') }}" class="settings-card">
                        <span class="card-icon">🏢</span>
                        <h3 style="color: #ffffff;">Professional Tools</h3>
                        <p style="color: #cccccc;">Access tools for professionals</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
