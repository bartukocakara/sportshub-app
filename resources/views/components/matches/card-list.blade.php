@foreach ($datas['matches']['data'] as $key => $match)
    <div class="col-md-6 col-xl-4">
        <div class="card border shadow-sm">
            <div class="card-header border-0 pt-9">
                <div class="card-title m-0">
                    <div class="symbol symbol-50px w-50px bg-light">
                        @if (isset($match['sport_type']) && $match['sport_type']['path'])
                            <img src="{{ $match['sport_type']['img'] }}" alt="{{ $match['sport_type']['title'] }}" class="p-3" />
                        @else
                            <img src="/assets/media/svg/brand-logos/xing-icon.svg" alt="Default Icon" class="p-3" />
                        @endif
                    </div>
                </div>
                <div class="card-toolbar">
                    <span class="badge {{ $match['status_badge'] }} fw-bold me-auto px-4 py-3">
                        {{ $match['status_definition'] }}
                    </span>
                </div>
            </div>

            <div class="card-body p-9">
                <div class="d-flex align-items-center mb-5">
                    @if (!empty($match['court']['first_image']) && file_exists(public_path('storage/' . $match['court']['first_image'])))
                        <img src="{{ url($match['court']['first_image']) }}"
                             alt="Court Image"
                             class="me-3 rounded"
                             style="width: 50px; height: 50px; object-fit: cover;" />
                    @else
                        <img src="/assets/media/svg/brand-logos/xing-icon.svg"
                             alt="No Image"
                             class="me-3 rounded"
                             style="width: 50px; height: 50px;" />
                    @endif
                    <div class="fs-3 fw-bold text-gray-900">
                        <a href="{{ route('matches.profile', ['id' => $match['id']]) }}">
                            {{ $match['title'] }}
                        </a>
                    </div>
                </div>

                <div class="d-flex flex-wrap mb-5">
                    <div class="fs-6 text-gray-800 fw-bold d-flex align-items-center gap-2 me-2">
                        📅
                        @if ($match['expiring_date'])
                            {{ \Carbon\Carbon::parse($match['expiring_date'])->format('M d, Y') }}
                        @elseif ($match['play_date'])
                            {{ \Carbon\Carbon::parse($match['play_date'])->format('M d, Y') }}
                        @else
                            No Due Date
                        @endif
                    </div>
                </div>

                <div class="d-flex flex-wrap mb-5">
                    <div class="fs-6 text-gray-800 fw-bold d-flex align-items-center gap-2 me-2">
                        📍 {{ $match['city_title'] ?? 'N/A' }}
                    </div>
                </div>

                <div class="d-flex flex-wrap mb-5">
                    <div class="fs-6 text-gray-800 fw-bold d-flex align-items-center gap-2 me-2">
                        🏟️ {{ $match['court']['title'] ?? 'N/A' }}
                    </div>
                </div>
                <div class="d-flex flex-wrap mb-5">
                    <div class="fs-6 text-gray-800 fw-bold d-flex align-items-center gap-2">
                        ⏰
                        @if ($match['from_hour'] && $match['to_hour'])
                            {{ \Carbon\Carbon::parse($match['from_hour'])->format('H:i') }} - {{ \Carbon\Carbon::parse($match['to_hour'])->format('H:i') }}
                        @else
                            N/A
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
