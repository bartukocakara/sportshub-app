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
            @include('components.sidebar')
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    @php
                        $userId = request()->route('id'); // Get the 'id' parameter from the URL
                        $currentRoute = Route::currentRouteName();
                    @endphp
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_toolbar" class="app-toolbar pt-5">
                            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                                            {{ __('messages.details') }}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div id="kt_app_content" class="app-content flex-column-fluid">
                                <div id="kt_app_content_container" class="app-container container-fluid">
                                    <div class="card mb-5 mb-xxl-8">
                                        <div class="card-body p-4">
                                            @php
                                                $navItems = [
                                                    [
                                                        'route' => 'users.profile',
                                                        'icon' => 'fas fa-user',
                                                        'label' => __('messages.details'),
                                                    ],
                                                    [
                                                        'route' => 'users.teams',
                                                        'icon' => 'fas fa-users',
                                                        'label' => __('messages.teams'),
                                                    ],
                                                    [
                                                        'route' => 'users.matches',
                                                        'icon' => 'fas fa-handshake',
                                                        'label' => __('messages.matches'),
                                                    ],
                                                    [
                                                        'route' => 'users.activities',
                                                        'icon' => 'fas fa-map-marker-alt',
                                                        'label' => __('messages.activities'),
                                                    ],
                                                    [
                                                        'route' => 'users.announcements',
                                                        'icon' => 'fas fa-bullhorn',
                                                        'label' => __('messages.announcements'),
                                                    ],
                                                ];
                                            @endphp

                                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                                                @foreach($navItems as $item)
                                                    <li class="nav-item mt-2">
                                                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ $currentRoute === $item['route'] ? 'active' : '' }}"
                                                        href="{{ route($item['route'], ['id' => $userId]) }}">
                                                            <i class="{{ $item['icon'] }} me-1"></i>
                                                            {{ $item['label'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>

                                        </div>
                                    </div>
                                    @yield('content')
                                </div>
                            </div>
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
@yield('page-scripts')
</body>
</html>
