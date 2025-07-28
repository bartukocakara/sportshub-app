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
            @php
                $userStatus = $datas['user_role'] ?? 'none';
                $isMatchOwner = $datas['is_match_owner'] ?? false;
            @endphp
            @foreach($menuItems as $item)
                @php
                    $itemVisibleStatuses = $item['visible_status'] ?? ['match_owner', 'member', 'none'];
                @endphp

                @if(in_array($userStatus, $itemVisibleStatuses))
                    @if(isset($item['children']))
                        @php
                            $isChildActive = collect($item['children'])->contains(function ($child) {
                                return Route::currentRouteName() === $child['route'];
                            });
                        @endphp

                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ $isChildActive ? 'show' : '' }}">
                            <span class="menu-link text-dark" style="font-size: 20px;">
                                <span class="menu-icon">{!! $item['icon'] ?? '' !!}</span>
                                <span class="menu-title">{{ $item['label'] }}</span>
                                <span class="menu-arrow"></span>
                            </span>

                            <div class="menu-sub menu-sub-accordion" style="{{ $isChildActive ? 'display: block;' : '' }}">
                                @foreach($item['children'] as $child)
                                    @php
                                        $childVisibleStatuses = $child['visible_status'] ?? ['leader', 'member', 'none'];
                                        $childVisible = in_array($userStatus, $childVisibleStatuses);
                                        $isActive = Route::currentRouteName() === $child['route'];
                                    @endphp

                                    @if($childVisible)
                                        <div class="menu-item">
                                            <a class="menu-link {{ $isActive ? 'active fw-bold text-dark' : 'text-dark' }}"
                                               href="{{ route($child['route'], $child['params'] ?? []) }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">{{ $child['label'] }}</span>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        @php
                            $isActive = Route::currentRouteName() === $item['route'];
                        @endphp

                        <div class="menu-item">
                            <a class="menu-link text-dark {{ $isActive ? 'active fw-bold' : '' }}"
                               style="font-size: 20px;"
                               href="{{ route($item['route'], $item['params'] ?? []) }}">
                                <span class="menu-icon">{!! $item['icon'] ?? '' !!}</span>
                                <span class="menu-title">{{ $item['label'] }}</span>
                            </a>
                        </div>
                    @endif
                @endif
            @endforeach

        </div>
    </div>
</div>
