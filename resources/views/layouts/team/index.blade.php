@include('components.header')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
            <div class="d-flex align-items-center flex-stack flex-grow-1">
                @include('components.sidebar-toggle')
                @include('components.navbar')
            </div>
        </div>

        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @php
                $id = request()->route('id');
                $menuItems = [
                    [
                        'route' => 'teams.profile',
                        'icon' => "<i class='fas fa-user me-1'></i>",
                        'params' => ['id' => $id],
                        'label' => __('messages.details'),
                        'visible_status' => ['leader', 'member', 'none'], // bu menüyü sadece lider ve üyeler görebilir
                    ],
                    [
                        'route' => 'teams.players',
                        'icon' => "<i class='fas fa-users me-1'></i>",
                        'label' => __('messages.players'),
                        'visible_status' => ['leader', 'member', 'none'], // sadece lider görebilir
                        'children' => [
                            [
                                'route' => 'teams.requested-players',
                                'params' => ['id' => $id],
                                'label' => __('messages.requested_players'),
                                'visible_status' => ['leader'],
                            ],
                            [
                                'route' => 'teams.players',
                                'params' => ['id' => $id],
                                'label' => __('messages.players'),
                                'visible_status' => ['leader', 'member', 'none'],
                            ],
                            [
                                'route' => 'teams.new-players',
                                'params' => ['id' => $id],
                                'label' => __('messages.add_new_players'),
                                'visible_status' => ['leader'],
                            ],
                            [
                                'route' => 'teams.invited-players',
                                'params' => ['id' => $id],
                                'label' => __('messages.invited_players'),
                                'visible_status' => ['leader'],
                            ],
                        ],
                    ],
                    [
                        'route' => 'teams.matches',
                        'icon' => "<i class='fas fa-handshake'></i>",
                        'params' => ['id' => $id],
                        'label' => __('messages.matches'),
                        'visible_status' => ['leader', 'member', 'none'],
                    ],
                    [
                        'route' => 'teams.activities',
                        'icon' => "<i class='fas fa-map-marker-alt'></i>",
                        'params' => ['id' => $id],
                        'label' => __('messages.activities'),
                        'visible_status' => ['leader', 'member', 'none'],
                    ],
                    [
                        'route' => 'teams.announcements',
                        'icon' => "<i class='fas fa-bullhorn'></i>",
                        'params' => ['id' => $id],
                        'label' => __('messages.announcements'),
                        'visible_status' => ['leader', 'member', 'none'],
                    ],
                ];

            @endphp
            @include('components.team.show.sidebar', [
                'menuItems' => $menuItems,
                'userStatus' => $datas['user_status'],
                'isTeamLeader' => $datas['is_team_leader'],
            ])
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @php
                        $userId = request()->route('id'); // Get the 'id' parameter from the URL
                        $currentRoute = Route::currentRouteName();
                    @endphp
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            @yield('content')
                        </div>
                    </div>

                @include('components.footer')
            </div>
            {{-- @include('components.aside') --}}
        </div>
    </div>
</div>
@include('components.modals.auth-modal')

<script>
    window.showKVKK = function() {
        $('#authContainer').addClass('d-none');
        $('#kvkkContainer').removeClass('d-none');
    };

    window.returnToRegister = function() {
        // Mark KVKK as read by setting the hidden input value
        $('#kvkk_read').val('1');
        // Enable the register button since KVKK has been read
        $('#registerButton').prop('disabled', false);
        // Revert the view to the authentication content
        $('#kvkkContainer').addClass('d-none');
        $('#authContainer').removeClass('d-none');
    };
</script>
<script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/toaster.min.js') }}"></script>
<script>
    toastr.options = {
        closeButton: true, // Show close button
        progressBar: true, // Show progress bar
        positionClass: 'toast-top-right', // Position of the toast
        timeOut: 3000, // Auto-close after 3 seconds
        extendedTimeOut: 1000, // Additional time if hovered
    };
</script>
<script src="{{ asset('assets/js/custom/auth-modal.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/form.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/tr.js"></script>
<x-swal-message />

@yield('page-scripts')
</body>
</html>
