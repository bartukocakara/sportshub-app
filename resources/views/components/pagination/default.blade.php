@if (isset($data['meta']['links']) && count($data['meta']['links']) > 1)
    <form method="GET" class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">

        {{-- Preserve existing query parameters except pagination --}}
        @foreach (request()->except(['page', 'per_page']) as $param => $value)
            @if (is_array($value))
                @foreach ($value as $v)
                    <input type="hidden" name="{{ $param }}[]" value="{{ $v }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $param }}" value="{{ $value }}">
            @endif
        @endforeach

        {{-- Per Page Selector --}}
        <div class="d-flex align-items-center">
            <label for="per_page" class="me-2 fw-semibold">Göster:</label>
            <select name="per_page" id="per_page" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                @foreach ([5, 10, 25] as $option)
                    <option value="{{ $option }}" {{ request('per_page', 10) == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
            <span class="ms-2">takım / sayfa</span>
        </div>

        {{-- Pagination Buttons --}}
        <ul class="pagination mb-0">
            @foreach ($data['meta']['links'] as $key => $link)
                @php
                    $label = strip_tags($link['label']);
                    $isActive = $link['active'];
                    $isDisabled = is_null($link['url']);
                    $pageNum = null;

                    if (!empty($link['url'])) {
                        $parsed = parse_url($link['url']);
                        if (isset($parsed['query'])) {
                            parse_str($parsed['query'], $query);
                            $pageNum = $query['page'] ?? null;
                        }
                    }
                @endphp

                @if ($pageNum)
                    <li class="paginate_button page-item {{ $isActive ? 'active' : '' }}">
                        <button type="submit" name="page" value="{{ $pageNum }}" class="page-link">
                            {!! $label !!}
                        </button>
                    </li>
                @else
                    <li class="paginate_button page-item {{ $isDisabled ? 'disabled' : '' }}">
                        <span class="page-link">{!! $label !!}</span>
                    </li>
                @endif
            @endforeach
        </ul>

        {{-- Total Entries --}}
        <div class="total-entries">
            <span>Toplam: {{ $data['meta']['total'] }} kayıt</span>
        </div>
    </form>
@endif
