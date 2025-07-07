@php
    // Render a pagination link with full query preservation
    function renderPageLink($page, $currentPage, $perPage) {
        $isActive = ($page == $currentPage);
        $url = request()->fullUrlWithQuery(['page' => $page, 'per_page' => $perPage]);

        return '<li class="paginate_button page-item '.($isActive ? "active" : "").'">
                    <a href="'.$url.'" class="page-link">'.$page.'</a>
                </li>';
    }

    $totalPages = $meta['last_page'] ?? 1;
    $currentPage = $meta['current_page'] ?? 1;
    $perPage = request('per_page', 10);
    $pageLinks = [];

    // First 3 pages
    for ($i = 1; $i <= min(3, $totalPages); $i++) {
        $pageLinks[] = $i;
    }

    // Pages around current
    for ($i = max(4, $currentPage - 2); $i <= min($totalPages - 3, $currentPage + 2); $i++) {
        $pageLinks[] = $i;
    }

    // Last 3 pages
    for ($i = max($totalPages - 2, 4); $i <= $totalPages; $i++) {
        $pageLinks[] = $i;
    }

    $pageLinks = array_unique($pageLinks);
    sort($pageLinks);
@endphp

@if($totalPages > 1)
    <form method="GET" class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4">
        {{-- Preserve existing filters as hidden inputs --}}
        @foreach (request()->except(['page', 'per_page']) as $param => $value)
            @if (is_array($value))
                @foreach ($value as $v)
                    <input type="hidden" name="{{ $param }}[]" value="{{ $v }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $param }}" value="{{ $value }}">
            @endif
        @endforeach

        {{-- Pagination Links --}}
        <ul class="pagination mb-0">
            @php
                $prevPage = 0;
                foreach ($pageLinks as $page):
                    if ($prevPage && $page - $prevPage > 1) {
                        echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                    }
                    echo renderPageLink($page, $currentPage, $perPage);
                    $prevPage = $page;
                endforeach;
            @endphp
        </ul>

        {{-- Total count --}}
        <div class="total-entries">
            <span>Toplam: {{ $meta['total'] }} kayıt</span>
        </div>

        {{-- Per Page Selector --}}
        <div class="d-flex align-items-center">
            <label for="per_page" class="me-2 fw-semibold">Göster:</label>
            <select name="per_page" id="per_page" class="form-select form-select-sm w-auto">
                @foreach ([5, 10, 25] as $option)
                    <option value="{{ $option }}" {{ request('per_page', 10) == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
            <span class="ms-2"> / sayfa</span>
        </div>
    </form>
@endif
