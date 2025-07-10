@extends('layouts.user.index')

@section('title', __('messages.activities'))

@section('custom-styles')
    {{-- Consider using a modern date picker if possible, jQuery UI is quite heavy --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
    <style>
        /* Custom styles for improved readability and spacing */
        .timeline-content .fs-5 {
            line-height: 1.5; /* Improve line spacing for messages */
        }
        .timeline-content .text-muted {
            font-size: 0.9rem !important; /* Slightly smaller for less emphasis on time */
        }
        .timeline-item {
            margin-bottom: 25px; /* Add more vertical space between timeline items */
        }
        .timeline-icon {
            padding-top: 5px; /* Adjust icon vertical alignment */
        }
        .timeline-line {
            left: 11px; /* Align line with the center of the icon */
        }
        .timeline-border-dashed {
            padding-left: 20px; /* Add some left padding to the whole timeline */
        }
        /* Further refine button spacing */
        .timeline-content .px-3 {
            padding-left: 0 !important; /* Remove extra left padding from the button container */
            margin-top: 10px; /* Space out the button from the text */
        }
    </style>
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

    {{-- The card-body directly follows the card, which is good --}}
    <div class="card-body">
        <div class="tab-content">
            <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">

                {{-- Ensure your pagination component works correctly with the $datas['activities'] structure --}}
                @include('components.pagination.default', ['data' => $datas['activities']])

                <div class="timeline timeline-border-dashed mt-5">
                    @foreach ($datas['activities']['data'] as $activity)
                        <div class="timeline-item mt-5">
                            <div class="timeline-line"></div>
                            <div class="timeline-icon">
                                @php
                                    // Using Feather icons as a good general-purpose, clean alternative
                                    $iconSvgMap = [
                                        'match.created' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
                                        'match.joined'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>',
                                        'team.created'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87c-.6-.6-1.4-.87-2-.13c-.6.6-1.4.87-2 .13-.6-.6-1.4-.87-2-.13a4 4 0 0 0-3 3.87v2"></path><circle cx="16" cy="7" r="4"></circle></svg>',
                                        'team.joined'   => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>',
                                    ];
                                    $iconSvg = $iconSvgMap[$activity['type']] ?? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>';
                                @endphp
                                <span class="svg-icon svg-icon-2 text-gray-500">
                                    {!! $iconSvg !!}
                                </span>
                            </div>

                            <div class="timeline-content mb-10 mt-n1">
                                <div class="pe-3 mb-2">
                                    <div class="fs-5 fw-semibold text-gray-800">
                                        {{-- Ensure message exists, otherwise display a fallback --}}
                                        {{ $activity['properties']['message'] ?? 'No activity message available.' }}
                                    </div>
                                    <div class="d-flex align-items-center mt-1 fs-6 text-muted">
                                        <span class="me-2 fs-7">
                                            {{ \Carbon\Carbon::parse($activity['activity_at'])->diffForHumans() }}
                                        </span>
                                    </div>
                                </div>

                                @if (!empty($activity['subject_url']))
                                    <div class="px-3">
                                        <a href="{{ $activity['subject_url'] }}"
                                        class="btn btn-sm btn-light btn-active-light-primary">
                                            View {{ $activity['subject_title'] ?? 'Details' }} {{-- Add fallback for subject_title --}}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            {{-- Placeholder for other tabs if they become active --}}
            <div id="kt_activity_week" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_activity_week_tab"></div>
            <div id="kt_activity_month" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_activity_month_tab"></div>
            <div id="kt_activity_year" class="card-body p-0 tab-pane fade" role="tabpanel" aria-labelledby="kt_activity_year_tab"></div>
        </div>
    </div>
</div>
@endsection
