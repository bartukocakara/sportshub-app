@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="app-main flex-column flex-row-fluid">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.teams') }}</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.create_team') }}</li>
                        </ul>
                        <h1 class="page-heading text-gray-900 fw-bolder fs-1">{{ __('messages.create_team') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="POST" action="{{ route('teams.store') }}">
                    @csrf
                    <div class="d-flex flex-column flex-lg-row">
                        <x-player-list :players="$datas['players']['data']" :meta="$datas['players']['meta']" :key="'team_create_selected_players'" />
                        <div class="flex-lg-auto min-w-lg-300px">
                            <div class="card" style="position: sticky; top: 150px;">
                                <div class="card-body p-10">
                                    <div class="mb-10">
                                        <label for="title" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.team_name') }}</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder="{{ __('messages.enter_team_name') }}" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-10">
                                        <label for="city_id" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.city') }}</label>
                                        <select name="city_id" id="city_id" class="form-select form-select-solid @error('city_id') is-invalid @enderror" data-control="select2" data-placeholder="{{ __('messages.select_city') }}">
                                            <option value="">{{ __('messages.select_city') }}</option>
                                            @foreach ($datas['cities'] as $city)
                                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-10">
                                        <label for="sport_type_id" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.sport_type') }}</label>
                                        <select name="sport_type_id" id="sport_type_id" class="form-select form-select-solid @error('sport_type_id') is-invalid @enderror" data-control="select2" data-placeholder="{{ __('messages.select_sport_type') }}">
                                            <option value="">{{ __('messages.select_sport_type') }}</option>
                                            @foreach ($datas['sport_types'] as $sportType)
                                                <option value="{{ $sportType->id }}" {{ old('sport_type_id') == $sportType->id ? 'selected' : '' }}>{{ $sportType->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('sport_type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.gender') }}</label>
                                        <div class="d-flex flex-wrap gap-5">
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="male" id="gender_male" {{ old('gender') == 'male' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="gender_male">
                                                    {{ __('messages.male') }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="female" id="gender_female" {{ old('gender') == 'female' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="gender_female">
                                                    {{ __('messages.female') }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="mixed" id="gender_mixed" {{ old('gender') == 'mixed' ? 'checked' : '' }}/>
                                                <label class="form-check-label" for="gender_mixed">
                                                    {{ __('messages.mixed') }}
                                                </label>
                                            </div>
                                        </div>
                                        @error('gender')
                                            <div class="invalid-feedback d-block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row g-10 mb-10">
                                        <div class="col-lg-6">
                                            <label for="min_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.min_players') }}</label>
                                            <input type="number" name="min_player" id="min_player" class="form-control form-control-solid @error('min_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_4') }}" value="{{ old('min_player', 4) }}">
                                            @error('min_player')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="max_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.max_players') }}</label>
                                            <input type="number" name="max_player" id="max_player" class="form-control form-control-solid @error('max_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_20') }}" value="{{ old('max_player', 20) }}">
                                            @error('max_player')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="selected-player-ids"></div>
                                    <div class="separator separator-dashed mb-8"></div>
                                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.create') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@include('components.scripts.pagination-scripts')
<script>
    let selectedUsers = @json(session('team_create_selected_players', []));

    document.addEventListener('DOMContentLoaded', () => {
        const previewContainer = document.getElementById('selected-players-preview');
        const hiddenInputsContainer = document.getElementById('selected-player-ids');
        const noSelectedMessage = document.getElementById('no-selected-message');
        const removeAllButton = document.getElementById('remove-all-players');

        function updateCheckboxListeners() {
            const checkboxes = document.querySelectorAll('.player-checkbox');
            checkboxes.forEach(cb => {
                cb.removeEventListener('change', handleCheckboxChange);
                cb.addEventListener('change', handleCheckboxChange);

                const user = JSON.parse(cb.dataset.user);
                cb.checked = selectedUsers.some(u => u.id === user.id);
            });
        }

        function handleCheckboxChange(e) {
            const user = JSON.parse(e.target.dataset.user);
            const isChecked = e.target.checked;

            if (isChecked) {
                if (!selectedUsers.some(u => u.id === user.id)) {
                    selectedUsers.push(user);
                }
            } else {
                selectedUsers = selectedUsers.filter(u => u.id !== user.id);
            }

            renderSelectedPlayers();
            syncSelectedPlayersWithServer();
        }

        function renderSelectedPlayers() {
            if (!previewContainer) {
                console.warn('`selected-players-preview` container not found. Player preview will not render.');
                return;
            }

            previewContainer.innerHTML = '';
            hiddenInputsContainer.innerHTML = '';

            if (selectedUsers.length === 0) {
                if (noSelectedMessage) {
                    noSelectedMessage.style.display = 'block';
                }
                if (removeAllButton) {
                    removeAllButton.style.display = 'none';
                }
            } else {
                if (noSelectedMessage) {
                    noSelectedMessage.style.display = 'none';
                }
                if (removeAllButton) {
                    removeAllButton.style.display = 'inline-block';
                }
            }

            selectedUsers.slice(0, 3).forEach(user => {
                const symbol = document.createElement('div');
                symbol.className = 'symbol symbol-35px symbol-circle me-1';
                symbol.setAttribute('data-bs-toggle', 'tooltip');
                symbol.setAttribute('title', user.first_name);

                if (user.avatar) {
                    symbol.innerHTML = `<img alt="${user.first_name}" src="/storage/avatar/${user.avatar}" />`;
                } else {
                    const letter = user.first_name.charAt(0).toUpperCase();
                    symbol.innerHTML = `<span class="symbol-label bg-primary text-inverse-primary fw-bold">${letter}</span>`;
                }
                previewContainer.appendChild(symbol);
            });

            if (selectedUsers.length > 3) {
                const extra = document.createElement('div');
                extra.className = 'symbol symbol-35px symbol-circle';
                extra.setAttribute('data-bs-toggle', 'tooltip');
                extra.setAttribute('title', `${selectedUsers.length - 3} {{ __('messages.more_people') }}`); // Localize this
                extra.innerHTML = `<span class="symbol-label bg-light text-gray-600 fw-bold">+${selectedUsers.length - 3}</span>`;
                previewContainer.appendChild(extra);
            }

            selectedUsers.forEach(user => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'user_ids[]';
                input.value = user.id;
                hiddenInputsContainer.appendChild(input);
            });

            initTooltips();
        }

        function removeAllSelectedPlayers() {
            selectedUsers = [];
            const checkboxes = document.querySelectorAll('.player-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = false;
            });
            renderSelectedPlayers();
            syncSelectedPlayersWithServer();
        }

        function syncSelectedPlayersWithServer() {
            const selectedData = selectedUsers.map(user => ({
                id: user.id,
                first_name: user.first_name,
                last_name: user.last_name,
                avatar: user.avatar,
            }));
            fetch("{{ route('teams.selected-players') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    selected: selectedData,
                    key: 'team_create_selected_players'
                })
            })
            .then(response => response.json())
            .then(data => console.log('Server response for sync:', data))
            .catch(error => console.error('Error syncing selected players with server:', error));
        }

        function initTooltips() {
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(tooltipEl => {
                const tooltipInstance = bootstrap.Tooltip.getInstance(tooltipEl);
                if (tooltipInstance) {
                    tooltipInstance.dispose();
                }
            });

            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        }

        if (removeAllButton) {
            removeAllButton.addEventListener('click', removeAllSelectedPlayers);
        }

        updateCheckboxListeners();
        renderSelectedPlayers();
        initTooltips();

        const playerListContainer = document.getElementById('kt_player_list_body');
        if (playerListContainer) {
            const observer = new MutationObserver((mutationsList) => {
                for (const mutation of mutationsList) {
                    if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                        updateCheckboxListeners();
                    }
                }
            });
            observer.observe(playerListContainer, { childList: true, subtree: true });
        }
    });
</script>
@endsection
