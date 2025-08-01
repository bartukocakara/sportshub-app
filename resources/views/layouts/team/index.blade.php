@section('custom-styles')
<style>
        /* Masaüstünde scroll-to-top butonunu göster, mobilde gizle */
        #scrollTopDesktop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 100;
            display: none; /* Varsayılan olarak gizli */
        }

        @media (min-width: 768px) {
            #scrollTopDesktop {
                display: flex !important; /* Sadece md ve üzeri görünür */
            }
        }

        @media (max-width: 767.98px) {
            #scrollTopDesktop {
                display: none !important; /* Mobilde gizle (önlem amaçlı tekrar) */
            }
        }
    </style>
@endsection
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
                                'route' => 'teams.requested-players.invite',
                                'params' => ['id' => $id],
                                'label' => __('messages.invited_players'),
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
                                'route' => 'teams.requested-players.join',
                                'params' => ['id' => $id],
                                'label' => __('messages.requested_players'),
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
                    // [
                    //     'route' => 'teams.announcements',
                    //     'icon' => "<i class='fas fa-bullhorn'></i>",
                    //     'params' => ['id' => $id],
                    //     'label' => __('messages.announcements'),
                    //     'visible_status' => ['leader', 'member', 'none'],
                    // ],
                ];

            @endphp
            @include('components.team.show.sidebar', [
                'menuItems' => $menuItems,
                'userRole' => $datas['user_role'],
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
                        <div class="d-md-none position-fixed bottom-0 start-0 end-0 bg-white shadow py-2 px-4 z-index-50 d-flex gap-2">
                            <button onclick="scrollToAnnouncements()" class="btn btn-secondary w-100 fw-semibold py-3" style="background-color:#F4F4F4">
                                📢 {{ __('messages.go_to_announcements') }}
                            </button>
                            <button id="scrollTopButton" class="btn btn-light fw-semibold d-flex align-items-center justify-content-center" style="width: 56px; height: 100%; font-size: 1.5rem;">
                                ⬆️
                            </button>
                            <button id="openSidebarButton" class="btn btn-light fw-semibold d-flex align-items-center justify-content-center" style="width: 56px; height: 100%; font-size: 1.5rem;">
                                ☰
                            </button>
                        </div>
                        <button id="kt_app_sidebar_mobile_toggle" class="d-none"></button>
                        <div id="scrollTopDesktop" style="position: fixed; bottom: 20px; right: 20px; z-index: 100; display: none; ">
                            <button onclick="scrollToTop()" class="btn btn-icon shadow rounded-circle"
                                    style="background-color:#f4f4f4; color: white; width: 48px; height: 48px; font-size: 1.2rem;">
                                ⬆️
                            </button>
                        </div>
                    </div>

                @include('components.footer')
            </div>
            {{-- @include('components.aside') --}}
        </div>
    </div>
</div>
@include('components.modals.auth-modal')

<script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/toaster.min.js') }}"></script>
<script>
    window.showKVKK = function () {
        $('#authContainer').addClass('d-none');
        $('#kvkkContainer').removeClass('d-none');
    };

    window.returnToRegister = function () {
        $('#kvkk_read').val('1');
        $('#registerButton').prop('disabled', false);
        $('#kvkkContainer').addClass('d-none');
        $('#authContainer').removeClass('d-none');
    };

    $(document).ready(function () {
        if (typeof initializeMobileButtons === 'function') {
            initializeMobileButtons();
        }

        const $desktopBtn = $('#scrollTopDesktop');
        if ($desktopBtn.length) {
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 300) {
                    $desktopBtn.removeClass('d-none');
                } else {
                    $desktopBtn.addClass('d-none');
                }
            });

            if ($(window).width() < 768) {
                $desktopBtn.remove();
            }
        }

        // Toastr configuration inside ready block
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 3000,
            extendedTimeOut: 1000,
        };
    });
    
</script>
<x-toast-message />
<script src="{{ asset('assets/js/custom/auth-modal.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/form.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/tr.js"></script>
<x-swal-message />
<script src="{{ asset('assets/js/mobile-buttons.js') }}"></script>
<script src="{{ asset('assets/js/img-select2.js') }}"></script>

@yield('page-scripts')
</body>
</html>
