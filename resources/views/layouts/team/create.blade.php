@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@include('components.header')
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
            <div class="d-flex align-items-center flex-stack flex-grow-1">
                <div class="app-header-logo d-flex align-items-center flex-stack px-lg-11 mb-2" id="kt_app_header_logo">
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none" id="kt_app_sidebar_mobile_toggle">
                        <i class="ki-duotone ki-abstract-14 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                    <a href="{{ route('home') }}" class="app-sidebar-logo">
                        <h2>Sportshub</h2>
                    </a>
                </div>
            @include('components.navbar')
            </div>
        </div>
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <div id="kt_app_toolbar" class="app-toolbar pt-5">
                        <div class="app-container container-fluid d-flex align-items-stretch">
                            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                                <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                            <a href="/" class="text-gray-500 text-hover-primary">
                                                <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1"><a href="{{ route('teams.index')  }}">{{ __('messages.teams') }}</a></li>
                                        <li class="breadcrumb-item">
                                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                                        </li>
                                        <li class="breadcrumb-item text-gray-700">{{ __('messages.create_team') }}</li>
                                    </ul>
                                    <h1 class="page-heading text-gray-900 fw-bolder fs-1">{{ __('messages.create_team') }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <div class="app-container container-fluid">
                            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid">
                               <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                                    <x-stepper :current-step="$datas['current_step']" :show-last-step="$datas['show_last_step'] ?? false" />
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                @include('components.footer')
            </div>
        </div>
    </div>
</div>
@include('components.modals.auth-modal')

@yield('page-scripts')
</body>
</html>
<script src="{{ asset('assets/plugins/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/auth-modal.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<x-swal-message />
