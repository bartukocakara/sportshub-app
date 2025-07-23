@php
    $totalPages = $data['meta']['last_page'] ?? 20; // toplam sayfa
    $currentPage = $data['meta']['current_page'] ?? 1;
    $pageLinks = [];

    // Başlangıç sayfaları
    for ($i = 1; $i <= min(3, $totalPages); $i++) {
        $pageLinks[] = $i;
    }

    // Aktif sayfa çevresi
    for ($i = max(4, $currentPage - 2); $i <= min($totalPages - 3, $currentPage + 2); $i++) {
        $pageLinks[] = $i;
    }

    // Son sayfalar
    for ($i = max($totalPages - 2, 4); $i <= $totalPages; $i++) {
        $pageLinks[] = $i;
    }

    // Unique ve sort
    $pageLinks = array_unique($pageLinks);
    sort($pageLinks);

    // Function to generate the URL for a page link
    function generatePageUrl($page, $currentRequest) {
        $queryParams = $currentRequest->except(['page', 'per_page', '_token']); // Exclude _token as it's not for GET
        $queryParams['page'] = $page;
        $queryParams['per_page'] = $currentRequest->get('per_page', 10); // Keep current per_page
        return url()->current() . '?' . http_build_query($queryParams);
    }

    // Function to generate the URL for per_page selection
    function generatePerPageUrl($perPage, $currentRequest) {
        $queryParams = $currentRequest->except(['page', 'per_page', '_token']);
        $queryParams['page'] = $currentRequest->get('page', 1); // Stay on current page
        $queryParams['per_page'] = $perPage;
        return url()->current() . '?' . http_build_query($queryParams);
    }
@endphp

@if (isset($data['meta']['links']) && count($data['meta']['links']) > 1)
    {{-- Removed form tag here --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4 mb-2">
        <ul class="pagination mb-0">
            @php
            $prevPage = 0;
            foreach ($pageLinks as $page):
                if ($prevPage && $page - $prevPage > 1) {
                    echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                }
                $isActive = ($page == $currentPage);
                echo '<li class="paginate_button page-item '.($isActive ? "active" : "").'">
                        <a href="'.generatePageUrl($page, request()).'" class="page-link">'.$page.'</a>
                      </li>'; // Changed to <a> tag
                $prevPage = $page;
            endforeach;
            @endphp
        </ul>
        <div class="total-entries">
            <span>Toplam: {{ $data['meta']['total'] }} kayıt</span>
        </div>

        <div class="d-flex align-items-center">
            <label for="per_page" class="me-2 fw-semibold">Göster:</label>
            <select name="per_page" id="per_page" class="form-select form-select-sm w-auto" onchange="window.location.href = '{{ generatePerPageUrl(':per_page', request()) }}'.replace(':per_page', this.value)">
                @foreach ([5, 10, 25] as $option)
                    <option value="{{ $option }}" {{ request('per_page', 10) == $option ? 'selected' : '' }}>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
            <span class="ms-2"> / sayfa</span>
        </div>
    </div>
    {{-- Removed form tag here --}}
@endif
