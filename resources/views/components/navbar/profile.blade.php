<div class="app-navbar-item ms-3 ms-lg-4 me-lg-2" id="kt_header_user_menu_toggle">
    <div class="cursor-pointer symbol symbol-30px symbol-lg-40px"
         data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
         data-kt-menu-attach="parent"
         data-kt-menu-placement="bottom-end">
        @auth
            @if(auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" alt="user">
            @else
                <div class="symbol-label bg-primary text-white fw-bold d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; border-radius: 50%;">
                    {{ strtoupper(mb_substr(auth()->user()->first_name, 0, 1)) }}
                </div>
            @endif
        @else
            <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-45px h-45px w-md-45px h-md-45px d-flex align-items-center justify-content-center">
                <i class="bi bi-person-circle fs-2"></i>
            </div>
        @endauth
    </div>

    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
         data-kt-menu="true">
        @auth
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <div class="symbol symbol-50px me-5">
                    </div>
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                        </div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                    </div>
                </div>
            </div>
            <div class="separator my-2"></div>
            <div class="menu-item px-5">
                <a href="{{ route('me.profile') }}" class="menu-link px-5">{{ __('messages.account') }}</a>
            </div>
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
        <div class="menu-item px-5">
            <a href="{{ route('court-business.auth.login') }}" class="menu-link px-5">{{ __('messages.court_business_login') }}</a>
        </div>
        <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
             data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
            <a href="#" class="menu-link px-5">
                <span class="menu-title position-relative">{{ __('messages.mode') }}
                    <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                        <i class="ki-duotone ki-night-day theme-light-show fs-2">
                            <span class="path1"></span><span class="path2"></span>
                            <span class="path3"></span><span class="path4"></span>
                            <span class="path5"></span><span class="path6"></span>
                            <span class="path7"></span><span class="path8"></span>
                            <span class="path9"></span><span class="path10"></span>
                        </i>
                        <i class="ki-duotone ki-moon theme-dark-show fs-2">
                            <span class="path1"></span><span class="path2"></span>
                        </i>
                    </span>
                </span>
            </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                 data-kt-menu="true" data-kt-element="theme-mode-menu">
                <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                        <span class="menu-icon"><i class="ki-duotone ki-night-day fs-2"></i></span>
                        <span class="menu-title">Light</span>
                    </a>
                </div>
                <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2 active" data-kt-element="mode" data-kt-value="dark">
                        <span class="menu-icon"><i class="ki-duotone ki-moon fs-2"></i></span>
                        <span class="menu-title">{{ __('messages.dark') }}</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Auth buttons --}}
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
