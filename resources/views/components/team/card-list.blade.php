<div class="row g-6 g-xl-9 mt-1">
    @foreach ($datas['teams']['data'] as $key => $team)
    <div class="col-md-6 col-xl-4">
        <div class="card border shadow-sm">
            <div class="card-header border-0 pt-9">
                <div class="card-title m-0">
                    <div class="symbol-group symbol-hover">
                        @foreach ($team['users'] as $index => $user)
                            @if ($index < 3)
                                @if ($user['avatar'])
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $user['first_name'] }}" data-bs-original-title="{{ $user['first_name'] }}">
                                        <img alt="Pic" src="/storage/avatar/{{ $user['avatar'] }}" />
                                    </div>
                                @else
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ $user['first_name'] }}">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                            {{ strtoupper(Str::substr($user['first_name'], 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            @endif
                        @endforeach

                        @if (count($team['users']) > 3)
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ count($team['users']) - 3 }} kişi daha">
                                <span class="symbol-label bg-light text-gray-600 fw-bold">
                                    +{{ count($team['users']) - 3 }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card-toolbar">
                    <span class="badge fw-bold me-auto px-4 py-3 {{ $team['status_badge'] }}">
                        {{ $team['status_definition'] ?? 'Bilinmiyor' }}
                    </span>
                </div>
            </div>
            <div class="card-body p-9">
                <div class="fs-3 fw-bold text-gray-900 mb-3">
                    <a href="{{ route('teams.profile', ['id' => $team['id']]) }}">
                        {{ $team['title'] }}
                    </a>
                </div>
                <ul class="list-unstyled mb-5 text-light-700 fw-semibold">
                    <li><i class="bi bi-geo-alt me-2 text-light-500"></i>: {{ $team['city_title'] ?? '-' }}</li>
                    <li><i class="bi bi-award me-2 text-light-500"></i>: {{ $team['sport_type']['title'] ?? '-' }}</li>
                    <li><i class="bi bi-calendar3 me-2 text-light-500"></i> : {{ $team['created_at'] }}</li>
                </ul>

                <!-- <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 40% completed" data-bs-original-title="This project 40% completed">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
            </div>
        </div>
    </div>
    @endforeach
</div>
