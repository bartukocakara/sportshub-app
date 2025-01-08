@if (isset($data['meta']['links']) && count($data['meta']['links']) > 1)
    <div class="d-flex justify-content-between align-items-center">
        <ul class="pagination">
            {{-- Pagination Elements --}}
            @foreach ($data['meta']['links'] as $key => $link)
                {{-- Handle "Previous" Link --}}
                @if ($key === 0)
                    <li class="paginate_button page-item {{ $link['url'] ? '' : 'disabled' }}" aria-disabled="{{ $link['url'] ? 'false' : 'true' }}">
                        <a href="{{ $link['url'] ?: '#' }}" class="page-link" aria-label="@lang('pagination.previous')">
                            {!! $link['label'] !!}
                        </a>
                    </li>
                {{-- Handle "Next" Link --}}
                @elseif ($key === count($data['meta']['links']) - 1)
                    <li class="paginate_button page-item {{ $link['url'] ? '' : 'disabled' }}" aria-disabled="{{ $link['url'] ? 'false' : 'true' }}">
                        <a href="{{ $link['url'] ?: '#' }}" class="page-link" aria-label="@lang('pagination.next')">
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
                            <a href="{{ $link['url'] }}" class="page-link">{{ $link['label'] }}</a>
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
