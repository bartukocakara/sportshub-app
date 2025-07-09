@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
{{-- You might need to include Select2 CSS if you use it for dropdowns --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
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
                <form method="POST" action="{{ route('teams.store') }}">
                    @csrf
                    <div class="d-flex flex-column flex-lg-row">
                        {{-- Player List Component (assumed to contain the selection logic) --}}
                        <x-player-list :players="$datas['players']['data']" :meta="$datas['players']['meta']" :key="'team_create_selected_players'" />

                        <div class="flex-lg-auto min-w-lg-300px">
                            <div class="card" style="position: sticky; top: 150px;">
                                <div class="card-body p-10">

                                    {{-- Team Name/Title Field --}}
                                    <div class="mb-10">
                                        <label for="title" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.team_name') }}</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-solid @error('title') is-invalid @enderror" placeholder="{{ __('messages.enter_team_name') }}" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- City Dropdown --}}
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

                                    {{-- Sport Type Dropdown --}}
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

                                    {{-- Gender Selection --}}
                                    <div class="mb-10">
                                        <label class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.gender') }}</label>
                                        <div class="d-flex flex-wrap gap-5"> {{-- Use flex-wrap and gap for better spacing on smaller screens --}}
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
                                            <div class="invalid-feedback d-block">{{ $message }}</div> {{-- d-block to force display for radio/checkbox errors --}}
                                        @enderror
                                    </div>

                                    <div class="row g-10 mb-10"> {{-- Use row and column classes for better layout of min/max players --}}
                                        {{-- Min Player Field --}}
                                        <div class="col-lg-6">
                                            <label for="min_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.min_players') }}</label>
                                            <input type="number" name="min_player" id="min_player" class="form-control form-control-solid @error('min_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_4') }}" value="{{ old('min_player', 4) }}">
                                            @error('min_player')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Max Player Field --}}
                                        <div class="col-lg-6">
                                            <label for="max_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.max_players') }}</label>
                                            <input type="number" name="max_player" id="max_player" class="form-control form-control-solid @error('max_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_20') }}" value="{{ old('max_player', 20) }}">
                                            @error('max_player')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Hidden inputs for selected player IDs (populated by JS) --}}
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
{{-- Include Select2 JS if you use it for enhanced dropdowns --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

<script>
    // Initialize selected users from session data (important for re-populating on validation errors)
    let selectedUsers = @json(session('team_create_selected_players', []));

    document.addEventListener('DOMContentLoaded', () => {
        const previewContainer = document.getElementById('selected-players-preview');
        const hiddenInputsContainer = document.getElementById('selected-player-ids');
        const noSelectedMessage = document.getElementById('no-selected-message'); // Ensure this element is in x-player-list
        const removeAllButton = document.getElementById('remove-all-players'); // Ensure this element is in x-player-list

        // Initialize Select2 dropdowns if present
        // if (typeof jQuery !== 'undefined' && typeof jQuery.fn.select2 !== 'undefined') {
        //     $('#city_id, #sport_type_id').select2();
        // }

        function updateCheckboxListeners() {
            const checkboxes = document.querySelectorAll('.player-checkbox');
            checkboxes.forEach(cb => {
                // Remove existing listener to prevent duplicates, then re-add
                cb.removeEventListener('change', handleCheckboxChange);
                cb.addEventListener('change', handleCheckboxChange);

                // Set initial checked state based on current selectedUsers
                const user = JSON.parse(cb.dataset.user);
                cb.checked = selectedUsers.some(u => u.id === user.id);
            });
        }

        function handleCheckboxChange(e) {
            const user = JSON.parse(e.target.dataset.user);
            const isChecked = e.target.checked;

            if (isChecked) {
                // Add user if not already present
                if (!selectedUsers.some(u => u.id === user.id)) {
                    selectedUsers.push(user);
                }
            } else {
                // Remove user
                selectedUsers = selectedUsers.filter(u => u.id !== user.id);
            }

            renderSelectedPlayers();
            syncSelectedPlayersWithServer();
        }

        function renderSelectedPlayers() {
            // Check if previewContainer exists to prevent errors if x-player-list isn't rendered
            if (!previewContainer) {
                console.warn('`selected-players-preview` container not found. Player preview will not render.');
                return;
            }

            previewContainer.innerHTML = '';
            hiddenInputsContainer.innerHTML = '';

            // Manage "No players selected" message and "Remove All" button visibility
            if (selectedUsers.length === 0) {
                if (noSelectedMessage) {
                    noSelectedMessage.style.display = 'block'; // Show message
                }
                if (removeAllButton) {
                    removeAllButton.style.display = 'none'; // Hide button
                }
            } else {
                if (noSelectedMessage) {
                    noSelectedMessage.style.display = 'none'; // Hide message
                }
                if (removeAllButton) {
                    removeAllButton.style.display = 'inline-block'; // Show button
                }
            }

            // Render first 3 avatars
            selectedUsers.slice(0, 3).forEach(user => {
                const symbol = document.createElement('div');
                symbol.className = 'symbol symbol-35px symbol-circle me-1'; // Added me-1 for spacing
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

            // Render "+X more" if there are more than 3 players
            if (selectedUsers.length > 3) {
                const extra = document.createElement('div');
                extra.className = 'symbol symbol-35px symbol-circle';
                extra.setAttribute('data-bs-toggle', 'tooltip');
                extra.setAttribute('title', `${selectedUsers.length - 3} {{ __('messages.more_people') }}`); // Localize this
                extra.innerHTML = `<span class="symbol-label bg-light text-gray-600 fw-bold">+${selectedUsers.length - 3}</span>`;
                previewContainer.appendChild(extra);
            }

            // Create hidden inputs for all selected player IDs
            selectedUsers.forEach(user => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'user_ids[]'; // This name sends an array of IDs
                input.value = user.id;
                hiddenInputsContainer.appendChild(input);
            });

            // Re-initialize tooltips for newly added elements
            initTooltips();
        }

        function removeAllSelectedPlayers() {
            selectedUsers = []; // Clear the selectedUsers array
            const checkboxes = document.querySelectorAll('.player-checkbox'); // Target specific player checkboxes
            checkboxes.forEach(cb => {
                cb.checked = false; // Uncheck all checkboxes in the visible list
            });
            renderSelectedPlayers(); // Re-render the preview and hidden inputs
            syncSelectedPlayersWithServer(); // Sync the empty list to the server
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
                    key: 'team_create_selected_players' // The key used to store in session
                })
            })
            .then(response => response.json())
            .then(data => console.log('Server response for sync:', data))
            .catch(error => console.error('Error syncing selected players with server:', error));
        }

        function initTooltips() {
            // Destroy existing tooltips to prevent duplicates if re-initializing
            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(tooltipEl => {
                const tooltipInstance = bootstrap.Tooltip.getInstance(tooltipEl);
                if (tooltipInstance) {
                    tooltipInstance.dispose();
                }
            });

            // Create new tooltips
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        }

        // Add event listener to "Remove All" button if it exists
        if (removeAllButton) {
            removeAllButton.addEventListener('click', removeAllSelectedPlayers);
        }

        // Initial setup on page load
        updateCheckboxListeners(); // Attach listeners and set initial state for currently loaded players
        renderSelectedPlayers(); // Initial render of the selected players preview and hidden inputs
        initTooltips(); // Initialize tooltips for statically loaded elements

        // Observe changes in the player list container (for pagination/dynamic loading)
        // Adjust `kt_player_list_body` to the actual ID of the container holding your player list items
        const playerListContainer = document.getElementById('kt_player_list_body');
        if (playerListContainer) {
            const observer = new MutationObserver((mutationsList) => {
                for (const mutation of mutationsList) {
                    if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                        // Re-run checkbox listeners when new players are added
                        updateCheckboxListeners();
                    }
                }
            });
            observer.observe(playerListContainer, { childList: true, subtree: true });
        }
    });
</script>
@endsection
