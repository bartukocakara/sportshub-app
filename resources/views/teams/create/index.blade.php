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
                <form method="POST" action="{{ route('teams.store') }}">
                    @csrf
                    <div class="d-flex flex-column flex-lg-row">
                        <x-player-list :players="$datas['players']['data']" :meta="$datas['players']" :key="'team_create_selected_players'" />
                        <div class="flex-lg-auto min-w-lg-300px">
                            <div class="card" style="position: sticky; top: 150px;">
                                <div class="card-body p-10">
                                    <div class="mb-10">
                                        <label class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.city') }}</label>
                                        <select name="city_id" class="form-select form-select-solid w-100">
                                            <option value="">{{ __('messages.city') }}</option>
                                            @foreach ($datas['cities'] as $city)
                                                <option value="{{ $city->id }}">{{ $city->title }}</option>
                                            @endforeach
                                        </select>
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
<script>
    let selectedUsers = @json($datas['team_create_selected_players'] ?? []);
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
            });
        }

        function handleCheckboxChange(e) {
            const user = JSON.parse(e.target.dataset.user);
            const exists = selectedUsers.find(u => u.id === user.id);

            if (e.target.checked && !exists) {
                selectedUsers.push(user);
            } else if (!e.target.checked && exists) {
                selectedUsers = selectedUsers.filter(u => u.id !== user.id);
            }

            renderSelectedPlayers();
            syncWithServer();
        }

        function renderSelectedPlayers() {
            previewContainer.innerHTML = '';
            hiddenInputsContainer.innerHTML = '';

            if (selectedUsers.length === 0 && noSelectedMessage) {
                previewContainer.appendChild(noSelectedMessage);
                removeAllButton.style.display = 'none'; // Hide button when no players are selected
            } else {
                removeAllButton.style.display = 'inline-block'; // Show button when players are selected
            }
            selectedUsers.slice(0, 3).forEach(user => {
                const symbol = document.createElement('div');
                symbol.className = 'symbol symbol-35px symbol-circle';
                symbol.setAttribute('data-bs-toggle', 'tooltip');
                symbol.setAttribute('title', user.first_name);

                if (user.avatar) {
                    symbol.innerHTML = `<img alt="Pic" src="/storage/avatar/${user.avatar}" />`;
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
                extra.setAttribute('title', `${selectedUsers.length - 3} kişi daha`);
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
        }

        function removeAllSelectedPlayers() {
            selectedUsers = []; // Clear the selectedUsers array
            const checkboxes = document.querySelectorAll('.player-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = false; // Uncheck all checkboxes
            });
            renderSelectedPlayers();
            syncWithServer();
        }

        function syncWithServer() {
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
                                        key : 'team_create_selected_players'
                                    })
            })
            .then(response => response.json())
            .then(data => console.log('Server response:', data))
            .catch(error => console.error('Error syncing with server:', error));
        }

        removeAllButton.addEventListener('click', removeAllSelectedPlayers);

        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.forEach(tooltipTriggerEl => {
            new bootstrap.Tooltip(tooltipTriggerEl);
        });

        updateCheckboxListeners();
        renderSelectedPlayers();
    });
</script>
@endsection
