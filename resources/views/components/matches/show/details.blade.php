<div class="card mb-5 border shadow-sm px-4 px-lg-10 px-xxl-20">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-4 mb-6">
            <div class="d-flex flex-column gap-3">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                    <h2 class="text-gray-900 text-primary fs-3 fs-md-2 fw-bold mb-0 text-break">
                        {{ $datas['match']->title }}
                    </h2>
                </div>
                <div>
                    <p class="badge {{ $datas['match']->status_badge }} text-900 fs-10 mb-0">
                        {!! $datas['match']->status_badge_with_icon !!}
                    </p>
                </div>
                <div class="d-flex align-items-center text-gray-700">
                    📍
                    <span class="fw-semibold fs-6 ms-2">
                        {{ $datas['match']->city?->title }}
                    </span>
                </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
                @include('components.matches.action-buttons', [
                    'status' => $datas['user_status'],
                    'role' => $datas['user_role'],
                    'match' => $datas['match']->resource ?? null,
                ])
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 my-5">
            @php
                $gender = $datas['match']->gender ?? 'mixed';
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
                    <div class="fs-3 fw-bold">{{ $datas['match']['match_team_players_count'] }}</div>
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
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.min_team') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['match']['min_team'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.max_team') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['match']['max_team'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.min_player') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['match']['min_player'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.max_player') }}</div>
                    <div class="fs-3 fw-bold">{{ $datas['match']['max_player'] }}</div>
                </div>
            </div>
            <div class="col">
                <div class="border border-gray-300 border-dashed rounded py-3 px-4 text-center h-100">
                    <div class="fw-semibold fs-6 text-gray-900 mb-1">{{ __('messages.sport_type') }}</div>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <img src="{{ $datas['match']->sportType->img }}" class="w-20px" alt="">
                        <div class="fs-5 fw-bold">{{ $datas['match']->sportType->title }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
