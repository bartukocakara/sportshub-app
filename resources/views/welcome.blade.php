@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/index.html" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>

                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Dashboards
                            </li>

                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>

                            <li class="breadcrumb-item text-gray-700">
                                Projects
                            </li>
                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            Projects Dashboard
                        </h1>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="tns tns-default" style="direction: ltr">
            <div class="rounded border p-5 p-lg-15">
            <div class="tns tns-default tns-initiazlied" style="direction: ltr">
                <!--begin::Slider-->
                <div class="tns-outer" id="tns1-ow"><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">6 to 8</span>  of 6</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="3" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1" class="  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" data-kt-initialized="1" style="transform: translate3d(-31.25%, 0px, 0px); transition-duration: 0s;"><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-2.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-3.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-4.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-5.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-6.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>

                                            <!--begin::Item-->
                        <div class="text-center px-5 py-5 tns-item tns-slide-active" id="tns1-item0">
                            <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>
                        <!--end::Item--> 
                                            <!--begin::Item-->
                        <div class="text-center px-5 py-5 tns-item tns-slide-active" id="tns1-item1">
                            <img src="assets/media/stock/600x400/img-2.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>
                        <!--end::Item--> 
                                            <!--begin::Item-->
                        <div class="text-center px-5 py-5 tns-item tns-slide-active" id="tns1-item2">
                            <img src="assets/media/stock/600x400/img-3.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>
                        <!--end::Item--> 
                                            <!--begin::Item-->
                        <div class="text-center px-5 py-5 tns-item" id="tns1-item3" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-4.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>
                        <!--end::Item--> 
                                            <!--begin::Item-->
                        <div class="text-center px-5 py-5 tns-item" id="tns1-item4" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-5.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>
                        <!--end::Item--> 
                                            <!--begin::Item-->
                        <div class="text-center px-5 py-5 tns-item" id="tns1-item5" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-6.jpg" class="card-rounded mw-100" alt="">                                           
                        </div>
                        <!--end::Item--> 
                         
                <div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-1.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-2.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-3.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-4.jpg" class="card-rounded mw-100" alt="">                                           
                        </div><div class="text-center px-5 py-5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                            <img src="assets/media/stock/600x400/img-5.jpg" class="card-rounded mw-100" alt="">                                           
                        </div></div></div></div></div>
                <!--end::Slider-->

                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1" aria-controls="tns1" tabindex="-1" data-controls="prev">
                    <i class="ki-duotone ki-left fs-3x"></i>                </button>
                <!--end::Slider button-->

                <!--begin::Slider button-->
                <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1" aria-controls="tns1" tabindex="-1" data-controls="next">
                    <i class="ki-duotone ki-right fs-3x"></i>                </button>
                <!--end::Slider button-->
            </div>            
        </div>
                <div class="row gx-5 gx-xl-10 mb-xl-10">
                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
                        <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-center border-0 h-md-50 mb-5 mb-xl-10" style="background-color: #080655;">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">69</span>

                                    <span class="text-white opacity-50 pt-1 fw-semibold fs-6">Active Projects</span>
                                </div>
                            </div>

                            <div class="card-body d-flex align-items-end pt-0">
                                <div class="d-flex align-items-center flex-column mt-3 w-100">
                                    <div class="d-flex justify-content-between fw-bold fs-6 text-white opacity-50 w-100 mt-auto mb-2">
                                        <span>43 Pending</span>
                                        <span>72%</span>
                                    </div>

                                    <div class="h-8px mx-3 w-100 bg-light-danger rounded">
                                        <div class="bg-danger rounded h-8px" role="progressbar" style="width: 72%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">357</span>

                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Professionals</span>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column justify-content-end pe-0">
                                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s Heroes</span>

                                <div class="symbol-group symbol-hover flex-nowrap">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon" data-bs-original-title="Michael Eberon" data-kt-initialized="1">
                                        <img alt="Pic" src="/assets/media/avatars/300-11.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                                        <img alt="Pic" src="/assets/media/avatars/300-2.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Perry Matthew" data-kt-initialized="1">
                                        <span class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Barry Walter" data-bs-original-title="Barry Walter" data-kt-initialized="1">
                                        <img alt="Pic" src="/assets/media/avatars/300-12.jpg" />
                                    </div>
                                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+42</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-10">
                        <div class="card card-flush h-md-50 mb-5 mb-xl-10">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">$</span>

                                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">69,700</span>

                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>
                                            2.2%
                                        </span>
                                    </div>

                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Projects Earnings in April</span>
                                </div>
                            </div>

                            <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                                <div class="d-flex flex-center me-5 pt-2">
                                    <div id="kt_card_widget_17_chart" style="min-width: 70px; min-height: 70px;" data-kt-size="70" data-kt-line="11"><span></span><canvas height="70" width="70"></canvas></div>
                                </div>

                                <div class="d-flex flex-column content-justify-center flex-row-fluid">
                                    <div class="d-flex fw-semibold align-items-center">
                                        <div class="bullet w-8px h-3px rounded-2 bg-success me-3"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Leaf CRM</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">$7,660</div>
                                    </div>

                                    <div class="d-flex fw-semibold align-items-center my-3">
                                        <div class="bullet w-8px h-3px rounded-2 bg-primary me-3"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Mivy App</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">$2,820</div>
                                    </div>

                                    <div class="d-flex fw-semibold align-items-center">
                                        <div class="bullet w-8px h-3px rounded-2 me-3" style="background-color: #e4e6ef;"></div>

                                        <div class="text-gray-500 flex-grow-1 me-4">Others</div>

                                        <div class="fw-bolder text-gray-700 text-xxl-end">$45,257</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush h-lg-50">
                            <div class="card-header pt-5">
                                <h3 class="card-title text-gray-800">Highlights</h3>

                                <div class="card-toolbar d-none">
                                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                                        <div class="text-gray-600 fw-bold">29 Haz 2025 - 28 Tem 2025</div>

                                        <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-5">
                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Client Rating</div>

                                    <div class="d-flex align-items-senter">
                                        <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span class="path1"></span><span class="path2"></span></i>

                                        <span class="text-gray-900 fw-bolder fs-6">7.8</span>

                                        <span class="text-gray-500 fw-bold fs-6">/10</span>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-3"></div>

                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Quotes</div>

                                    <div class="d-flex align-items-senter">
                                        <i class="ki-duotone ki-arrow-down-right fs-2 text-danger me-2"><span class="path1"></span><span class="path2"></span></i>

                                        <span class="text-gray-900 fw-bolder fs-6">730</span>
                                    </div>
                                </div>

                                <div class="separator separator-dashed my-3"></div>

                                <div class="d-flex flex-stack">
                                    <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Agent Earnings</div>

                                    <div class="d-flex align-items-senter">
                                        <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span class="path1"></span><span class="path2"></span></i>

                                        <span class="text-gray-900 fw-bolder fs-6">$2,309</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xl-12 col-xxl-6 mb-10 mb-xl-0">
                        <div class="card h-md-100">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">What’s up Today</span>

                                    <span class="text-muted mt-1 fw-semibold fs-7">Total 424,567 deliveries</span>
                                </h3>

                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">Report Cecnter</a>
                                </div>
                            </div>

                            <div class="card-body pt-7 px-0">
                                <ul class="nav nav-stretch nav-pills nav-pills-custom nav-pills-active-custom d-flex justify-content-between mb-8 px-5" role="tablist">
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_1"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 fw-bold">20</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_2"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 fw-bold">21</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_3"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">22</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_4"
                                            aria-selected="false"
                                            role="tab"
                                            tabindex="-1"
                                        >
                                            <span class="fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">23</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_5"
                                            aria-selected="false"
                                            role="tab"
                                            tabindex="-1"
                                        >
                                            <span class="fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">24</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger active"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_6"
                                            aria-selected="true"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">We</span>
                                            <span class="fs-6 fw-bold">25</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_7"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Th</span>
                                            <span class="fs-6 fw-bold">26</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_8"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Fri</span>
                                            <span class="fs-6 fw-bold">27</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_9"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 fw-bold">28</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_10"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">29</span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px py-4 px-3 btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_timeline_widget_3_tab_content_11"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 fw-bold">30</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content mb-2 px-9">
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_1" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_2" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_3" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_4" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_5" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade active show" id="kt_timeline_widget_3_tab_content_6" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_7" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_8" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_9" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-success"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_10" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-warning"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_3_tab_content_11" role="tabpanel">
                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    16:30 - 17:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> PM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Dashboard UI/UX Design Review
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Mark Morris</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-danger"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    10:20 - 11:00
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    Marketing Campaign Discussion
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Peter Marcus</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>

                                        <div class="d-flex align-items-center mb-6">
                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-primary"></span>

                                            <div class="flex-grow-1 me-5">
                                                <div class="text-gray-800 fw-semibold fs-2">
                                                    12:00 - 13:40
                                                    <span class="text-gray-500 fw-semibold fs-7"> AM </span>
                                                </div>

                                                <div class="text-gray-700 fw-semibold fs-6">
                                                    9 Degree Project Estimation Meeting
                                                </div>

                                                <div class="text-gray-500 fw-semibold fs-7">
                                                    Lead by
                                                    <a href="#" class="text-primary opacity-75-hover fw-semibold">Lead by Bob</a>
                                                </div>
                                            </div>

                                            <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="float-end d-none">
                                    <a href="#" class="btn btn-sm btn-light me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">Add Lesson</a>

                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Call Sick for Today</a>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush d-none h-md-100">
                            <div class="card-header mt-6">
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">What's on the road?</h3>

                                    <div class="fs-6 text-gray-500">Total 482 participants</div>
                                </div>

                                <div class="card-toolbar">
                                    <select
                                        name="status"
                                        data-control="select2"
                                        data-hide-search="true"
                                        class="form-select form-select-solid form-select-sm fw-bold w-100px select2-hidden-accessible"
                                        data-select2-id="select2-data-7-9sd0"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        data-kt-initialized="1"
                                    >
                                        <option value="1" selected="" data-select2-id="select2-data-9-2xab">Options</option>
                                        <option value="2">Option 1</option>
                                        <option value="3">Option 2</option>
                                        <option value="4">Option 3</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-6xj8" style="width: 100%;">
                                        <span class="selection">
                                            <span
                                                class="select2-selection select2-selection--single form-select form-select-solid form-select-sm fw-bold w-100px"
                                                role="combobox"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                tabindex="0"
                                                aria-disabled="false"
                                                aria-labelledby="select2-status-mq-container"
                                                aria-controls="select2-status-mq-container"
                                            >
                                                <span class="select2-selection__rendered" id="select2-status-mq-container" role="textbox" aria-readonly="true" title="Options">Options</span>
                                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                            </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2 ms-4" role="tablist">
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_0"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 text-gray-800 fw-bold">20</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_1"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 text-gray-800 fw-bold">21</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_2"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 text-gray-800 fw-bold">22</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger active"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_3"
                                            aria-selected="true"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 text-gray-800 fw-bold">23</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_4"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 text-gray-800 fw-bold">24</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_5"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">We</span>
                                            <span class="fs-6 text-gray-800 fw-bold">25</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_6"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Th</span>
                                            <span class="fs-6 text-gray-800 fw-bold">26</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_7"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 text-gray-800 fw-bold">27</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_8"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 text-gray-800 fw-bold">28</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_9"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 text-gray-800 fw-bold">29</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_10"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 text-gray-800 fw-bold">30</span>
                                        </a>
                                    </li>

                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-color-active-white btn-active-danger"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_11"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="text-gray-500 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 text-gray-800 fw-bold">31</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content px-9">
                                    <div id="kt_schedule_day_0" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>

                                                <div class="text-gray-500">Lead by <a href="#">Naomi Hayabusa</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>

                                                <div class="text-gray-500">Lead by <a href="#">Peter Marcus</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>

                                                <div class="text-gray-500">Lead by <a href="#">Walter White</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_1" class="tab-pane fade show active" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Project Review &amp; Testing </a>

                                                <div class="text-gray-500">Lead by <a href="#">Naomi Hayabusa</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> 9 Degree Project Estimation Meeting </a>

                                                <div class="text-gray-500">Lead by <a href="#">Naomi Hayabusa</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>

                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_2" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>

                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Team Backlog Grooming Session </a>

                                                <div class="text-gray-500">Lead by <a href="#">Sean Bean</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Marketing Campaign Discussion </a>

                                                <div class="text-gray-500">Lead by <a href="#">Sean Bean</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_3" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Development Team Capacity Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> 9 Degree Project Estimation Meeting </a>

                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>

                                                <div class="text-gray-500">Lead by <a href="#">Karina Clarke</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_4" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Project Review &amp; Testing </a>

                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> 9 Degree Project Estimation Meeting </a>

                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>

                                                <div class="text-gray-500">Lead by <a href="#">Karina Clarke</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_5" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Walter White</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Team Backlog Grooming Session </a>

                                                <div class="text-gray-500">Lead by <a href="#">Yannis Gloverson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>

                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_6" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Peter Marcus</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Marketing Campaign Discussion </a>

                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Sales Pitch Proposal </a>

                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_7" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Project Review &amp; Testing </a>

                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> 9 Degree Project Estimation Meeting </a>

                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Bob Harris</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_8" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Team Backlog Grooming Session </a>

                                                <div class="text-gray-500">Lead by <a href="#">Yannis Gloverson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>

                                                <div class="text-gray-500">Lead by <a href="#">Walter White</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Lunch &amp; Learn Catch Up </a>

                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_9" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Marketing Campaign Discussion </a>

                                                <div class="text-gray-500">Lead by <a href="#">Naomi Hayabusa</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> 9 Degree Project Estimation Meeting </a>

                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Committee Review Approvals </a>

                                                <div class="text-gray-500">Lead by <a href="#">Walter White</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_10" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Karina Clarke</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Development Team Capacity Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                    <div id="kt_schedule_day_11" class="tab-pane fade show" role="tabpanel">
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>

                                                <div class="text-gray-500">Lead by <a href="#">Sean Bean</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Marketing Campaign Discussion </a>

                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>

                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>

                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>

                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                            </div>

                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="col-xxl-6">
                        <div class="card card-flush h-md-100">
                            <div class="card-body py-9">
                                <div class="row gx-9 h-100">
                                    <div class="col-sm-6 mb-10 mb-sm-0">
                                        <div
                                            class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-400px min-h-sm-100 h-100"
                                            style="background-size: 100% 100%; background-image: url('/assets/media/stock/600x600/img-33.jpg');"
                                        ></div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-7">
                                                <div class="d-flex flex-stack mb-6">
                                                    <div class="flex-shrink-0 me-5">
                                                        <span class="text-gray-500 fs-7 fw-bold me-2 d-block lh-1 pb-1">Featured</span>

                                                        <span class="text-gray-800 fs-1 fw-bold">9 Degree</span>
                                                    </div>

                                                    <span class="badge badge-light-primary flex-shrink-0 align-self-center py-3 px-4 fs-7">In Process</span>
                                                </div>

                                                <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                                        <div class="symbol symbol-30px symbol-circle me-3">
                                                            <img src="/assets/media/avatars/300-3.jpg" class="" alt="" />
                                                        </div>

                                                        <div class="m-0">
                                                            <span class="fw-semibold text-gray-500 d-block fs-8">Manager</span>
                                                            <a href="/pages/user-profile/overview.html" class="fw-bold text-gray-800 text-hover-primary fs-7">Robert Fox</a>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol-30px symbol-circle me-3">
                                                            <span class="symbol-label bg-success">
                                                                <i class="ki-duotone ki-abstract-41 fs-5 text-white"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>

                                                        <div class="m-0">
                                                            <span class="fw-semibold text-gray-500 d-block fs-8">Budget</span>
                                                            <span class="fw-bold text-gray-800 fs-7">$64.800</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-6">
                                                <span class="fw-semibold text-gray-600 fs-6 mb-8 d-block">
                                                    Flat cartoony illustrations with vivid unblended colors and asymmetrical beautiful purple hair lady
                                                </span>

                                                <div class="d-flex">
                                                    <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 me-6 mb-3">
                                                        <span class="fs-6 text-gray-700 fw-bold">Feb 6, 2021</span>

                                                        <div class="fw-semibold text-gray-500">Due Date</div>
                                                    </div>

                                                    <div class="border border-gray-300 border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3">
                                                        <span class="fs-6 text-gray-700 fw-bold">$<span class="ms-n1 counted" data-kt-countup="true" data-kt-countup-value="284,900.00" data-kt-initialized="1">284,900</span></span>

                                                        <div class="fw-semibold text-gray-500">Budget</div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-stack mt-auto bd-highlight">
                                                <div class="symbol-group symbol-hover flex-nowrap">
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                                                        <img alt="Pic" src="/assets/media/avatars/300-2.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon" data-bs-original-title="Michael Eberon" data-kt-initialized="1">
                                                        <img alt="Pic" src="/assets/media/avatars/300-3.jpg" />
                                                    </div>
                                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                                    </div>
                                                </div>

                                                <a href="/apps/projects/project.html" class="d-flex align-items-center text-primary opacity-75-hover fs-6 fw-semibold">
                                                    View Project

                                                    <i class="ki-duotone ki-exit-right-corner fs-4 ms-1"><span class="path1"></span><span class="path2"></span></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl-6">
                        <div class="card border-0 h-md-100" data-bs-theme="light" style="background: linear-gradient(112.14deg, #00d2ff 0%, #3a7bd5 100%);">
                            <div class="card-body">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 ps-xl-13">
                                        <div class="text-white mb-6 pt-6">
                                            <span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75">Get best offer</span>

                                            <span class="fs-2qx fw-bold">Upgrade Your Plan</span>
                                        </div>

                                        <span class="fw-semibold text-white fs-6 mb-8 d-block opacity-75">
                                            Flat cartoony and illustrations with vivid unblended purple hair lady
                                        </span>

                                        <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-10 mb-xl-20">
                                            <div class="d-flex align-items-center me-5 me-xl-13">
                                                <div class="symbol symbol-30px symbol-circle me-3">
                                                    <span class="symbol-label" style="background: #35c7ff;">
                                                        <i class="ki-duotone ki-abstract-41 fs-5 text-white"><span class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                </div>

                                                <div class="text-white">
                                                    <span class="fw-semibold d-block fs-8 opacity-75">Projects</span>
                                                    <span class="fw-bold fs-7">Up to 500</span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-30px symbol-circle me-3">
                                                    <span class="symbol-label" style="background: #35c7ff;">
                                                        <i class="ki-duotone ki-abstract-26 fs-5 text-white"><span class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                </div>

                                                <div class="text-white">
                                                    <span class="fw-semibold opacity-75 d-block fs-8">Tasks</span>
                                                    <span class="fw-bold fs-7">Unlimited</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column flex-sm-row d-grid gap-2">
                                            <a href="#" class="btn btn-success flex-shrink-0 me-lg-2" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a>
                                            <a href="#" class="btn btn-primary flex-shrink-0" style="background: rgba(255, 255, 255, 0.2);" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Read Guides</a>
                                        </div>
                                    </div>

                                    <div class="col-5 pt-10">
                                        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-225px" style="background-image:url('/assets/media/svg/illustrations/easy/5.svg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('page-scripts')
@include('components.scripts.pagination-scripts')

@endsection
