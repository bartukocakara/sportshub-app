@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@include('components.header')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
            <div class="d-flex align-items-center flex-stack flex-grow-1">
                            <div class="app-header-logo d-flex align-items-center flex-stack px-lg-11 mb-2" id="kt_app_header_logo">
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <a href="{{ route('home') }}" class="app-sidebar-logo">
                        <h2>Sportshub</h2>
                    </a>
                </div>
            @include('components.navbar')
            </div>
        </div>
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                @yield('content')
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
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/search.js') }}"></script>

@yield('page-scripts')
</body>
</html>
