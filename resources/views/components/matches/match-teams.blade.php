<div class="row g-6 g-xl-9 mt-1">
    @foreach ($datas['match_teams']['data'] as $key => $team)
        <div class="col-md-6 col-xl-4">
            <div class="card border-hover-primary h-100">
                <div class="card-header border-0 pt-9">
                    <div class="card-title m-0">
                        <div class="symbol-group symbol-hover">
                            @foreach ($team['match_team_players'] as $index => $user)
                                @if ($index < 3)
                                    @if (!empty($user['avatar']))
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $user['first_name'] }}">
                                            <img alt="{{ $user['first_name'] }}" src="/storage/avatar/{{ $user['avatar'] }}" />
                                        </div>
                                    @else
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $user['first_name'] }}">
                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                {{ strtoupper(Str::substr($user['first_name'], 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif
                                @endif
                            @endforeach

                            @if (count($team['match_team_players']) > 3)
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ count($team['match_team_players']) - 3 }} kişi daha">
                                    <span class="symbol-label bg-light text-gray-600 fw-bold">
                                        +{{ count($team['match_team_players']) - 3 }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body p-9">
                    <h5 class="fw-bold mb-4">{{ $team['title'] ?? 'Takım Başlığı' }}</h5>

                    <ul class="list-unstyled mb-5 text-light-700 fw-semibold">
                        <li><i class="bi bi-geo-alt me-2 text-light-500"></i> {{ $team['city_title'] ?? '-' }}</li>
                        <li><i class="bi bi-award me-2 text-light-500"></i> {{ $team['sport_type']['title'] ?? '-' }}</li>
                        <li><i class="bi bi-calendar3 me-2 text-light-500"></i> {{ \Carbon\Carbon::parse($team['created_at'])->translatedFormat('d F Y') }}</li>
                    </ul>

                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($team['match_team_players'] as $player)
                            <span class="badge {{ $player['status_badge'] }} px-4 py-2" title="{{ $player['status_badge'] }}">
                                {{ $player['first_name'] ?? '-' }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
