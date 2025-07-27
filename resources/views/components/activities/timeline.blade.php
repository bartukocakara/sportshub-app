@props([
    'is_paginated' => true,
    'is_show' => true,
    'datas' => [
        'activities' => [],
    ]
])

<div id="kt_activity_today" class="card-body px-15 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
    @if($is_paginated)
    @include('components.pagination.default', ['is_paginated', 'data' => $datas['activities']])
    @endif
    <div id="profile-activity-list" class="timeline timeline-border-dashed mt-5">
        @foreach ($datas['activities']['data'] as $activity)
            <div class="timeline-item mt-5">
                <div class="timeline-line"></div>
                <div class="timeline-icon">
                    @php
                        $iconSvgMap = [
                            'match.created' => [
                                'color' => '#009ef7',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#009ef7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>'
                            ],
                            'match.updated' => [
                                'color' => '#ffc107',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#ffc107" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg>'
                            ],
                            'match.canceled' => [
                                'color' => '#dc3545',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>'
                            ],
                            'match.joined' => [
                                'color' => '#50cd89',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#50cd89" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>'
                            ],
                            'team.created' => [
                                'color' => '#73DE73',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#73DE73" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><circle cx="16" cy="7" r="4"></circle></svg>'
                            ],
                            'team.updated' => [
                                'color' => '#fd7e14',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#fd7e14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0114.13-3.36L23 10m-2.49 5a9 9 0 01-14.13 3.36L1 14"></path></svg>'
                            ],
                            'team.joined' => [
                                'color' => '#71C0EB',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#71C0EB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>'
                            ],
                            'court.created' => [
                                'color' => '#6610f2',
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#6610f2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>'
                            ],
                        ];

                        $icon = $iconSvgMap[$activity['type']] ?? [
                            'color' => '#a1a5b7',
                            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#a1a5b7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>'
                        ];
                    @endphp
                    <span class="svg-icon svg-icon-1" style="color: {{ $icon['color'] }};">
                        {!! $icon['svg'] !!}
                    </span>
                </div>
                <div class="timeline-content mb-10 mt-n1">
                    <div class="pe-3 mb-2">
                        <div class="fs-5 fw-semibold text-gray-800">
                            {{ __('messages.' . ($activity['properties']['key'] ?? 'unknown'), $activity['properties']['params'] ?? []) }}
                        </div>
                        <div class="d-flex align-items-center mt-1 fs-6 text-muted">
                            <span class="me-2 fs-7">
                                {{ \Carbon\Carbon::parse($activity['activity_at'])->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    @if ($is_show &&!empty($activity['subject_url']))
                        <div class="px-3">
                            <a href="{{ $activity['subject_url'] }}" class="btn btn-sm btn-light btn-active-light-primary">
                                {{ __('messages.view') }} {{ $activity['subject_title'] }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
