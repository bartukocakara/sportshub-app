@props([
    'excludedFilters' => ['page', 'per_page'],
    'titleMaps' => [], // Örneğin: ['city_id' => ['1' => 'İstanbul', ...], 'sport_type_id' => [...] ]
])

@php
    $query = request()->query();
@endphp

@if ($query)
    <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
        @foreach (request()->except($excludedFilters) as $key => $value)
            @php
                $values = is_array($value) ? $value : [$value];
            @endphp
            @foreach ($values as $v)
                <form method="GET" action="{{ url()->current() }}" class="d-inline">
                    @foreach (request()->except(array_merge([$key], $excludedFilters)) as $k => $val)
                        @if (is_array($val))
                            @foreach ($val as $multi)
                                @if (!($k === $key && $multi == $v))
                                    <input type="hidden" name="{{ $k }}[]" value="{{ $multi }}">
                                @endif
                            @endforeach
                        @else
                            <input type="hidden" name="{{ $k }}" value="{{ $val }}">
                        @endif
                    @endforeach
                    @php
                        $labelValue = $titleMaps[$key][$v] ?? $v;
                    @endphp
                    <form method="GET" action="{{ url()->current() }}" class="d-inline">
                        <button type="submit" class="btn btn-sm btn-light-primary rounded-pill d-flex align-items-center gap-2">
                            <span>{{ __("messages.$key") }}: {{ $labelValue }}</span>
                            <i class="bi bi-x fs-6"></i>
                        </button>
                    </form>
                </form>
            @endforeach
        @endforeach
    </div>
@endif
