@foreach ($datas['matches']['data'] as $key => $match)
<div class="col-md-6 col-xl-4">
        <a href="{{ route('matches.activities', ['id' => $match['id']]) }}" class="card border-hover-primary">
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
                <span class="badge {{ $match['status_badge'] }} fw-bold me-auto px-4 py-3">{{ $match['status_definition'] }}</span>
            </div>
        </div>
        <div class="card-body p-9">
            {{-- Title and small court image --}}
            <div class="d-flex align-items-center mb-5">
                @if (!empty($match['court']['first_image']) && file_exists(public_path('storage/' . $match['court']['first_image'])))
                    <img src="{{ url( $match['court']['first_image']) }}"
                        alt="Court Image"
                        class="me-3 rounded"style="width: 50px; height: 50px; object-fit: cover;" />
                    @else
                        <img src="/assets/media/svg/brand-logos/xing-icon.svg"
                            alt="No Image"
                            class="me-3 rounded"
                            style="width: 50px; height: 50px;" />
                    @endif
                <div class="fs-3 fw-bold text-gray-900">{{ $match['title'] }}</div>
            </div>

            <div class="d-flex flex-wrap mb-5">
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">
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
                        {{ $match['city_title'] ?? 'N/A' }}
                    </div>
                    <div class="fw-semibold text-gray-500">City</div>
                </div>
                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                    <div class="fs-6 text-gray-800 fw-bold">
                        {{ $match['court']['title'] ?? 'N/A' }}
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

            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="Project completion" data-bs-original-title="Project completion" data-kt-initialized="1">
                <div class="bg-primary rounded h-4px" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="symbol-group symbol-hover">
                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="No users assigned" data-bs-original-title="No users assigned" data-kt-initialized="1">
                    <span class="symbol-label bg-secondary text-inverse-secondary fw-bold">?</span>
                </div>
            </div>
        </div>
    </a>
</div>
@endforeach
