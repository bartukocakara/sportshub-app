@props([
    'items' => [],
    'columns' => [],
    'actions' => [],
    'imageKey' => null,
])

<div class="table-responsive">
    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable w-100">
        <thead>
            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                @foreach($columns as $key => $label)
                    <th class="{{ $loop->first ? 'min-w-150px' : 'text-end min-w-100px' }}">
                        <span class="dt-column-title" role="button">{{ __($label) }}</span>
                        <span class="dt-column-order"></span>
                    </th>
                @endforeach
                @if(count($actions))
                    <th class="text-end min-w-100px">{{ __('messages.actions') }}</th>
                @endif
            </tr>
        </thead>
        <tbody class="fw-semibold text-gray-600">
            @forelse ($items['data'] as $item)
                <tr>
                    @foreach(array_keys($columns) as $key)
                        <td class="{{ $loop->first ? '' : 'text-end pe-0' }}">
                            @if ($loop->first && $imageKey)
                                @php
                                    $images = data_get($item, 'images', []);
                                    $imageUrls = collect($images)->pluck('file_path')->map(fn($p) => asset($p))->toArray();
                                    $hasImages = count($imageUrls) > 0;
                                @endphp
                                <div class="d-flex align-items-center">
                                    <a
                                        href="#"
                                        class="symbol symbol-50px {{ $hasImages ? 'court-image-modal-trigger' : '' }}"
                                        @if($hasImages)
                                            data-bs-toggle="modal"
                                            data-bs-target="#imageModal"
                                            data-images="{{ json_encode($imageUrls) }}"
                                        @endif
                                    >
                                        <span class="symbol-label" style="background-image: url('{{ $imageUrls[0] ?? asset('courts/placeholder-court.webp') }}');"></span>
                                    </a>
                                    <div class="ms-5">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold">
                                            {{ data_get($item, $key) }}
                                        </a>
                                    </div>
                                </div>
                            @else
                                {{ data_get($item, $key) }}
                            @endif
                        </td>
                    @endforeach

                    @if(count($actions))
                        <td class="text-end">
                            <div class="dropdown">
                                <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    {{ __('messages.actions') }}
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                </a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                    @foreach($actions as $action)
                                        <div class="menu-item px-3">
                                            @if(($action['method'] ?? 'GET') === 'DELETE')
                                                <button
                                                    type="button"
                                                    class="menu-link px-3 btn w-100 text-start text-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteConfirmModal"
                                                    data-delete-url="{{ $action['url']($item) }}"
                                                >
                                                    {{ __($action['label']) }}
                                                </button>
                                            @else
                                                <a href="{{ $action['url']($item) }}" class="menu-link px-3">
                                                    {{ __($action['label']) }}
                                                </a>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                    @endif
                </tr>
            @empty
                <tr><td colspan="{{ count($columns) + (count($actions) ? 1 : 0) }}">{{ __('messages.no_data') }}</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@if (isset($items['links']) && isset($items['meta']))
    <div class="mt-4">
        @include('components.pagination.default', ['data' => $items])
    </div>
@endif
