@foreach ($datas['matches']['data'] as $key => $match)
<div class="col-md-6 col-xl-4">
    <a href="/apps/projects/project.html?match_id={{ $match['id'] }}" class="card border-hover-primary">
        <div class="card-header border-0 pt-9">
            <div class="card-title m-0">
                <div class="symbol symbol-50px w-50px bg-light">
                    {{-- Assuming sport_type has an icon or a default could be set --}}
                    @if (isset($match['sport_type']) && $match['sport_type']['icon_url'])
                        <img src="{{ $match['sport_type']['icon_url'] }}" alt="{{ $match['sport_type']['name'] }}" class="p-3" />
                    @else
                        <img src="/assets/media/svg/brand-logos/xing-icon.svg" alt="Default Icon" class="p-3" />
                    @endif
                </div>
            </div>
            <div class="card-toolbar">
                <span class="badge {{ $match['status_badge'] }} fw-bold me-auto px-4 py-3">{{ $match['status_definition'] }}</span>
            </div>
        </div>
        <div class="card-body p-9">
            <div class="fs-3 fw-bold text-gray-900">{{ $match['title'] }}</div>
            <div class="d-flex flex-wrap mb-5">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">
                        {{-- Use expiring_date or play_date for "Due Date" --}}
                        @if ($match['expiring_date'])
                            {{ \Carbon\Carbon::parse($match['expiring_date'])->format('M d, Y') }}
                        @elseif ($match['play_date'])
                            {{ \Carbon\Carbon::parse($match['play_date'])->format('M d, Y') }}
                        @else
                            No Due Date
                        @endif
                    </div>
                    <div class="fw-semibold text-gray-500">Due Date</div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">
                        @if ($match['city_title'])
                            {{ $match['city_title'] }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="fw-semibold text-gray-500">City</div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">
                        @if (isset($match['court']) && $match['court']['name'])
                            {{ $match['court']['name'] }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="fw-semibold text-gray-500">Court</div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">
                        @if ($match['from_hour'] && $match['to_hour'])
                            {{ \Carbon\Carbon::parse($match['from_hour'])->format('H:i') }} - {{ \Carbon\Carbon::parse($match['to_hour'])->format('H:i') }}
                        @else
                            N/A
                        @endif
                    </div>
                    <div class="fw-semibold text-gray-500">Time</div>
                </div>
            </div>
            {{-- Progress bar and avatars would typically come from related data (e.g., match progress, assigned users)
                 which is not fully exposed in the current MatchResource. For demonstration,
                 I'll remove static values where possible, but dynamic progress/avatars
                 would require additional data in the resource or a dedicated relationship.
                 Here, I'm just removing the static values for aria-label and data-bs-original-title,
                 and the width, as there's no corresponding data. If a 'progress_percentage' field
                 were available in the resource, it would be used here. --}}
            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="Project completion" data-bs-original-title="Project completion" data-kt-initialized="1">
                {{-- If you had a 'progress_percentage' in your MatchResource:
                <div class="bg-primary rounded h-4px" role="progressbar" style="width: {{ $match['progress_percentage'] ?? 0 }}%" aria-valuenow="{{ $match['progress_percentage'] ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                --}}
                <div class="bg-primary rounded h-4px" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="symbol-group symbol-hover">
                {{-- If 'users' relationship was uncommented and loaded in MatchResource:
                @if (isset($match['users']))
                    @foreach ($match['users'] as $user)
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $user['name'] }}" data-bs-original-title="{{ $user['name'] }}" data-kt-initialized="1">
                            @if ($user['avatar_url'])
                                <img alt="Pic" src="{{ $user['avatar_url'] }}" />
                            @else
                                <span class="symbol-label bg-{{ ['primary', 'success', 'info', 'warning', 'danger'][array_rand(['primary', 'success', 'info', 'warning', 'danger'])] }} text-inverse-{{ ['primary', 'success', 'info', 'warning', 'danger'][array_rand(['primary', 'success', 'info', 'warning', 'danger'])] }} fw-bold">{{ substr($user['name'], 0, 1) }}</span>
                            @endif
                        </div>
                    @endforeach
                @endif
                --}}
                {{-- Placeholder if users are not loaded/available --}}
                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="No users assigned" data-bs-original-title="No users assigned" data-kt-initialized="1">
                    <span class="symbol-label bg-secondary text-inverse-secondary fw-bold">?</span>
                </div>
            </div>
        </div>
    </a>
</div>
@endforeach
