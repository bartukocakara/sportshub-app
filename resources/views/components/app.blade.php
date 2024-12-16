@include('layouts.header')
@include('layouts.navbar')
		<script>var hostUrl = "assets/";</script>
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/customers/list/list.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/customers/add.js') }}"></script>
		<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/create-account.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
		<script src="{{ asset('assets/js/custom/utilities/modals/create.js') }}"></script>
        <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/tr.js"></script>
        @yield('page-specific-scripts')
	</body>
</html>
