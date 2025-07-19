@props([
    'id',
    'route',
    'title' => __('messages.confirmation'),
    'message' => __('messages.generic_confirmation'),
    'emotionalWarning' => null,
    'buttonText' => __('messages.confirm'),
    'icon' => 'fas fa-check',
    'color' => 'primary',
    'params' => null,
])

@php
    $bgColor = match($color) {
        'danger' => 'bg-danger text-white',
        'warning' => 'bg-warning text-dark',
        'info' => 'bg-info text-white',
        default => 'bg-primary text-white',
    };

    $borderColor = match($color) {
        'danger' => 'border-danger',
        'warning' => 'border-warning',
        'info' => 'border-info',
        default => 'border-primary',
    };

    $btnClass = match($color) {
        'danger' => 'btn-danger',
        'warning' => 'btn-warning',
        'info' => 'btn-info',
        default => 'btn-primary',
    };

    $iconColor = match($color) {
        'danger' => 'text-danger',
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
                    <i class="{{ $icon }} me-2"></i> {{ $title }}
                </h5>
                <button type="button" class="btn-close @if($color !== 'warning') btn-close-white @endif" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
            </div>

            <form method="POST" action="{{ $route }}">
                @csrf
                @if($params && is_array($params))
                    @foreach($params as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endforeach
                @endif

                <div class="modal-body">
                    <p class="fs-5 fw-semibold text-center mb-3">{{ $message }}</p>

                    @if($emotionalWarning)
                        <p class="text-muted text-center fst-italic mb-4">{{ $emotionalWarning }}</p>
                    @endif

                    <div class="text-center mb-4">
                        <i class="fas fa-users fa-3x {{ $iconColor }}"></i>
                    </div>

                    <div class="form-group">
                        <label for="message_textarea" class="form-label fw-semibold">
                            {{ __('messages.optional_join_message') }}
                        </label>
                        <textarea name="title"
                                  id="message_textarea"
                                  class="form-control"
                                  placeholder="{{ __('messages.write_a_message') }}"
                                  rows="3"
                                  maxlength="255"></textarea>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('messages.cancel') }}
                    </button>
                    <button type="submit" class="btn {{ $btnClass }}">
                        <i class="{{ $icon }} me-2"></i> {{ $buttonText }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
