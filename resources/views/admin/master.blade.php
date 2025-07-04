@include('components.admin.header')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
            <div class="d-flex align-items-center flex-stack flex-grow-1">
                @include('components.admin.sidebar-toggle')
                @include('components.admin.navbar')
            </div>
        </div>
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include('components.admin.sidebar')
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                @yield('content')
                @include('components.admin.footer')
            </div>
            {{-- @include('components.admin.aside') --}}
        </div>
    </div>
</div>

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
@yield('page-scripts')
</body>
</html>
