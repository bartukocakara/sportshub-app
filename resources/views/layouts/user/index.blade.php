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

                                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                                Pages
                                            </li>
                                            <li class="breadcrumb-item">
                                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                            </li>
                                            <li class="breadcrumb-item text-gray-700">
                                                {{ __('messages.details') }}
                                            </li>
                                        </ul>
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
                                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                                <li class="nav-item mt-2">
                                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="{{ route('users.profile', ['id' => $datas['id']]) }}">{{ __('messages.details') }}</a> </a>
                                                </li>
                                                <li class="nav-item mt-2">
                                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('users.teams', ['id' => $datas['id']]) }}"> {{ __('messages.teams') }} </a>
                                                </li>
                                                <li class="nav-item mt-2">
                                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('users.matches', ['id' => $datas['id']]) }}"> {{ __('messages.matches') }} </a>
                                                </li>
                                                <li class="nav-item mt-2">
                                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('users.activities', ['id' => $datas['id']]) }}"> {{ __('messages.activities') }} </a>
                                                </li>
                                                <li class="nav-item mt-2">
                                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="{{ route('users.announcements', ['id' => $datas['id']]) }}"> {{ __('messages.announcements') }} </a>
                                                </li>
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
