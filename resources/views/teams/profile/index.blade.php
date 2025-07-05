@extends('layouts.app') @section('title', __('messages.teams')) @section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/index.html" class="text-gray-500 text-hover-primary">
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
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.team_details') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.team_details') }}</h1>
                    </div>
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> Create Project </a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        @include('components.team.profile.details')
                    </div>
                    <div class="flex-lg-row-fluid ms-lg-15">
                       @include('components.team.profile.tabs')
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="kt_player_list_tab" role="tabpanel">
                                <x-player-list :players="$data['players']['data']" :meta="$data['players']['meta']" :key="'team_profile_selected_players'" />
                            </div>
                            <div class="tab-pane fade" id="kt_activities_tab" role="tabpanel">
                                @include('components.team.profile.activities')
                            </div>
                            <div class="tab-pane fade" id="kt_announcements_tab" role="tabpanel">
                                @include('components.team.profile.announcements')
                            </div>
                            <div class="tab-pane fade" id="kt_messages_tab" role="tabpanel">
                                <x-chatbox/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script>
    let selectedUsers = @json($datas['profile_selected_players'] ?? []);

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
                                        selected    : selectedData,
                                        key         : 'team_profile_selected_players'
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

