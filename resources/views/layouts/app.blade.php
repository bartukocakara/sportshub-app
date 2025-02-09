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
                @yield('content')
                @include('components.footer')
            </div>
            {{-- @include('components.aside') --}}
        </div>
    </div>
</div>
@include('components.modals.auth-modal')
<!-- Global functions for modal actions -->
<script>
    // Define the functions as properties on window for global access
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
