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

    // Fonksiyon ellipsis kontrolü için
    function renderPageLink($page, $currentPage) {
        $isActive = ($page == $currentPage);
        return '<li class="paginate_button page-item '.($isActive ? "active" : "").'">
                    <button type="submit" name="page" value="'.$page.'" class="page-link">'.$page.'</button>
                </li>';
    }
@endphp
@if (isset($data['meta']['links']) && count($data['meta']['links']) > 1)
    <form method="GET" class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4 mb-2">
        <ul class="pagination mb-0">
            @php
            $prevPage = 0;
            foreach ($pageLinks as $page):
                if ($prevPage && $page - $prevPage > 1) {
                    // arada boşluk varsa ... ekle
                    echo '<li class="paginate_button page-item disabled"><span class="page-link">...</span></li>';
                }
                echo renderPageLink($page, $currentPage);
                $prevPage = $page;
            endforeach;
            @endphp
        </ul>
        <div class="total-entries">
            <span>Toplam: {{ $data['meta']['total'] }} kayıt</span>
        </div>
        @foreach (request()->except(['page', 'per_page', 'subject_id', 'subject_type']) as $param => $value)
            @if (is_array($value))
                @foreach ($value as $v)
                    <input type="hidden" name="{{ $param }}[]" value="{{ $v }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $param }}" value="{{ $value }}">
            @endif
        @endforeach

        <div class="d-flex align-items-center">
            <label for="per_page" class="me-2 fw-semibold">Göster:</label>
            <select name="per_page" id="per_page" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
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
