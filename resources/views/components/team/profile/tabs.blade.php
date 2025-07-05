<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_player_list_tab" aria-selected="true" role="tab">{{ __('messages.players_list') }}</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_activities_tab" aria-selected="false" role="tab" tabindex="-1">{{ __('messages.activities') }}</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_announcements_tab" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">
            {{ __('messages.announcements') }}
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_messages_tab" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">
            {{ __('messages.messages') }}
        </a>
    </li>
    <li class="nav-item ms-auto">
        <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            {{ __('messages.actions') }}
            <i class="ki-duotone ki-down fs-2 me-0"></i>
        </a>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
            <div class="menu-item px-5">
                <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
            </div>
            <div class="menu-item px-5">
                <a href="#" class="menu-link flex-stack px-5">
                    Create payments

                    <span class="ms-2" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
                        <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                    </span>
                </a>
            </div>
            <div class="separator my-3"></div>
            <div class="menu-item px-5">
                <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
            </div>
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5"> Reports </a>
            </div>
            <div class="menu-item px-5">
                <a href="#" class="menu-link text-danger px-5"> {{ __('messages.delete_team') }} </a>
            </div>
        </div>
    </li>
</ul>
