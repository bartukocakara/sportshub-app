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
    'matchTeams' => []
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

    $selectedCardScriptId = $id . '_card_selector_script';
@endphp

<div class="modal modal-lg fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content {{ $borderColor }} shadow-lg">
            <div class="modal-header {{ $bgColor }}">
                <h5 class="modal-title" id="{{ $id }}_label">
                    <i class="{{ $icon }} me-2"></i> {{ $title }}
                </h5>
                <button type="button" class="btn-close @if($color !== 'warning') btn-close-white @endif" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
            </div>

            <form id method="POST" action="{{ $route }}">
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
                    @if (!empty($matchTeams))
                    <div class="row">
                        @foreach ($matchTeams as $team)
                        <div class="col-md-6 col-xl-4 my-3 h-125">
                        <label class="w-100 text-center match-team-card">
                                <input type="radio" name="match_team_id" value="{{ $team['id'] }}" class="d-none match-team-radio">
                                <div class="card border shadow-sm match-team-card">
                                    <div class="card-header border-0 pt-9">
                                        <div class="card-title m-0 m-auto">
                                            <div class="symbol-group symbol-hover">
                                                @foreach ($team['matchTeamPlayers'] as $index => $matchTeamPlayer)
                                                    @if ($index < 3)
                                                        @if ($matchTeamPlayer['user']['avatar'])
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="{{ $matchTeamPlayer['user']['first_name'] }}" data-bs-original-title="{{ $matchTeamPlayer['user']['first_name'] }}">
                                                                <img src="{{ asset('storage/' . $matchTeamPlayer['user']['avatar']) }}" alt="Pic" class="symbol symbol-35px symbol-circle" />
                                                            </div>
                                                        @else
                                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ $matchTeamPlayer['user']['first_name'] }}">
                                                                <span class="symbol-label bg-primary text-inverse-primary fw-bold">
                                                                    {{ strtoupper(Str::substr($matchTeamPlayer['user']['first_name'], 0, 1)) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if (count($team['matchTeamPlayers']) > 3)
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="{{ count($team['matchTeamPlayers']) - 3 }} kişi daha">
                                                        <span class="symbol-label bg-light text-gray-600 fw-bold">
                                                            +{{ count($team['matchTeamPlayers']) - 3 }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-9 text-center">
                                        <div class="fs-4 fw-bold text-gray-900">
                                            {{ $team['title'] }}
                                        </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <p class="text-muted text-center">{{ __('messages.no_teams_available_to_join') }}</p> {{-- Add this translation --}}
                    @endif
                    {{-- END NEW: Team Selection Dropdown --}}

                    <div class="form-group">
                        <label for="message_textarea" class="form-label fw-semibold">
                            {{ __('messages.optional_join_message') }}
                        </label>
                        <textarea name="title"
                                  id="message_textarea"
                                  class="form-control"
                                  placeholder="{{ __('messages.write_a_message_to_join') }}"
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