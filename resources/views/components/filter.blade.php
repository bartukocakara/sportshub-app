@props(['clearRoute'])

<div class="d-flex flex-wrap flex-stack mb-6">
    <div class="d-flex flex-wrap my-2">
        <div class="me-4">
            <a href="#" class="btn btn-sm btn-light-primary px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_filter_modal">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 5h18v2H3V5zm4 6h10v2H7v-2zm-2 6h14v2H5v-2z"/>
                </svg>
                {{ __('messages.filter') }}
            </a>
            @if (request()->query())
                <a href="{{ $clearRoute }}" class="btn btn-sm btn-light-danger px-4 py-3">
                    <i class="bi bi-x-circle me-2"></i>
                    {{ __('messages.clear_filter') }}
                </a>
            @endif
        </div>
    </div>
</div>
