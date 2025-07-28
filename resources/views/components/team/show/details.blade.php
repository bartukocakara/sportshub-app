<div class="card mb-5 border shadow-sm px-4 px-lg-10 px-xxl-20">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-4 mb-6">
            <div class="d-flex flex-column gap-3">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                    <h2 class="text-gray-900 text-primary fs-3 fs-md-2 fw-bold mb-0 text-break">
                        {{ $datas['team']->title }}
                    </h2>
                    <div class="mt-2 mt-md-0 ms-md-4">
                        <x-follow-buttons
                            :follow-id="$datas['follow_id']"
                            :followable-id="$datas['team']->id"
                            followable-type="App\Models\Team"
                        />
                    </div>
                </div>
                <div>
                    <p class="badge {{ $datas['team']->status_badge }} text-900 fs-10 mb-0">
                        {!! $datas['team']->status_badge_with_icon !!}
                    </p>
                    <h6 class="my-3 fw-semibold fs-6 text-gray-700">
                        {{ __('messages.team_leaders') }}
                    </h6>
                    <div class="symbol-group symbol-hover">
                        @foreach ($datas['team_leaders'] as $index => $teamLeader)
                            @if ($index < 3)
                                @if ($teamLeader->user->avatar)
                                    <a href="{{ route('users.profile', ['id' => $teamLeader->user->id]) }}" class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $teamLeader->user->full_name }}" data-bs-original-title="{{ $teamLeader->user->full_name }}">
                                        <img alt="Pic" src="{{ asset('storage/' . $teamLeader->user->avatar) }}" class="symbol symbol-35px symbol-circle" />
                                    </a>
                                @else
                                    <a href="{{ route('users.profile', ['id' => $teamLeader->user->id]) }}" class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ $teamLeader->user->full_name }}">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                            {{ strtoupper(Str::substr($teamLeader->user->full_name, 0, 1)) }}
                                        </span>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex align-items-center text-gray-700">
                    📍
                    <span class="fw-semibold fs-6 ms-2">
                        {{ $datas['team']->city->title }}
                    </span>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                @include('components.team.action-buttons', [
                    'status' => $datas['user_status'],
                    'role' => $datas['user_role'],
                    'team' => $datas['team']->resource ?? null,
                ])
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 my-5">
            @php
                $gender = $datas['team']->gender ?? 'mixed';
                $genderEmoji = match($gender) {
                    'male' => '👨🏻',
                    'female' => '👩🏻',
                    default => '🧑🏻‍🤝‍🧑🏻',
                };
                $genderText = match($gender) {
                    'male' => __('messages.male'),
                    'female' => __('messages.female'),
                    'mixed' => __('messages.mixed'),
                    'other' => __('messages.other'),
                    default => __('messages.unknown'),
                };
            @endphp
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.current_players') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['team']['users_count'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.gender') }}</div>
                    <div class="fs-3">{{ $genderEmoji }} {{ $genderText }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.min_player') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['team']['min_player'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.max_player') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['team']['max_player'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.sport_type') }}</div>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <img src="{{ $datas['team']->sportType->img }}" class="w-20px" alt="">
                        <div class="fs-5 fw-bold">{{ $datas['team']->sportType->title }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
