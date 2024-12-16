<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true" data-kt-app-aside-push-footer="true" class="app-default">
	<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
				<div class="d-flex align-items-center flex-stack flex-grow-1">

					@include('layouts.sidebar-toggle')

					<div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
						<div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1 me-2 me-lg-0">
							<div id="kt_header_search" class="header-search d-flex align-items-center w-lg-350px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="true" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
								<div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
									<div class="d-flex">
										<i class="ki-duotone ki-magnifier fs-1 fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</div>
								</div>
								<div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown py-7 px-7 overflow-hidden w-300px w-md-350px">
									<div data-kt-search-element="wrapper">
										<div data-kt-search-element="results" class="d-none">
											<div class="scroll-y mh-200px mh-lg-350px">
												<h3 class="fs-5 text-muted m-0 pb-5" data-kt-search-element="category-title">Users</h3>
												<h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">Customers</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="app-navbar-item ms-3" style="margin-right: 7%;" id="kt_header_user_menu_toggle">
							<div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
								<img src="assets/media/avatars/blank.png" alt="user" />
							</div>
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
								<div class="menu-item px-3">
									<div class="menu-content d-flex align-items-center px-3">
										<div class="d-flex flex-column">
											<div class="fw-bold d-flex align-items-center fs-5">Kullanıcı
											<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Status</span></div>
											<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
										</div>
									</div>
								</div>
								<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
									<a href="#" class="menu-link px-5">
										<span class="menu-title position-relative">Mode
										<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
											<i class="ki-duotone ki-night-day theme-light-show fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
												<span class="path5"></span>
												<span class="path6"></span>
												<span class="path7"></span>
												<span class="path8"></span>
												<span class="path9"></span>
												<span class="path10"></span>
											</i>
											<i class="ki-duotone ki-moon theme-dark-show fs-2">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</span></span>
									</a>
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-night-day fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
														<span class="path5"></span>
														<span class="path6"></span>
														<span class="path7"></span>
														<span class="path8"></span>
														<span class="path9"></span>
														<span class="path10"></span>
													</i>
												</span>
												<span class="menu-title">Light</span>
											</a>
										</div>
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-moon fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
													</i>
												</span>
												<span class="menu-title">Dark</span>
											</a>
										</div>
										<div class="menu-item px-3 my-0">
											<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
												<span class="menu-icon" data-kt-element="icon">
													<i class="ki-duotone ki-screen fs-2">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</span>
												<span class="menu-title">System</span>
											</a>
										</div>
									</div>
								</div>
								<div class="menu-item px-5">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
									    <button type="submit" class="menu-link px-5">Çıkış Yap</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="app-header-separator"></div>
			</div>
				@include('layouts.sidebar')
			</div>
	</div>
