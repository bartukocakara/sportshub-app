@if (isset($data['meta']['links']) && count($data['meta']['links']) > 1)
    <div class="d-flex justify-content-between align-items-center">
        <ul class="pagination">
            {{-- Pagination Elements --}}
            @foreach ($data['meta']['links'] as $key => $link)
                @php
                    // Preserve existing query parameters
                    $url = $link['url'];
                    if ($url) {
                        $parsed = parse_url($url);
                        $path = $parsed['path'] ?? '';
                        $linkQuery = [];

                        // Parse the link's query parameters
                        if (isset($parsed['query'])) {
                            parse_str($parsed['query'], $linkQuery);
                        }

                        // Get current query parameters except page
                        $currentQuery = request()->except('page');

                        // Merge current query with the link's page parameter
                        $mergedQuery = array_merge($currentQuery, $linkQuery);

                        // Build the final URL
                        $url = $path . '?' . http_build_query($mergedQuery);
                    }
                @endphp

                {{-- Handle "Previous" Link --}}
                @if ($key === 0)
                    <li class="paginate_button page-item {{ $link['url'] ? '' : 'disabled' }}" aria-disabled="{{ $link['url'] ? 'false' : 'true' }}">
                        <a href="{{ $url ?: '#' }}" class="page-link" aria-label="@lang('pagination.previous')">
                            {!! $link['label'] !!}
                        </a>
                    </li>
                {{-- Handle "Next" Link --}}
                @elseif ($key === count($data['meta']['links']) - 1)
                    <li class="paginate_button page-item {{ $link['url'] ? '' : 'disabled' }}" aria-disabled="{{ $link['url'] ? 'false' : 'true' }}">
                        <a href="{{ $url ?: '#' }}" class="page-link" aria-label="@lang('pagination.next')">
                            {!! $link['label'] !!}
                        </a>
                    </li>
                {{-- Handle Numbered Links --}}
                @else
                    @if ($link['label'] == '...')
                        <li class="paginate_button page-item disabled" aria-disabled="true">
                            <span>{{ $link['label'] }}</span>
                        </li>
                    @else
                        <li class="paginate_button page-item {{ $link['active'] ? 'active' : '' }}">
                            <a href="{{ $url }}" class="page-link">{{ $link['label'] }}</a>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>

        {{-- Display Total Entries --}}
        <div class="total-entries">
            <span>Total Entries: {{ $data['meta']['total'] }}</span>
        </div>
    </div>
@endif
