@props([
    'id',
    'route',
    'title' => __('messages.accept_confirmation'),
    'message' => __('messages.generic_accept_warning'),
    'emotionalWarning' => null,
    'buttonText' => __('messages.accept'),
    'icon' => 'fas fa-trash',
    'color' => 'secondary',
    'emoji' => '🎉',
])

@php
    $bgColor = match($color) {
        'warning' => 'bg-warning text-dark',
        'info' => 'bg-info text-white',
        'secondary' => 'bg-secondary text-white',
        default => 'bg-primary text-white',
    };

    $borderColor = match($color) {
        'warning' => 'border-warning',
        'info' => 'border-info',
        default => 'border-primary',
    };

    $btnClass = match($color) {
        'warning' => 'btn-warning',
        'info' => 'btn-info',
        default => 'btn-success',
    };

    $iconColor = match($color) {
        'warning' => 'text-warning',
        'info' => 'text-info',
        default => 'text-primary',
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
                @if($emoji)
                    <div class="fs-1" role="img" aria-label="Emoji">{{ $emoji }}</div>
                @endif
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary btn-lg" data-bs-dismiss="modal">
                    {{ __('messages.cancel') }}
                </button>

                <form method="POST" action="{{ $route }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn {{ $btnClass }} btn-lg">
                        <i class="{{ $icon }} me-2"></i> {{ $buttonText }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
