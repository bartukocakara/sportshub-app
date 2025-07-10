 <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">
    @include('components.pagination.default', ['data' => $datas['activities']])
    <div class="timeline timeline-border-dashed mt-5">
        @foreach ($datas['activities']['data'] as $activity)
            <div class="timeline-item mt-5">
                <div class="timeline-line"></div>
                <div class="timeline-icon">
                    @php
                        $iconSvgMap = [
                            'match.created' => [
                                'color' => '#009ef7', // Mavi
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#009ef7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>'
                            ],
                            'match.joined' => [
                                'color' => '#50cd89', // Yeşil
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#50cd89" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>'
                            ],
                            'team.created' => [
                                'color' => '#f6c000', // Sarı
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#f6c000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87c-.6-.6-1.4-.87-2-.13c-.6.6-1.4.87-2 .13-.6-.6-1.4-.87-2-.13a4 4 0 0 0-3 3.87v2"></path><circle cx="16" cy="7" r="4"></circle></svg>'
                            ],
                            'team.joined' => [
                                'color' => '#e11d48', // Kırmızı
                                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#e11d48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>'
                            ],
                        ];
                        $icon = $iconSvgMap[$activity['type']] ?? [
                            'color' => '#a1a5b7',
                            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="#a1a5b7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>'
                        ];
                    @endphp
                    <span class="svg-icon svg-icon-2" style="color: {{ $icon['color'] }};">
                        {!! $icon['svg'] !!}
                    </span>
                </div>
                <div class="timeline-content mb-10 mt-n1">
                    <div class="pe-3 mb-2">
                        <div class="fs-5 fw-semibold text-gray-800">
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
                                View {{ $activity['subject_title'] ?? 'Details' }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
