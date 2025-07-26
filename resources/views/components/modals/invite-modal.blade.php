@props([
    'id',
    'route',
    'title' => __('messages.you_are_awesome'),
    'message' => __('messages.ready_to_invite_player'),
    'emotionalWarning' => __('messages.this_will_make_the_team_even_better'),
    'buttonText' => __('messages.send_invitation'),
    'icon' => 'fas fa-handshake',
    'color' => 'success',
    'emoji' => '🚀',
])

@php
    $bgColor = match($color) {
        'warning' => 'bg-warning text-dark',
        'info' => 'bg-info text-white',
        'secondary' => 'bg-secondary text-white',
        'success' => 'bg-success text-white',
        default => 'bg-primary text-white',
    };

    $borderColor = match($color) {
        'warning' => 'border-warning',
        'info' => 'border-info',
        'success' => 'border-success',
        default => 'border-primary',
    };

    $btnClass = match($color) {
        'warning' => 'btn-warning',
        'info' => 'btn-info',
        'success' => 'btn-success',
        default => 'btn-primary',
    };

    $iconColor = match($color) {
        'warning' => 'text-warning',
        'info' => 'text-info',
        'success' => 'text-success',
        default => 'text-primary',
    };
@endphp

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content {{ $borderColor }} shadow-lg rounded-4">

            <div class="modal-header {{ $bgColor }}">
                <h5 class="modal-title fw-bold" id="{{ $id }}_label">
                    <i class="fas fa-star me-2 {{ $iconColor }}"></i> {{ $title }}
                </h5>
                <button type="button" class="btn-close @if($color !== 'warning') btn-close-white @endif" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
            </div>

            <div class="modal-body text-center py-4">
                <p class="fs-5 fw-semibold mb-2">{{ $message }}</p>
                @if($emotionalWarning)
                    <p class="text-muted fst-italic mb-3">
                        {{ $emotionalWarning }}
                    </p>
                @endif
                @if($emoji)
                    <div class="fs-1 mb-2" role="img" aria-label="Emoji">{{ $emoji }}</div>
                @endif
                <form method="POST" action="{{ $route }}" class="d-inline">
                    @csrf
                    <div class="mb-3 text-start px-4">
                        <label for="title" class="form-label fw-semibold">
                            {{ __('messages.title') }}
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            id="title"
                            name="title"
                            max="255"
                            placeholder="{{ __('messages.enter_title') }}"
                        >
                    </div>
                    <button type="submit" class="btn {{ $btnClass }} btn-lg shadow">
                        <i class="{{ $icon }} me-2"></i> {{ $buttonText }}
                    </button>
                </form>
            </div>

            <div class="modal-footer justify-content-center pb-4">
                <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-dismiss="modal">
                    {{ __('messages.not_now') }}
                </button>
            </div>
        </div>
    </div>
</div>
