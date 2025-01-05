{{-- Pagination Component --}}
@if (isset($data['meta']['links']) && count($data['meta']['links']) > 1)
    <div class="d-flex justify-content-between align-items-center">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if (isset($data['meta']['prev_page_url']))
                <li class="paginate_button page-item previous">
                    <a href="{{ $data['meta']['prev_page_url'] }}" class="page-link" rel="prev" aria-label="@lang('pagination.previous')">
                        <i class="previous"></i>
                    </a>
                </li>
            @else
                <li class="paginate_button page-item previous disabled" aria-disabled="true">
                    <a href="#" class="page-link" aria-label="@lang('pagination.previous')">
                        <i class="previous"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($data['meta']['links'] as $link)
                @if ($link['label'] == '...')
                    <li class="paginate_button page-item disabled" aria-disabled="true">
                        <span>{{ $link['label'] }}</span>
                    </li>
                @else
                    <li class="paginate_button page-item {{ $link['active'] ? 'active' : '' }}">
                        <a href="{{ $link['url'] }}" class="page-link">{{ $link['label'] }}</a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if (isset($data['meta']['next_page_url']))
                <li class="paginate_button page-item next">
                    <a href="{{ $data['meta']['next_page_url'] }}" class="page-link" rel="next" aria-label="@lang('pagination.next')">
                        <i class="next"></i>
                    </a>
                </li>
            @else
                <li class="paginate_button page-item next disabled" aria-disabled="true">
                    <a href="#" class="page-link" aria-label="@lang('pagination.next')">
                        <i class="next"></i>
                    </a>
                </li>
            @endif
        </ul>

        {{-- Display Total Entries --}}
        <div class="total-entries">
            <span>Total Entries: {{ $data['meta']['total'] }}</span>
        </div>
    </div>
@endif
