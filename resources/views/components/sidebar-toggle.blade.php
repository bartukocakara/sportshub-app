<div class="app-header-logo d-flex align-items-center flex-stack px-lg-11 mb-2" id="kt_app_header_logo">
	<!--begin::Sidebar mobile toggle-->
	<div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
		<i class="ki-duotone ki-abstract-14 fs-2">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
	<a href="{{ route('home') }}" class="app-sidebar-logo d-flex">
		<img alt="Logo" src="{{ asset('favicon.png') }}" class="h-30px" />
		<h6 class="text-danger m-2">Estasyon Muhasebe</h6>
	</a>
	<div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-sm btn-icon btn-color-danger me-n2 d-none d-lg-flex" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
		<i class="ki-duotone ki-exit-left fs-2x rotate-180">
			<span class="path1"></span>
			<span class="path2"></span>
		</i>
	</div>
</div>
