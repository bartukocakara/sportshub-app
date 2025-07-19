@props([
    'id',
    'route',
    'title' => __('messages.delete_confirmation'),
    'message' => __('messages.generic_delete_warning'),
    'emotionalWarning' => null,
    'buttonText' => __('messages.delete'),
    'icon' => 'fas fa-trash',
    'color' => 'danger', // 'danger' (default), 'warning', 'info' vs.
])

@php
    $bgColor = match($color) {
        'warning' => 'bg-warning text-dark',
        'info' => 'bg-info text-white',
        default => 'bg-danger text-white',
    };

    $borderColor = match($color) {
        'warning' => 'border-warning',
        'info' => 'border-info',
        default => 'border-danger',
    };

    $btnClass = match($color) {
        'warning' => 'btn-warning',
        'info' => 'btn-info',
        default => 'btn-danger',
    };

    $iconColor = match($color) {
        'warning' => 'text-warning',
        'info' => 'text-info',
        default => 'text-danger',
    };
@endphp

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content {{ $borderColor }} shadow-lg">

            <div class="modal-header {{ $bgColor }}">
                <h5 class="modal-title" id="{{ $id }}_label">
                    <i class="fas fa-exclamation-triangle me-2"></i> {{ $title }}
                </h5>
                <button type="button" class="btn-close @if($color !== 'warning') btn-close-white @endif" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
            </div>

            <div class="modal-body text-center">
                <p class="fs-5 fw-semibold mb-3">{{ $message }}</p>
                @if($emotionalWarning)
                    <p class="text-muted fst-italic mb-4">
                        {{ $emotionalWarning }}
                    </p>
                @endif
                <div class="fs-1" role="img" aria-label="Sad Emoji">😢</div>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">
                    {{ __('messages.cancel') }}
                </button>

                <form method="POST" action="{{ $route }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn {{ $btnClass }} btn-lg">
                        <i class="{{ $icon }} me-2"></i> {{ $buttonText }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
