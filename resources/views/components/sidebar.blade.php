@php
    $menuItems = [
        [
            'route' => 'activities.index',
            'icon' => '📍',
            'label' => __('messages.activities')
        ],
        [
            'route' => 'announcements.index',
            'icon' => '📣',
            'label' => __('messages.announcements')
        ],
        [
            'route' => 'home',
            'icon' => '🏟️',
            'label' => __('messages.courts')
        ],
        [
            'route' => 'matches.index',
            'icon' => '🤝',
            'label' => __('messages.matches')
        ],
        [
            'route' => 'teams.index',
            'icon' => '👥',
            'label' => __('messages.teams')
        ],
        [
            'route' => 'users.index',
            'icon' => '👥',
            'label' => __('messages.players')
        ],
    ];
@endphp

<div id="kt_app_sidebar" class="app-sidebar flex-column drawer drawer-start"
     data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true"
     data-kt-drawer-width="250px"
     data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
     style="width: 250px !important;">

    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2"
         id="kt_app_sidebar_main"
         data-kt-scroll="true"
         data-kt-scroll-activate="true"
         data-kt-scroll-height="auto"
         data-kt-scroll-dependencies="#kt_app_header"
         data-kt-scroll-wrappers="#kt_app_main"
         data-kt-scroll-offset="5px"
         style="height: 618px;">

        <div id="kt_app_sidebar_menu"
             data-kt-menu="true"
             data-kt-menu-expand="false"
             class="flex-column-fluid menu -indention menu-column menu-rounded menu-active-bg mb-7">

            @foreach($menuItems as $item)
                @php
                    $isActive = Route::currentRouteName() === $item['route'];
                @endphp
                <div class="menu-item">
                    <a class="menu-link text-dark {{ $isActive ? 'active fw-bold' : '' }}"
                       style="font-size: 20px;"
                       href="{{ route($item['route']) }}">
                        <span class="menu-icon">{{ $item['icon'] }}</span>
                        <span class="menu-title">{{ $item['label'] }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
