@extends('layouts.no-sidebar')
@section('title', __('messages.create_team'))
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
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper" data-kt-stepper="true">
                    <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                        <div class="stepper-nav ps-lg-10">
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px"><i class="ki-duotone ki-check stepper-check fs-2"></i> <span class="stepper-number">1</span></div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            {{ __('messages.sport_type') }}
                                        </h3>

                                        <div class="stepper-desc">
                                            {{ __('messages.select_sport_type') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px"><i class="ki-duotone ki-check stepper-check fs-2"></i> <span class="stepper-number">2</span></div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            {{ __('messages.city') }}
                                        </h3>
                                        <div class="stepper-desc">
                                            {{ __('messages.select_city') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">3</span>
                                    </div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            {{ __('messages.players') }}
                                        </h3>

                                        <div class="stepper-desc">
                                            {{ __('messages.select_players') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px"><i class="ki-duotone ki-check stepper-check fs-2"></i> <span class="stepper-number">4</span></div>

                                    <div class="stepper-label">
                                        <h3 class="stepper-title">
                                            {{ __('messages.details') }}
                                        </h3>
                                        <div class="stepper-desc">
                                            {{ __('messages.fill_team_details') }}
                                        </div>
                                    </div>
                                </div>

                                <div class="stepper-line h-40px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <form class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_modal_create_app_form">
                            <div class="current" data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="fv-row">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                            <span class="required">{{ __('messages.sport_type') }}</span>

                                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="{{ __('messages.select_sport_type') }}" data-bs-original-title="{{ __('messages.select_sport_type') }}" data-kt-initialized="1">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </label>
                                        <div class="fv-row fv-plugins-icon-container">
                                            <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                <span class="d-flex align-items-center me-2">
                                                    <span class="symbol symbol-50px me-6">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="ki-duotone ki-compass fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i>
                                                        </span>
                                                    </span>
                                                    <span class="d-flex flex-column">
                                                        <span class="fw-bold fs-6">Quick Online Courses</span>

                                                        <span class="fs-7 text-muted">Creating a clear text structure is just one SEO</span>
                                                    </span>
                                                </span>
                                                <span class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="radio" name="category" value="1" />
                                                </span>
                                            </label>
                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                            <span class="required">Select Framework</span>

                                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify your apps framework" data-bs-original-title="Specify your apps framework" data-kt-initialized="1">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </label>

                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="fv-row mb-10 fv-plugins-icon-container">
                                        <label class="required fs-5 fw-semibold mb-2">
                                            Database Name
                                        </label>

                                        <input type="text" class="form-control form-control-lg form-control-solid" name="dbname" placeholder="" value="master_db" />
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>

                                    <div class="fv-row fv-plugins-icon-container">
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100">
                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Name On Card</span>

                                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify a card holder's name" data-bs-original-title="Specify a card holder's name" data-kt-initialized="1">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </label>

                                        <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>

                                    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>

                                        <div class="position-relative">
                                            <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />

                                            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                <img src="/saul-html-pro/assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                            </div>
                                        </div>
                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div data-kt-stepper-element="content">
                                <div class="w-100 text-center">
                                    <h1 class="fw-bold text-gray-900 mb-3">Release!</h1>

                                    <div class="text-muted fw-semibold fs-3">
                                        Submit your app to kickstart your project.
                                    </div>

                                    <div class="text-center px-4 py-15">
                                        <img src="/saul-html-pro/assets/media/illustrations/sketchy-1/9.png" alt="" class="mw-100 mh-300px" />
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-stack pt-10">
                                <div class="me-2">
                                    <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                        <i class="ki-duotone ki-arrow-left fs-3 me-1"><span class="path1"></span><span class="path2"></span></i> Back
                                    </button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                        <span class="indicator-label">
                                            Submit
                                            <i class="ki-duotone ki-arrow-right fs-3 ms-2 me-0"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                        <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                                    </button>

                                    <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">
                                        Continue
                                        <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0"><span class="path1"></span><span class="path2"></span></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
