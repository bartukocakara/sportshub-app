<div id="kt_app_sidebar" class="app-sidebar flex-column drawer drawer-start" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle" style="width: 250px !important;">
    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 d-flex flex-column" id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header" data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px" style="height: 618px;">
        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="flex-column-fluid menu -indention menu-column menu-rounded menu-active-bg mb-7">
            <div class="">
                <div class="menu-item">
                    <a class="menu-link" href="{{ route('announcements.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">{{ __('messages.announcements') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
