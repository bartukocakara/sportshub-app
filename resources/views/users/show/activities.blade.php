@extends('layouts.user.index')

@section('title', __('messages.activities'))

@section('custom-styles')
    {{-- Consider using a modern date picker if possible, jQuery UI is quite heavy --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />

@endsection

@section('content')
<div class="row g-5 g-xxl-8">
    <div class="card">
        <div class="card-header card-header-stretch">
            <div class="card-title d-flex align-items-center">
                {{-- Keep the Metronic icon for the header as it fits the overall theme --}}
                <i class="ki-duotone ki-calendar-8 fs-1 text-primary me-3 lh-0">
                    <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
                </i>
                {{-- Use a more dynamic date display --}}
                <h3 class="fw-bold m-0 text-gray-800">{{ \Carbon\Carbon::today()->format('M d, Y') }}</h3>
            </div>
            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today" aria-selected="true"> Today </a>
                </li>
                {{-- Uncomment and implement these tabs if needed, ensuring they fetch data dynamically --}}
                {{--
                <li class="nav-item" role="presentation">
                    <a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_week" aria-selected="false" tabindex="-1"> Week </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="kt_activity_month_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_month" aria-bs-selected="false" tabindex="-1"> Month </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="kt_activity_year_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_year" aria-selected="false" tabindex="-1"> {{ \Carbon\Carbon::today()->year }} </a>
                </li>
                --}}
            </ul>
        </div>
    </div>

    <div class="card-body">
        <div class="tab-content">
            @include('components.activities.timeline')
            <div id="kt_activity_week" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_activity_week_tab"></div>
            <div id="kt_activity_month" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_activity_month_tab"></div>
            <div id="kt_activity_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_activity_year_tab"></div>
        </div>
    </div>
</div>
@endsection
