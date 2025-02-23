<div class="app-navbar-item ms-3 ms-lg-4 me-lg-2" id="kt_header_user_menu_toggle">
    <div class="cursor-pointer symbol symbol-30px symbol-lg-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <img src="assets/media/avatars/300-2.jpg" alt="user">
    </div>
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <div class="symbol symbol-50px me-5">
                    <img alt="Logo" src="assets/media/avatars/300-2.jpg">
                </div>
                <div class="d-flex flex-column">
                    @auth
                        <div class="fw-bold d-flex align-items-center fs-5">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                        </div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                    @else
                        <div class="fw-bold d-flex align-items-center fs-5">Guest User</div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">guest@example.com</a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="separator my-2"></div>
        @auth
        <div class="menu-item px-5">
            <a href="{{ route('account.settings') }}" class="menu-link px-5">{{ __('messages.account') }}</a>
        </div>


        @endauth
        <div class="menu-item px-5">
            <a href="{{ route('court-business.auth.login') }}" class="menu-link px-5">{{ __('Court Business Login') }}</a>
        </div>
        @auth
        <div class="menu-item px-5">
            <a href="{{ route('reservations.me') }}" class="menu-link px-5">
                <span class="menu-text">{{ __('messages.my_reservations') }}</span>
                <span class="menu-badge">
                    <span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                </span>
            </a>
        </div>
        <div class="separator my-2"></div>
        @endauth
        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('messages.mode') }}
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
                    <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode" data-kt-value="dark">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-duotone ki-moon fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </span>
                        <span class="menu-title">{{ __('messages.dark') }}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('messages.language') }}
                <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ __('messages.turkish') }}
                <img class="w-15px h-15px rounded-1 ms-2" src="assets/media/flags/united-states.svg" alt=""></span></span>
            </a>
            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                <div class="menu-item px-3">
                    <a href="../dist/account/settings.html" class="menu-link d-flex px-5 active">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="assets/media/flags/united-states.svg" alt="">
                    </span>{{ __('messages.english') }}</a>
                </div>
                <div class="menu-item px-3">
                    <a href="../dist/account/settings.html" class="menu-link d-flex px-5">
                    <span class="symbol symbol-20px me-4">
                        <img class="rounded-1" src="assets/media/flags/turkey.svg" alt="">
                    </span>{{ __('messages.turkish') }}</a>
                </div>
            </div>
        </div>
        <div class="menu-item px-5">
            @auth
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="menu-link px-5" style="border: none; background: none; color: inherit;">
                        {{ __('messages.logout') }}
                    </button>
                </form>
            @endauth

            @guest
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authModal">
                {{ __('messages.login') }}
            </button>
            @endguest
        </div>
    </div>
</div>

<!-- Modal (Login / Register Modal) -->
<!-- IMPORTANT: Place this modal markup at the end of your layout (directly inside <body>) -->
