@extends('admin.master')
@section('title', 'Ana Sayfa')
@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/toaster.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <!--begin::Toolbar wrapper-->
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/index.html" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboards</li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700">Marketing</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->

                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">Marketing Dashboard</h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->

                    <!--begin::Actions-->
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> Create Project </a>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>


        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row gy-5 gx-xl-10">
                    <!--begin::Col-->
                    <div class="col-xxl-6">
                        <!--begin::Row-->
                        <div class="row gx-5 gx-xl-10">
                            <!--begin::Col-->
                            <div class="col-sm-6 mb-5 mb-xl-10">
                                <!--begin::List widget 1-->
                                <div class="card card-flush h-lg-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-900">Highlights</span>
                                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Latest social statistics</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                                </div>


                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Ticket </a>
                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Customer </a>
                                                </div>


                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>


                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Admin Group </a>
                                                        </div>


                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Staff Group </a>
                                                        </div>


                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Member Group </a>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Contact </a>
                                                </div>


                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-body pt-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Avg. Client Rating</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">7.8</span>
                                                <!--end::Number-->

                                                <span class="text-gray-500 fw-bold fs-6">/10</span>
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Instagram Followers</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-down-right fs-2 text-danger me-2"><span class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">730k</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Section-->
                                            <div class="text-gray-700 fw-semibold fs-6 me-2">Google Ads CPC</div>
                                            <!--end::Section-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-senter">
                                                <i class="ki-duotone ki-arrow-up-right fs-2 text-success me-2"><span class="path1"></span><span class="path2"></span></i>

                                                <!--begin::Number-->
                                                <span class="text-gray-900 fw-bolder fs-6">$2.09</span>
                                                <!--end::Number-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::LIst widget 1-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-sm-6 mb-5 mb-xl-10">
                                <!--begin::List widget 2-->
                                <div class="card card-flush h-lg-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-900">External Links</span>
                                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Most used resources</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                            </button>

                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                </div>
                                                <!--end::Heading-->

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> Create Invoice </a>
                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">
                                                        Create Payment

                                                        <span class="ms-2" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
                                                            <i class="ki-duotone ki-information fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        </span>
                                                    </a>
                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> Generate Bill </a>
                                                </div>


                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Plans </a>
                                                        </div>


                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Billing </a>
                                                        </div>


                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Statements </a>
                                                        </div>


                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->

                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                    <!--end::Input-->

                                                                    <!--end::Label-->
                                                                    <span class="form-check-label text-muted fs-6"> Recuring </span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3"> Settings </a>
                                                </div>

                                            </div>
                                            <!--end::Menu 3-->

                                        </div>

                                    </div>

                                    <div class="card-body pt-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Title-->
                                            <a href="#" class="text-primary opacity-75-hover fs-6 fw-semibold">Google Analytics</a>
                                            <!--end::Title-->

                                            <!--begin::Action-->
                                            <button type="button" class="btn btn-icon btn-sm h-auto btn-color-gray-500 btn-active-color-primary justify-content-end">
                                                <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </button>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Title-->
                                            <a href="#" class="text-primary opacity-75-hover fs-6 fw-semibold">Facebook Ads</a>
                                            <!--end::Title-->

                                            <!--begin::Action-->
                                            <button type="button" class="btn btn-icon btn-sm h-auto btn-color-gray-500 btn-active-color-primary justify-content-end">
                                                <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </button>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-3"></div>
                                        <!--end::Separator-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Title-->
                                            <a href="#" class="text-primary opacity-75-hover fs-6 fw-semibold">Seranking</a>
                                            <!--end::Title-->

                                            <!--begin::Action-->
                                            <button type="button" class="btn btn-icon btn-sm h-auto btn-color-gray-500 btn-active-color-primary justify-content-end">
                                                <i class="ki-duotone ki-exit-right-corner fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </button>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List widget 2-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->

                        <!--begin::Table widget 1-->
                        <div class="card card-flush mb-xxl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">Featured Campaigns</span>

                                    <span class="text-gray-500 pt-2 fw-semibold fs-6">75% activity growth</span>
                                </h3>
                                <!--end::Title-->

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1 text-gray-500 me-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                    </button>

                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                        </div>


                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"> New Ticket </a>
                                        </div>


                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"> New Customer </a>
                                        </div>


                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>


                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> Admin Group </a>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3"> New Contact </a>
                                        </div>


                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->

                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="card-body">
                                <!--begin::Nav-->
                                <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_1_tab_1" aria-selected="true" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="/assets/media/svg/brand-logos/beats-electronics.svg" class="" />
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-700 fw-bold fs-6 lh-1"> Beats </span>
                                            <!--end::Subtitle-->

                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_1_tab_2" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="Logo" src="/assets/media/svg/brand-logos/amazon.svg" class="theme-light-show" />
                                                <img alt="Logo" src="/assets/media/svg/brand-logos/amazon-dark.svg" class="theme-dark-show" />
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-700 fw-bold fs-6 lh-1"> Amazon </span>
                                            <!--end::Subtitle-->

                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_1_tab_3" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="/assets/media/svg/brand-logos/bp-2.svg" class="" />
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1"> BP </span>
                                            <!--end::Subtitle-->

                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_1_tab_4" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <img alt="" src="/assets/media/svg/brand-logos/slack-icon.svg" class="nav-icon" />
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Subtitle-->
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1"> Slack </span>
                                            <!--end::Subtitle-->

                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <li class="nav-item mb-3" role="presentation">
                                        <!--begin::Link-->
                                        <a class="nav-link d-flex flex-center overflow-hidden w-80px h-85px" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign" href="#" aria-selected="false" tabindex="-1" role="tab">
                                            <!--begin::Icon-->
                                            <div class="nav-icon">
                                                <i class="ki-duotone ki-plus-square fs-2hx text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Bullet-->
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                            <!--end::Bullet-->
                                        </a>
                                        <!--end::Link-->
                                    </li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Nav-->

                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade show active" id="kt_stats_widget_1_tab_1" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500">
                                                        <th class="p-0 min-w-150px d-block pt-3">EMAIL TITLE</th>
                                                        <th class="text-end min-w-140px pt-3">STATUS</th>
                                                        <th class="pe-0 text-end min-w-120px pt-3">CONVERSION</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->

                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Rated Headsets of 2022</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">18%(6.4k)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">New Model BS 2000 X</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-primary fs-7 fw-bold">In Draft</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0.01%(1)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">2022 Spring Conference by Beats</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">37%(247)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Headsets Giveaway</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning fs-7 fw-bold">In Queue</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0%(0)</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_1_tab_2" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500">
                                                        <th class="p-0 min-w-150px d-block pt-3">EMAIL TITLE</th>
                                                        <th class="text-end min-w-140px pt-3">STATUS</th>
                                                        <th class="pe-0 text-end min-w-120px pt-3">CONVERSION</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->

                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">2022 Spring Conference by Beats</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">37%(247)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Headsets Giveaway</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning fs-7 fw-bold">In Queue</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0%(0)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Rated Headsets of 2022</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">18%(6.4k)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">New Model BS 2000 X</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-primary fs-7 fw-bold">In Draft</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0.01%(1)</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_1_tab_3" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500">
                                                        <th class="p-0 min-w-150px d-block pt-3">EMAIL TITLE</th>
                                                        <th class="text-end min-w-140px pt-3">STATUS</th>
                                                        <th class="pe-0 text-end min-w-120px pt-3">CONVERSION</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->

                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">New Model BS 2000 X</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-primary fs-7 fw-bold">In Draft</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0.01%(1)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Rated Headsets of 2022</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">18%(6.4k)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">2022 Spring Conference by Beats</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">37%(247)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Headsets Giveaway</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning fs-7 fw-bold">In Queue</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0%(0)</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                    <!--begin::Tap pane-->
                                    <div class="tab-pane fade" id="kt_stats_widget_1_tab_4" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle gs-0 gy-4 my-0">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500">
                                                        <th class="p-0 min-w-150px d-block pt-3">EMAIL TITLE</th>
                                                        <th class="text-end min-w-140px pt-3">STATUS</th>
                                                        <th class="pe-0 text-end min-w-120px pt-3">CONVERSION</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->

                                                <!--begin::Table body-->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Headsets Giveaway</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-warning fs-7 fw-bold">In Queue</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0%(0)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Headsets Giveaway</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">37%(247)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Best Rated Headsets of 2022</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-success fs-7 fw-bold">Sent</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">18%(6.4k)</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">New Model BS 2000 X</a>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="badge badge-light-primary fs-7 fw-bold">In Draft</span>
                                                        </td>

                                                        <td class="text-end">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">0.01%(1)</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Table widget 1-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xxl-6 mb-5 mb-xl-10">
                        <!--begin::Chart widget 8-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">Performance Overview</span>
                                    <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all channels</span>
                                </h3>
                                <!--end::Title-->

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <ul class="nav" id="kt_chart_widget_8_tabs" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_8_week_toggle" href="#kt_chart_widget_8_week_tab" aria-selected="false" tabindex="-1" role="tab">Month</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_8_month_toggle" href="#kt_chart_widget_8_month_tab" aria-selected="true" role="tab">Week</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="card-body pt-6">
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_chart_widget_8_week_tab" role="tabpanel" aria-labelledby="kt_chart_widget_8_week_toggle">
                                        <!--begin::Statistics-->
                                        <div class="mb-5">
                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-1 fw-semibold text-gray-500 me-1 mt-n1">$</span>

                                                <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">18,89</span>

                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>
                                                    4,8%
                                                </span>
                                            </div>
                                            <!--end::Statistics-->

                                            <!--begin::Description-->
                                            <span class="fs-6 fw-semibold text-gray-500">Avarage cost per interaction</span>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Statistics-->

                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_8_week_chart" class="ms-n5 min-h-auto" style="height: 425px"></div>
                                        <!--end::Chart-->

                                        <!--begin::Items-->
                                        <div class="d-flex flex-wrap pt-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-&lt;gray-600 fs-6">Google Ads</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-column pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                        </div>
                                        <!--ed::Items-->
                                    </div>
                                    <!--end::Tab pane-->

                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade active show" id="kt_chart_widget_8_month_tab" role="tabpanel" aria-labelledby="kt_chart_widget_8_month_toggle">
                                        <!--begin::Statistics-->
                                        <div class="mb-5">
                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-1 fw-semibold text-gray-500 me-1 mt-n1">$</span>

                                                <span class="fs-3x fw-bold text-gray-800 me-2 lh-1 ls-n2">8,55</span>

                                                <span class="badge badge-light-success fs-base">
                                                    <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>
                                                    2.2%
                                                </span>
                                            </div>
                                            <!--end::Statistics-->

                                            <!--begin::Description-->
                                            <span class="fs-6 fw-semibold text-gray-500">Avarage cost per interaction</span>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Statistics-->

                                        <!--begin::Chart-->
                                        <div id="kt_chart_widget_8_month_chart" class="ms-n5 min-h-auto" style="height: 425px; min-height: 440px">
                                            <div id="apexchartsfoezru7f" class="apexcharts-canvas apexchartsfoezru7f apexcharts-theme-" style="width: 678px; height: 425px">
                                                <svg id="SvgjsSvg1596" width="678" height="425" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)">
                                                    <foreignObject x="0" y="0" width="678" height="425"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 212.5px"></div></foreignObject>
                                                    <g id="SvgjsG1605" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG1606" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG1778" class="apexcharts-yaxis" rel="0" transform="translate(20.5625, 0)">
                                                        <g id="SvgjsG1779" class="apexcharts-yaxis-texts-g">
                                                            <text id="SvgjsText1781" font-family="inherit" x="20" y="34.333333333333336" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1782">700</tspan>
                                                                <title>700</title>
                                                            </text>
                                                            <text id="SvgjsText1784" font-family="inherit" x="20" y="85.96190476190476" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1785">600</tspan>
                                                                <title>600</title>
                                                            </text>
                                                            <text id="SvgjsText1787" font-family="inherit" x="20" y="137.59047619047618" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1788">500</tspan>
                                                                <title>500</title>
                                                            </text>
                                                            <text id="SvgjsText1790" font-family="inherit" x="20" y="189.21904761904761" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1791">400</tspan>
                                                                <title>400</title>
                                                            </text>
                                                            <text id="SvgjsText1793" font-family="inherit" x="20" y="240.84761904761905" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1794">300</tspan>
                                                                <title>300</title>
                                                            </text>
                                                            <text id="SvgjsText1796" font-family="inherit" x="20" y="292.4761904761905" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1797">200</tspan>
                                                                <title>200</title>
                                                            </text>
                                                            <text id="SvgjsText1799" font-family="inherit" x="20" y="344.1047619047619" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1800">100</tspan>
                                                                <title>100</title>
                                                            </text>
                                                            <text id="SvgjsText1802" font-family="inherit" x="20" y="395.73333333333335" text-anchor="end" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-yaxis-label" style="font-family: inherit">
                                                                <tspan id="SvgjsTspan1803">0</tspan>
                                                                <title>0</title>
                                                            </text>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1598" class="apexcharts-inner apexcharts-graphical" transform="translate(50.5625, 30)">
                                                        <defs id="SvgjsDefs1597">
                                                            <clipPath id="gridRectMaskfoezru7f"><rect id="SvgjsRect1603" width="611.4375" height="365.4" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath>
                                                            <clipPath id="forecastMaskfoezru7f"></clipPath>
                                                            <clipPath id="nonForecastMaskfoezru7f"></clipPath>
                                                            <clipPath id="gridRectMarkerMaskfoezru7f"><rect id="SvgjsRect1604" width="611.4375" height="365.4" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath>
                                                        </defs>
                                                        <rect id="SvgjsRect1602" width="0" height="361.4" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="1" stroke="#b6b6b6" stroke-dasharray="3" fill="#b1b9c4" class="apexcharts-xcrosshairs" y2="361.4" filter="none" fill-opacity="0.9"></rect>
                                                        <line id="SvgjsLine1732" x1="0" y1="361.4" x2="0" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1733" x1="86.77678571428571" y1="361.4" x2="86.77678571428571" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1734" x1="173.55357142857142" y1="361.4" x2="173.55357142857142" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1735" x1="260.3303571428571" y1="361.4" x2="260.3303571428571" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1736" x1="347.10714285714283" y1="361.4" x2="347.10714285714283" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1737" x1="433.88392857142856" y1="361.4" x2="433.88392857142856" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1738" x1="520.6607142857142" y1="361.4" x2="520.6607142857142" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <line id="SvgjsLine1739" x1="607.4374999999999" y1="361.4" x2="607.4374999999999" y2="361.4" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line>
                                                        <g id="SvgjsG1728" class="apexcharts-grid">
                                                            <g id="SvgjsG1729" class="apexcharts-gridlines-horizontal">
                                                                <line id="SvgjsLine1741" x1="0" y1="51.628571428571426" x2="607.4375" y2="51.628571428571426" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1742" x1="0" y1="103.25714285714285" x2="607.4375" y2="103.25714285714285" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1743" x1="0" y1="154.88571428571427" x2="607.4375" y2="154.88571428571427" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1744" x1="0" y1="206.5142857142857" x2="607.4375" y2="206.5142857142857" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1745" x1="0" y1="258.1428571428571" x2="607.4375" y2="258.1428571428571" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1746" x1="0" y1="309.77142857142854" x2="607.4375" y2="309.77142857142854" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG1730" class="apexcharts-gridlines-vertical"></g>
                                                            <line id="SvgjsLine1749" x1="0" y1="361.4" x2="607.4375" y2="361.4" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine1748" x1="0" y1="1" x2="0" y2="361.4" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG1731" class="apexcharts-grid-borders">
                                                            <line id="SvgjsLine1740" x1="0" y1="0" x2="607.4375" y2="0" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            <line id="SvgjsLine1747" x1="0" y1="361.4" x2="607.4375" y2="361.4" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG1607" class="apexcharts-bubble-series apexcharts-plot-series">
                                                            <g id="SvgjsG1608" class="apexcharts-series" zIndex="0" seriesName="SocialxCampaigns" data:longestSeries="false" rel="1" data:realIndex="0">
                                                                <g id="SvgjsG1609" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                                                    <g id="SvgjsG1611" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1612"
                                                                            d="M 108.47098214285714, 206.5142857142857
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="206.5142857142857"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wmv5870f6"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="0"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                        <path
                                                                            id="SvgjsPath1613"
                                                                            d="M 108.47098214285714, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="1"
                                                                            j="1"
                                                                            index="0"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1614" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1615"
                                                                            d="M 108.47098214285714, 206.5142857142857
           m -60.233333333333334, 0
           a 60.233333333333334,60.233333333333334 0 1,0 120.46666666666667,0
           a 60.233333333333334,60.233333333333334 0 1,0 -120.46666666666667,0"
                                                                            fill="rgba(0,106,230,1)"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="206.5142857142857"
                                                                            shape="circle"
                                                                            class="apexcharts-marker"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="0"
                                                                            default-marker-size="60.233333333333334"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1616" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1617"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="2"
                                                                            j="2"
                                                                            index="0"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1618" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1619" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1620"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="3"
                                                                            j="3"
                                                                            index="0"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1621" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1622" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1623"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="4"
                                                                            j="4"
                                                                            index="0"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1624" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1625" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1626"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="5"
                                                                            j="5"
                                                                            index="0"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1627" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path
                                                                            id="SvgjsPath1807"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#006ae6"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker w0qmre9xxf"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG1628" class="apexcharts-series" zIndex="1" seriesName="EmailxNewsletter" data:longestSeries="false" rel="2" data:realIndex="1">
                                                                <g id="SvgjsG1629" class="apexcharts-series-markers-wrap" data:realIndex="1">
                                                                    <g id="SvgjsG1631" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1632"
                                                                            d="M 216.94196428571428, 180.7
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="216.94196428571428"
                                                                            cy="180.7"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wemjejrkj"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="1"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                        <path
                                                                            id="SvgjsPath1633"
                                                                            d="M 108.47098214285714, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="1"
                                                                            j="1"
                                                                            index="1"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1634" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1635"
                                                                            d="M 216.94196428571428, 180.7
           m -52.704166666666666, 0
           a 52.704166666666666,52.704166666666666 0 1,0 105.40833333333333,0
           a 52.704166666666666,52.704166666666666 0 1,0 -105.40833333333333,0"
                                                                            fill="rgba(0,162,97,1)"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="216.94196428571428"
                                                                            cy="180.7"
                                                                            shape="circle"
                                                                            class="apexcharts-marker"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="1"
                                                                            default-marker-size="52.704166666666666"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1636" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1637"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="2"
                                                                            j="2"
                                                                            index="1"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1638" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1639" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1640"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="3"
                                                                            j="3"
                                                                            index="1"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1641" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1642" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1643"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="4"
                                                                            j="4"
                                                                            index="1"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1644" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1645" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1646"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="5"
                                                                            j="5"
                                                                            index="1"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1647" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path
                                                                            id="SvgjsPath1808"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#00a261"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker w6jayigxy"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG1648" class="apexcharts-series" zIndex="2" seriesName="TVxCampaign" data:longestSeries="false" rel="3" data:realIndex="2">
                                                                <g id="SvgjsG1649" class="apexcharts-series-markers-wrap" data:realIndex="2">
                                                                    <g id="SvgjsG1651" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1652"
                                                                            d="M 303.71875, 129.07142857142856
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="303.71875"
                                                                            cy="129.07142857142856"
                                                                            shape="circle"
                                                                            class="apexcharts-marker w8r8tueom"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                        <path
                                                                            id="SvgjsPath1653"
                                                                            d="M 108.47098214285714, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="1"
                                                                            j="1"
                                                                            index="2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1654" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1655"
                                                                            d="M 303.71875, 129.07142857142856
           m -45.175, 0
           a 45.175,45.175 0 1,0 90.35,0
           a 45.175,45.175 0 1,0 -90.35,0"
                                                                            fill="rgba(197,154,0,1)"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="303.71875"
                                                                            cy="129.07142857142856"
                                                                            shape="circle"
                                                                            class="apexcharts-marker"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="2"
                                                                            default-marker-size="45.175"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1656" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1657"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="2"
                                                                            j="2"
                                                                            index="2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1658" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1659" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1660"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="3"
                                                                            j="3"
                                                                            index="2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1661" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1662" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1663"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="4"
                                                                            j="4"
                                                                            index="2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1664" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1665" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1666"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="5"
                                                                            j="5"
                                                                            index="2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1667" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path
                                                                            id="SvgjsPath1809"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#c59a00"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wizso26pkj"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG1668" class="apexcharts-series" zIndex="3" seriesName="GooglexAds" data:longestSeries="false" rel="4" data:realIndex="3">
                                                                <g id="SvgjsG1669" class="apexcharts-series-markers-wrap" data:realIndex="3">
                                                                    <g id="SvgjsG1671" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1672"
                                                                            d="M 390.4955357142857, 232.3285714285714
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="390.4955357142857"
                                                                            cy="232.3285714285714"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wyyqbna7r"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="3"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                        <path
                                                                            id="SvgjsPath1673"
                                                                            d="M 108.47098214285714, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="1"
                                                                            j="1"
                                                                            index="3"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1674" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1675"
                                                                            d="M 390.4955357142857, 232.3285714285714
           m -37.645833333333336, 0
           a 37.645833333333336,37.645833333333336 0 1,0 75.29166666666667,0
           a 37.645833333333336,37.645833333333336 0 1,0 -75.29166666666667,0"
                                                                            fill="rgba(228,40,85,1)"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="390.4955357142857"
                                                                            cy="232.3285714285714"
                                                                            shape="circle"
                                                                            class="apexcharts-marker"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="3"
                                                                            default-marker-size="37.645833333333336"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1676" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1677"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="2"
                                                                            j="2"
                                                                            index="3"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1678" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1679" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1680"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="3"
                                                                            j="3"
                                                                            index="3"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1681" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1682" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1683"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="4"
                                                                            j="4"
                                                                            index="3"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1684" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1685" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1686"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="5"
                                                                            j="5"
                                                                            index="3"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1687" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path
                                                                            id="SvgjsPath1810"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#e42855"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wuh8ck9f2"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG1688" class="apexcharts-series" zIndex="4" seriesName="Courses" data:longestSeries="false" rel="5" data:realIndex="4">
                                                                <g id="SvgjsG1689" class="apexcharts-series-markers-wrap" data:realIndex="4">
                                                                    <g id="SvgjsG1691" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1692"
                                                                            d="M 433.88392857142856, 103.25714285714281
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="433.88392857142856"
                                                                            cy="103.25714285714281"
                                                                            shape="circle"
                                                                            class="apexcharts-marker w5k7i5l4g"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="4"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                        <path
                                                                            id="SvgjsPath1693"
                                                                            d="M 108.47098214285714, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="1"
                                                                            j="1"
                                                                            index="4"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1694" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1695"
                                                                            d="M 433.88392857142856, 103.25714285714281
           m -45.175, 0
           a 45.175,45.175 0 1,0 90.35,0
           a 45.175,45.175 0 1,0 -90.35,0"
                                                                            fill="rgba(136,63,255,1)"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="433.88392857142856"
                                                                            cy="103.25714285714281"
                                                                            shape="circle"
                                                                            class="apexcharts-marker"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="4"
                                                                            default-marker-size="45.175"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1696" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1697"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="2"
                                                                            j="2"
                                                                            index="4"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1698" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1699" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1700"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="3"
                                                                            j="3"
                                                                            index="4"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1701" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1702" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1703"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="4"
                                                                            j="4"
                                                                            index="4"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1704" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1705" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1706"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="5"
                                                                            j="5"
                                                                            index="4"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1707" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path
                                                                            id="SvgjsPath1811"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#883fff"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker woj0dasbz"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG1708" class="apexcharts-series" zIndex="5" seriesName="Radio" data:longestSeries="false" rel="6" data:realIndex="5">
                                                                <g id="SvgjsG1709" class="apexcharts-series-markers-wrap" data:realIndex="5">
                                                                    <g id="SvgjsG1711" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1712"
                                                                            d="M 520.6607142857143, 232.3285714285714
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="520.6607142857143"
                                                                            cy="232.3285714285714"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wht68k9wv"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="5"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                        <path
                                                                            id="SvgjsPath1713"
                                                                            d="M 108.47098214285714, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="108.47098214285714"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="1"
                                                                            j="1"
                                                                            index="5"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1714" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1715"
                                                                            d="M 520.6607142857143, 232.3285714285714
           m -42.163333333333334, 0
           a 42.163333333333334,42.163333333333334 0 1,0 84.32666666666667,0
           a 42.163333333333334,42.163333333333334 0 1,0 -84.32666666666667,0"
                                                                            fill="rgba(67,206,215,1)"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="520.6607142857143"
                                                                            cy="232.3285714285714"
                                                                            shape="circle"
                                                                            class="apexcharts-marker"
                                                                            rel="0"
                                                                            j="0"
                                                                            index="5"
                                                                            default-marker-size="42.163333333333334"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1716" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1717"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="2"
                                                                            j="2"
                                                                            index="5"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1718" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1719" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1720"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="3"
                                                                            j="3"
                                                                            index="5"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1721" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1722" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1723"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="4"
                                                                            j="4"
                                                                            index="5"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1724" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g id="SvgjsG1725" class="" clip-path="url(#gridRectMarkerMaskfoezru7f)">
                                                                        <path
                                                                            id="SvgjsPath1726"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-nullpoint"
                                                                            rel="5"
                                                                            j="5"
                                                                            index="5"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                    <g id="SvgjsG1727" class="apexcharts-series-markers apexcharts-series-bubble" clip-path="url(#gridRectMarkerMaskfoezru7f)"></g>
                                                                    <g class="apexcharts-series-markers">
                                                                        <path
                                                                            id="SvgjsPath1812"
                                                                            d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                            fill="#43ced7"
                                                                            fill-opacity="1"
                                                                            stroke-opacity="0.9"
                                                                            stroke-linecap="butt"
                                                                            stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            cx="0"
                                                                            cy="0"
                                                                            shape="circle"
                                                                            class="apexcharts-marker wzark52du"
                                                                            default-marker-size="0"
                                                                        ></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG1610" class="apexcharts-datalabels" data:realIndex="0"></g>
                                                            <g id="SvgjsG1630" class="apexcharts-datalabels" data:realIndex="1"></g>
                                                            <g id="SvgjsG1650" class="apexcharts-datalabels" data:realIndex="2"></g>
                                                            <g id="SvgjsG1670" class="apexcharts-datalabels" data:realIndex="3"></g>
                                                            <g id="SvgjsG1690" class="apexcharts-datalabels" data:realIndex="4"></g>
                                                            <g id="SvgjsG1710" class="apexcharts-datalabels" data:realIndex="5"></g>
                                                        </g>
                                                        <line id="SvgjsLine1750" x1="0" y1="0" x2="607.4375" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1751" x1="0" y1="0" x2="607.4375" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG1752" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                            <g id="SvgjsG1753" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                                                <text id="SvgjsText1755" font-family="inherit" x="0" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1756">0</tspan>
                                                                    <title>0</title>
                                                                </text>
                                                                <text id="SvgjsText1758" font-family="inherit" x="86.7767857142857" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1759">100</tspan>
                                                                    <title>100</title>
                                                                </text>
                                                                <text id="SvgjsText1761" font-family="inherit" x="173.55357142857142" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1762">200</tspan>
                                                                    <title>200</title>
                                                                </text>
                                                                <text id="SvgjsText1764" font-family="inherit" x="260.33035714285717" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1765">300</tspan>
                                                                    <title>300</title>
                                                                </text>
                                                                <text id="SvgjsText1767" font-family="inherit" x="347.1071428571429" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1768">400</tspan>
                                                                    <title>400</title>
                                                                </text>
                                                                <text id="SvgjsText1770" font-family="inherit" x="433.8839285714286" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1771">500</tspan>
                                                                    <title>500</title>
                                                                </text>
                                                                <text id="SvgjsText1773" font-family="inherit" x="520.6607142857142" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1774">600</tspan>
                                                                    <title>600</title>
                                                                </text>
                                                                <text id="SvgjsText1776" font-family="inherit" x="607.4374999999999" y="389.4" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#636674" class="apexcharts-text apexcharts-xaxis-label" style="font-family: inherit">
                                                                    <tspan id="SvgjsTspan1777">700</tspan>
                                                                    <title>700</title>
                                                                </text>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1804" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG1805" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG1806" class="apexcharts-point-annotations"></g>
                                                        <rect id="SvgjsRect1813" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                        <rect id="SvgjsRect1814" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px"></div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 1">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 106, 230)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 2">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 162, 97)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 3">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(197, 154, 0)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 4">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(228, 40, 85)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 5">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(136, 63, 255)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 6">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(67, 206, 215)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: inherit; font-size: 12px"></div></div>
                                                <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div>
                                            </div>
                                        </div>
                                        <!--end::Chart-->

                                        <!--begin::Items-->
                                        <div class="d-flex flex-wrap pt-5">
                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-primary me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Social Campaigns</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-danger me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Google Ads</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-column me-7 me-lg-16 pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Email Newsletter</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-warning me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Courses</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->

                                            <!--begin::Item-->
                                            <div class="d-flex flex-column pt-sm-3 pt-6">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center mb-3 mb-sm-6">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-info me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">TV Campaign</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-dot bg-success me-2 h-10px w-10px"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Label-->
                                                    <span class="fw-bold text-gray-600 fs-6">Radio</span>
                                                    <!--end::Label-->
                                                </div>
                                                <!--ed::Item-->
                                            </div>
                                            <!--ed::Item-->
                                        </div>
                                        <!--ed::Items-->
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 8-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-12 col-xxl-4">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-10">
                            <!--begin::Col-->
                            <div class="col-md-6 col-xxl-12">
                                <!--begin::Card widget 1-->
                                <div class="card card-flush border-0 h-xl-100" data-bs-theme="light" style="background-color: #22232b">
                                    <!--begin::Header-->
                                    <div class="card-header pt-2">
                                        <!--begin::Title-->
                                        <h3 class="card-title">
                                            <span class="text-white fs-3 fw-bold me-2">Facebook Campaign</span>

                                            <span class="badge badge-success">Active</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon bg-white bg-opacity-10 btn-color-white btn-active-success w-25px h-25px" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                <i class="ki-duotone ki-black-right fs-5"></i>
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                                </div>


                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Ticket </a>
                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Customer </a>
                                                </div>


                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>


                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Admin Group </a>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Contact </a>
                                                </div>


                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-body d-flex justify-content-between flex-column pt-1 px-0 pb-0">
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-wrap px-9 mb-5">
                                            <!--begin::Stat-->
                                            <div class="rounded min-w-125px py-3 px-4 my-1 me-6" style="border: 1px dashed rgba(255, 255, 255, 0.15)">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="text-white fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4368" data-kt-countup-prefix="$">0</div>
                                                </div>
                                                <!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-white opacity-50">New Followers</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->

                                            <!--begin::Stat-->
                                            <div class="rounded min-w-125px py-3 px-4 my-1" style="border: 1px dashed rgba(255, 255, 255, 0.15)">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <div class="text-white fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="120,000">0</div>
                                                </div>
                                                <!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-white opacity-50">Followers Goal</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Wrapper-->

                                        <!--begin::Chart-->
                                        <div id="kt_card_widget_1_chart" data-kt-chart-color="primary" style="height: 105px; min-height: 105px">
                                            <div id="apexchartsepeschfv" class="apexcharts-canvas apexchartsepeschfv apexcharts-theme-" style="width: 351px; height: 105px">
                                                <svg id="SvgjsSvg1815" width="351" height="105" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)">
                                                    <foreignObject x="0" y="0" width="351" height="105"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 52.5px"></div></foreignObject>
                                                    <g id="SvgjsG1821" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG1822" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG1865" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                                    <g id="SvgjsG1817" class="apexcharts-inner apexcharts-graphical" transform="translate(40.05, 10)">
                                                        <defs id="SvgjsDefs1816">
                                                            <clipPath id="gridRectMaskepeschfv"><rect id="SvgjsRect1819" width="328.9" height="101" x="-29" y="-4" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath>
                                                            <clipPath id="forecastMaskepeschfv"></clipPath>
                                                            <clipPath id="nonForecastMaskepeschfv"></clipPath>
                                                            <clipPath id="gridRectMarkerMaskepeschfv"><rect id="SvgjsRect1820" width="274.9" height="97" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath>
                                                        </defs>
                                                        <g id="SvgjsG1844" class="apexcharts-grid">
                                                            <g id="SvgjsG1845" class="apexcharts-gridlines-horizontal" style="display: none">
                                                                <line id="SvgjsLine1848" x1="-15.05" y1="0" x2="285.95" y2="0" stroke="false" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1849" x1="-15.05" y1="93" x2="285.95" y2="93" stroke="false" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG1846" class="apexcharts-gridlines-vertical" style="display: none"></g>
                                                            <line id="SvgjsLine1851" x1="0" y1="93" x2="270.9" y2="93" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine1850" x1="0" y1="1" x2="0" y2="93" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG1847" class="apexcharts-grid-borders" style="display: none"></g>
                                                        <g id="SvgjsG1823" class="apexcharts-bar-series apexcharts-plot-series">
                                                            <g id="SvgjsG1824" class="apexcharts-series" rel="1" seriesName="Sales" data:realIndex="0">
                                                                <path
                                                                    id="SvgjsPath1829"
                                                                    d="M -4.772499999999999 85.001 L -4.772499999999999 66.126 C -4.772499999999999 63.126000000000005 -1.772499999999999 60.126 1.227500000000001 60.126 L 1.227500000000001 60.126 C 3 60.126 4.772499999999999 63.126000000000005 4.772499999999999 66.126 L 4.772499999999999 85.001 C 4.772499999999999 88.001 1.772499999999999 91.001 -1.227500000000001 91.001 L -1.227500000000001 91.001 C -3 91.001 -4.772499999999999 88.001 -4.772499999999999 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M -4.772499999999999 85.001 L -4.772499999999999 66.126 C -4.772499999999999 63.126000000000005 -1.772499999999999 60.126 1.227500000000001 60.126 L 1.227500000000001 60.126 C 3 60.126 4.772499999999999 63.126000000000005 4.772499999999999 66.126 L 4.772499999999999 85.001 C 4.772499999999999 88.001 1.772499999999999 91.001 -1.227500000000001 91.001 L -1.227500000000001 91.001 C -3 91.001 -4.772499999999999 88.001 -4.772499999999999 85.001 Z "
                                                                    pathFrom="M -4.772499999999999 91.001 L -4.772499999999999 91.001 L 4.772499999999999 91.001 L 4.772499999999999 91.001 L 4.772499999999999 91.001 L 4.772499999999999 91.001 L 4.772499999999999 91.001 L -4.772499999999999 91.001 Z"
                                                                    cy="58.125"
                                                                    cx="4.772499999999999"
                                                                    j="0"
                                                                    val="30"
                                                                    barHeight="34.875"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1831"
                                                                    d="M 33.927499999999995 85.001 L 33.927499999999995 13.8135 C 33.927499999999995 10.8135 36.927499999999995 7.8134999999999994 39.927499999999995 7.8134999999999994 L 39.927499999999995 7.8134999999999994 C 41.699999999999996 7.8134999999999994 43.4725 10.8135 43.4725 13.8135 L 43.4725 85.001 C 43.4725 88.001 40.4725 91.001 37.4725 91.001 L 37.4725 91.001 C 35.699999999999996 91.001 33.927499999999995 88.001 33.927499999999995 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 33.927499999999995 85.001 L 33.927499999999995 13.8135 C 33.927499999999995 10.8135 36.927499999999995 7.8134999999999994 39.927499999999995 7.8134999999999994 L 39.927499999999995 7.8134999999999994 C 41.699999999999996 7.8134999999999994 43.4725 10.8135 43.4725 13.8135 L 43.4725 85.001 C 43.4725 88.001 40.4725 91.001 37.4725 91.001 L 37.4725 91.001 C 35.699999999999996 91.001 33.927499999999995 88.001 33.927499999999995 85.001 Z "
                                                                    pathFrom="M 33.927499999999995 91.001 L 33.927499999999995 91.001 L 43.4725 91.001 L 43.4725 91.001 L 43.4725 91.001 L 43.4725 91.001 L 43.4725 91.001 L 33.927499999999995 91.001 Z"
                                                                    cy="5.8125"
                                                                    cx="43.4725"
                                                                    j="1"
                                                                    val="75"
                                                                    barHeight="87.1875"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1833"
                                                                    d="M 72.6275 85.001 L 72.6275 37.063500000000005 C 72.6275 34.063500000000005 75.6275 31.0635 78.6275 31.0635 L 78.6275 31.0635 C 80.4 31.0635 82.1725 34.063500000000005 82.1725 37.063500000000005 L 82.1725 85.001 C 82.1725 88.001 79.1725 91.001 76.1725 91.001 L 76.1725 91.001 C 74.4 91.001 72.6275 88.001 72.6275 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 72.6275 85.001 L 72.6275 37.063500000000005 C 72.6275 34.063500000000005 75.6275 31.0635 78.6275 31.0635 L 78.6275 31.0635 C 80.4 31.0635 82.1725 34.063500000000005 82.1725 37.063500000000005 L 82.1725 85.001 C 82.1725 88.001 79.1725 91.001 76.1725 91.001 L 76.1725 91.001 C 74.4 91.001 72.6275 88.001 72.6275 85.001 Z "
                                                                    pathFrom="M 72.6275 91.001 L 72.6275 91.001 L 82.1725 91.001 L 82.1725 91.001 L 82.1725 91.001 L 82.1725 91.001 L 82.1725 91.001 L 72.6275 91.001 Z"
                                                                    cy="29.0625"
                                                                    cx="82.1725"
                                                                    j="2"
                                                                    val="55"
                                                                    barHeight="63.9375"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1835"
                                                                    d="M 111.3275 85.001 L 111.3275 48.6885 C 111.3275 45.6885 114.3275 42.6885 117.3275 42.6885 L 117.3275 42.6885 C 119.1 42.6885 120.8725 45.6885 120.8725 48.6885 L 120.8725 85.001 C 120.8725 88.001 117.8725 91.001 114.8725 91.001 L 114.8725 91.001 C 113.1 91.001 111.3275 88.001 111.3275 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 111.3275 85.001 L 111.3275 48.6885 C 111.3275 45.6885 114.3275 42.6885 117.3275 42.6885 L 117.3275 42.6885 C 119.1 42.6885 120.8725 45.6885 120.8725 48.6885 L 120.8725 85.001 C 120.8725 88.001 117.8725 91.001 114.8725 91.001 L 114.8725 91.001 C 113.1 91.001 111.3275 88.001 111.3275 85.001 Z "
                                                                    pathFrom="M 111.3275 91.001 L 111.3275 91.001 L 120.8725 91.001 L 120.8725 91.001 L 120.8725 91.001 L 120.8725 91.001 L 120.8725 91.001 L 111.3275 91.001 Z"
                                                                    cy="40.6875"
                                                                    cx="120.8725"
                                                                    j="3"
                                                                    val="45"
                                                                    barHeight="52.3125"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1837"
                                                                    d="M 150.02749999999997 85.001 L 150.02749999999997 66.126 C 150.02749999999997 63.126000000000005 153.02749999999997 60.126 156.02749999999997 60.126 L 156.02749999999997 60.126 C 157.79999999999995 60.126 159.57249999999996 63.126000000000005 159.57249999999996 66.126 L 159.57249999999996 85.001 C 159.57249999999996 88.001 156.57249999999996 91.001 153.57249999999996 91.001 L 153.57249999999996 91.001 C 151.79999999999995 91.001 150.02749999999997 88.001 150.02749999999997 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 150.02749999999997 85.001 L 150.02749999999997 66.126 C 150.02749999999997 63.126000000000005 153.02749999999997 60.126 156.02749999999997 60.126 L 156.02749999999997 60.126 C 157.79999999999995 60.126 159.57249999999996 63.126000000000005 159.57249999999996 66.126 L 159.57249999999996 85.001 C 159.57249999999996 88.001 156.57249999999996 91.001 153.57249999999996 91.001 L 153.57249999999996 91.001 C 151.79999999999995 91.001 150.02749999999997 88.001 150.02749999999997 85.001 Z "
                                                                    pathFrom="M 150.02749999999997 91.001 L 150.02749999999997 91.001 L 159.57249999999996 91.001 L 159.57249999999996 91.001 L 159.57249999999996 91.001 L 159.57249999999996 91.001 L 159.57249999999996 91.001 L 150.02749999999997 91.001 Z"
                                                                    cy="58.125"
                                                                    cx="159.57249999999996"
                                                                    j="4"
                                                                    val="30"
                                                                    barHeight="34.875"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1839"
                                                                    d="M 188.72749999999996 85.001 L 188.72749999999996 31.251 C 188.72749999999996 28.251 191.72749999999996 25.251 194.72749999999996 25.251 L 194.72749999999996 25.251 C 196.49999999999994 25.251 198.27249999999995 28.251 198.27249999999995 31.251 L 198.27249999999995 85.001 C 198.27249999999995 88.001 195.27249999999995 91.001 192.27249999999995 91.001 L 192.27249999999995 91.001 C 190.49999999999994 91.001 188.72749999999996 88.001 188.72749999999996 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 188.72749999999996 85.001 L 188.72749999999996 31.251 C 188.72749999999996 28.251 191.72749999999996 25.251 194.72749999999996 25.251 L 194.72749999999996 25.251 C 196.49999999999994 25.251 198.27249999999995 28.251 198.27249999999995 31.251 L 198.27249999999995 85.001 C 198.27249999999995 88.001 195.27249999999995 91.001 192.27249999999995 91.001 L 192.27249999999995 91.001 C 190.49999999999994 91.001 188.72749999999996 88.001 188.72749999999996 85.001 Z "
                                                                    pathFrom="M 188.72749999999996 91.001 L 188.72749999999996 91.001 L 198.27249999999995 91.001 L 198.27249999999995 91.001 L 198.27249999999995 91.001 L 198.27249999999995 91.001 L 198.27249999999995 91.001 L 188.72749999999996 91.001 Z"
                                                                    cy="23.25"
                                                                    cx="198.27249999999995"
                                                                    j="5"
                                                                    val="60"
                                                                    barHeight="69.75"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1841"
                                                                    d="M 227.42749999999998 85.001 L 227.42749999999998 13.8135 C 227.42749999999998 10.8135 230.42749999999998 7.8134999999999994 233.42749999999998 7.8134999999999994 L 233.42749999999998 7.8134999999999994 C 235.2 7.8134999999999994 236.97249999999997 10.8135 236.97249999999997 13.8135 L 236.97249999999997 85.001 C 236.97249999999997 88.001 233.97249999999997 91.001 230.97249999999997 91.001 L 230.97249999999997 91.001 C 229.2 91.001 227.42749999999998 88.001 227.42749999999998 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 227.42749999999998 85.001 L 227.42749999999998 13.8135 C 227.42749999999998 10.8135 230.42749999999998 7.8134999999999994 233.42749999999998 7.8134999999999994 L 233.42749999999998 7.8134999999999994 C 235.2 7.8134999999999994 236.97249999999997 10.8135 236.97249999999997 13.8135 L 236.97249999999997 85.001 C 236.97249999999997 88.001 233.97249999999997 91.001 230.97249999999997 91.001 L 230.97249999999997 91.001 C 229.2 91.001 227.42749999999998 88.001 227.42749999999998 85.001 Z "
                                                                    pathFrom="M 227.42749999999998 91.001 L 227.42749999999998 91.001 L 236.97249999999997 91.001 L 236.97249999999997 91.001 L 236.97249999999997 91.001 L 236.97249999999997 91.001 L 236.97249999999997 91.001 L 227.42749999999998 91.001 Z"
                                                                    cy="5.8125"
                                                                    cx="236.97249999999997"
                                                                    j="6"
                                                                    val="75"
                                                                    barHeight="87.1875"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <path
                                                                    id="SvgjsPath1843"
                                                                    d="M 266.1275 85.001 L 266.1275 42.876 C 266.1275 39.876 269.1275 36.876 272.1275 36.876 L 272.1275 36.876 C 273.9 36.876 275.6725 39.876 275.6725 42.876 L 275.6725 85.001 C 275.6725 88.001 272.6725 91.001 269.6725 91.001 L 269.6725 91.001 C 267.9 91.001 266.1275 88.001 266.1275 85.001 Z "
                                                                    fill="rgba(0,106,230,0.85)"
                                                                    fill-opacity="1"
                                                                    stroke="transparent"
                                                                    stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskepeschfv)"
                                                                    pathTo="M 266.1275 85.001 L 266.1275 42.876 C 266.1275 39.876 269.1275 36.876 272.1275 36.876 L 272.1275 36.876 C 273.9 36.876 275.6725 39.876 275.6725 42.876 L 275.6725 85.001 C 275.6725 88.001 272.6725 91.001 269.6725 91.001 L 269.6725 91.001 C 267.9 91.001 266.1275 88.001 266.1275 85.001 Z "
                                                                    pathFrom="M 266.1275 91.001 L 266.1275 91.001 L 275.6725 91.001 L 275.6725 91.001 L 275.6725 91.001 L 275.6725 91.001 L 275.6725 91.001 L 266.1275 91.001 Z"
                                                                    cy="34.875"
                                                                    cx="275.6725"
                                                                    j="7"
                                                                    val="50"
                                                                    barHeight="58.125"
                                                                    barWidth="13.544999999999998"
                                                                ></path>
                                                                <g id="SvgjsG1826" class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG1828" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1830" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1832" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1834" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1836" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1838" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1840" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                    <g id="SvgjsG1842" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMaskepeschfv)"></g>
                                                                </g>
                                                                <g id="SvgjsG1827" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                                            </g>
                                                            <g id="SvgjsG1825" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                                        </g>
                                                        <line id="SvgjsLine1852" x1="-15.05" y1="0" x2="285.95" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1853" x1="-15.05" y1="0" x2="285.95" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG1854" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1855" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g>
                                                        <g id="SvgjsG1866" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG1867" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG1868" class="apexcharts-point-annotations"></g>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px"></div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 1">
                                                        <span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 106, 230)"></span>
                                                        <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px">
                                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div>
                                            </div>
                                        </div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card widget 1-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-6 col-xxl-12">
                                <!--begin::List widget 3-->
                                <div class="card card-flush h-xl-100">
                                    <!--begin::Header-->
                                    <div class="card-header pt-5">
                                        <!--begin::Title-->
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bold text-gray-900 fs-3">Channels</span>

                                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Users from all channels</span>
                                        </h3>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Menu-->
                                            <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                            </button>

                                            <!--begin::Menu 2-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                                </div>


                                                <!--begin::Menu separator-->
                                                <div class="separator mb-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Ticket </a>
                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Customer </a>
                                                </div>


                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">New Group</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>


                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Admin Group </a>
                                                        </div>


                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Staff Group </a>
                                                        </div>


                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"> Member Group </a>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"> New Contact </a>
                                                </div>


                                                <!--begin::Menu separator-->
                                                <div class="separator mt-3 opacity-75"></div>
                                                <!--end::Menu separator-->

                                                <div class="menu-item px-3">
                                                    <div class="menu-content px-3 py-3">
                                                        <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-body">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Icon-->
                                                <img src="/assets/media/svg/brand-logos/dribbble-icon-1.svg" class="me-3 w-30px" alt="" />
                                                <!--end::Icon-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Dribbble</a>

                                                    <span class="text-gray-500 fw-semibold d-block fs-6">Community</span>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center w-100 mw-125px">
                                                <!--begin::Progress-->
                                                <div class="progress h-6px w-100 me-2 bg-light-success">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!--end::Progress-->

                                                <!--begin::Value-->
                                                <span class="text-gray-500 fw-semibold"> 65% </span>
                                                <!--end::Value-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-4"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Icon-->
                                                <img src="/assets/media/svg/brand-logos/instagram-2-1.svg" class="me-3 w-30px" alt="" />
                                                <!--end::Icon-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Linked In</a>

                                                    <span class="text-gray-500 fw-semibold d-block fs-6">Social Media</span>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center w-100 mw-125px">
                                                <!--begin::Progress-->
                                                <div class="progress h-6px w-100 me-2 bg-light-warning">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 87%" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!--end::Progress-->

                                                <!--begin::Value-->
                                                <span class="text-gray-500 fw-semibold"> 87% </span>
                                                <!--end::Value-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-4"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Icon-->
                                                <img src="/assets/media/svg/brand-logos/slack-icon.svg" class="me-3 w-30px" alt="" />
                                                <!--end::Icon-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Slack</a>

                                                    <span class="text-gray-500 fw-semibold d-block fs-6">Messanger</span>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center w-100 mw-125px">
                                                <!--begin::Progress-->
                                                <div class="progress h-6px w-100 me-2 bg-light-primary">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 44%" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!--end::Progress-->

                                                <!--begin::Value-->
                                                <span class="text-gray-500 fw-semibold"> 44% </span>
                                                <!--end::Value-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->

                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-4"></div>
                                        <!--end::Separator-->

                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Wrapper-->
                                            <div class="d-flex align-items-center me-3">
                                                <!--begin::Icon-->
                                                <img src="/assets/media/svg/brand-logos/google-icon.svg" class="me-3 w-30px" alt="" />
                                                <!--end::Icon-->

                                                <!--begin::Section-->
                                                <div class="flex-grow-1">
                                                    <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bold lh-0">Google</a>

                                                    <span class="text-gray-500 fw-semibold d-block fs-6">SEO &amp; PPC</span>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Statistics-->
                                            <div class="d-flex align-items-center w-100 mw-125px">
                                                <!--begin::Progress-->
                                                <div class="progress h-6px w-100 me-2 bg-light-info">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!--end::Progress-->

                                                <!--begin::Value-->
                                                <span class="text-gray-500 fw-semibold"> 70% </span>
                                                <!--end::Value-->
                                            </div>
                                            <!--end::Statistics-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List widget 3-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xl-12 col-xxl-8 mb-5 mb-xl-10">
                        <!--begin::Table Widget 3-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card header-->
                            <div class="card-header py-7">
                                <!--begin::Tabs-->
                                <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0" data-kt-table-widget-3="tabs_nav">
                                    <!--begin::Tab item-->
                                    <div class="fs-4 fw-bold pb-3 border-bottom border-3 border-primary cursor-pointer" data-kt-table-widget-3="tab" data-kt-table-widget-3-value="Show All">All Campaigns (47)</div>
                                    <!--end::Tab item-->

                                    <!--begin::Tab item-->
                                    <div class="fs-4 fw-bold text-muted pb-3 cursor-pointer" data-kt-table-widget-3="tab" data-kt-table-widget-3-value="Pending">Pending (8)</div>
                                    <!--end::Tab item-->

                                    <!--begin::Tab item-->
                                    <div class="fs-4 fw-bold text-muted pb-3 cursor-pointer" data-kt-table-widget-3="tab" data-kt-table-widget-3-value="Completed">Completed (39)</div>
                                    <!--end::Tab item-->
                                </div>
                                <!--end::Tabs-->

                                <!--begin::Create campaign button-->
                                <div class="card-toolbar">
                                    <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Create Campaign</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-1">
                                <!--begin::Sort & Filter-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Sort-->
                                    <div class="d-flex align-items-center flex-wrap gap-3 gap-xl-9">
                                        <!--begin::Type-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Label-->
                                            <div class="text-muted fs-7">Type</div>
                                            <!--end::Label-->

                                            <!--begin::Select-->
                                            <select
                                                class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                                data-hide-search="true"
                                                data-control="select2"
                                                data-dropdown-css-class="w-150px"
                                                data-placeholder="Select an option"
                                                data-select2-id="select2-data-7-2390"
                                                tabindex="-1"
                                                aria-hidden="true"
                                                data-kt-initialized="1"
                                            >
                                                <option></option>
                                                <option value="Show All" selected="" data-select2-id="select2-data-9-sbjc">Show All</option>
                                                <option value="Newest">Newest</option>
                                                <option value="oldest">Oldest</option></select
                                            ><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-u917" style="width: 100%"
                                                ><span class="selection"
                                                    ><span
                                                        class="select2-selection select2-selection--single form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        role="combobox"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        tabindex="0"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-gtnc-container"
                                                        aria-controls="select2-gtnc-container"
                                                        ><span class="select2-selection__rendered" id="select2-gtnc-container" role="textbox" aria-readonly="true" title="Show All">Show All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span
                                                ><span class="dropdown-wrapper" aria-hidden="true"></span
                                            ></span>
                                            <!--end::Select-->
                                        </div>
                                        <!--end::Type-->

                                        <!--begin::Status-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Label-->
                                            <div class="text-muted fs-7 me-2">Status</div>
                                            <!--end::Label-->

                                            <!--begin::Select-->
                                            <select
                                                class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                                data-hide-search="true"
                                                data-control="select2"
                                                data-dropdown-css-class="w-150px"
                                                data-placeholder="Select an option"
                                                data-kt-table-widget-3="filter_status"
                                                data-select2-id="select2-data-10-8uv8"
                                                tabindex="-1"
                                                aria-hidden="true"
                                                data-kt-initialized="1"
                                            >
                                                <option></option>
                                                <option value="Show All" selected="" data-select2-id="select2-data-12-0347">Show All</option>
                                                <option value="Live Now">Live Now</option>
                                                <option value="Reviewing">Reviewing</option>
                                                <option value="Paused">Paused</option></select
                                            ><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-i48y" style="width: 100%"
                                                ><span class="selection"
                                                    ><span
                                                        class="select2-selection select2-selection--single form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        role="combobox"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        tabindex="0"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-10uo-container"
                                                        aria-controls="select2-10uo-container"
                                                        ><span class="select2-selection__rendered" id="select2-10uo-container" role="textbox" aria-readonly="true" title="Show All">Show All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span
                                                ><span class="dropdown-wrapper" aria-hidden="true"></span
                                            ></span>
                                            <!--end::Select-->
                                        </div>
                                        <!--begin::Status-->

                                        <!--begin::Budget-->
                                        <div class="d-flex align-items-center fw-bold">
                                            <!--begin::Label-->
                                            <div class="text-muted me-2">Budget</div>
                                            <!--end::Label-->

                                            <!--begin::Select-->
                                            <select
                                                class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                                data-hide-search="true"
                                                data-dropdown-css-class="w-150px"
                                                data-control="select2"
                                                data-placeholder="Select an option"
                                                data-kt-table-widget-3="filter_status"
                                                data-select2-id="select2-data-13-jfb0"
                                                tabindex="-1"
                                                aria-hidden="true"
                                                data-kt-initialized="1"
                                            >
                                                <option></option>
                                                <option value="Show All" selected="" data-select2-id="select2-data-15-s10h">Show All</option>
                                                <option value="&lt;5000">Less than $5,000</option>
                                                <option value="5000-10000">$5,001 - $10,000</option>
                                                <option value="&gt;10000">More than $10,001</option></select
                                            ><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-t4vz" style="width: 100%"
                                                ><span class="selection"
                                                    ><span
                                                        class="select2-selection select2-selection--single form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                        role="combobox"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                        tabindex="0"
                                                        aria-disabled="false"
                                                        aria-labelledby="select2-yq48-container"
                                                        aria-controls="select2-yq48-container"
                                                        ><span class="select2-selection__rendered" id="select2-yq48-container" role="textbox" aria-readonly="true" title="Show All">Show All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span
                                                ><span class="dropdown-wrapper" aria-hidden="true"></span
                                            ></span>
                                            <!--end::Select-->
                                        </div>
                                        <!--begin::Budget-->
                                    </div>
                                    <!--end::Sort-->

                                    <!--begin::Filter-->
                                    <div class="d-flex align-items-center gap-4">
                                        <!--begin::Filter button-->
                                        <a href="#" class="text-hover-primary ps-4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-filter fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </a>

                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6867c8dfae394">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>

                                            <!--begin::Menu separator-->
                                            <div class="separator border-gray-200"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Form-->
                                            <div class="px-7 py-5">
                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Status:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Input-->
                                                    <div>
                                                        <select
                                                            class="form-select form-select-solid select2-hidden-accessible"
                                                            multiple=""
                                                            data-kt-select2="true"
                                                            data-close-on-select="false"
                                                            data-placeholder="Select option"
                                                            data-dropdown-parent="#kt_menu_6867c8dfae394"
                                                            data-allow-clear="true"
                                                            data-select2-id="select2-data-16-2nam"
                                                            tabindex="-1"
                                                            aria-hidden="true"
                                                            data-kt-initialized="1"
                                                        >
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option></select
                                                        ><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-6gun" style="width: 100%"
                                                            ><span class="selection"
                                                                ><span class="select2-selection select2-selection--multiple form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"
                                                                    ><ul class="select2-selection__rendered" id="select2-zole-container"></ul>
                                                                    <span class="select2-search select2-search--inline">
                                                                        <textarea
                                                                            class="select2-search__field"
                                                                            type="search"
                                                                            tabindex="0"
                                                                            autocorrect="off"
                                                                            autocapitalize="none"
                                                                            spellcheck="false"
                                                                            role="searchbox"
                                                                            aria-autocomplete="list"
                                                                            autocomplete="off"
                                                                            aria-label="Search"
                                                                            aria-describedby="select2-zole-container"
                                                                            placeholder="Select option"
                                                                            style="width: 100%"
                                                                        ></textarea></span></span></span
                                                            ><span class="dropdown-wrapper" aria-hidden="true"></span
                                                        ></span>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Member Type:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Options-->
                                                    <div class="d-flex">
                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                            <input class="form-check-input" type="checkbox" value="1" />
                                                            <span class="form-check-label"> Author </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                            <span class="form-check-label"> Customer </span>
                                                        </label>
                                                        <!--end::Options-->
                                                    </div>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10">
                                                    <!--begin::Label-->
                                                    <label class="form-label fw-semibold">Notifications:</label>
                                                    <!--end::Label-->

                                                    <!--begin::Switch-->
                                                    <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="" name="notifications" checked="" />
                                                        <label class="form-check-label"> Enabled </label>
                                                    </div>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Actions-->
                                                <div class="d-flex justify-content-end">
                                                    <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>

                                                    <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Menu 1-->
                                        <!--end::Filter button-->
                                    </div>
                                    <!--end::Filter-->
                                </div>
                                <!--end::Sort & Filter-->

                                <!--begin::Seprator-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--end::Seprator-->

                                <!--begin::Table-->
                                <div id="kt_widget_table_3_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                    <div id="" class="table-responsive">
                                        <table id="kt_widget_table_3" class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable" data-kt-table-widget-3="all" style="width: 100%">
                                            <colgroup>
                                                <col data-dt-column="0" style="width: 130.312px" />
                                                <col data-dt-column="1" style="width: 125.828px" />
                                                <col data-dt-column="2" style="width: 87.4844px" />
                                                <col data-dt-column="3" style="width: 93.1953px" />
                                                <col data-dt-column="4" style="width: 98.3516px" />
                                                <col data-dt-column="5" style="width: 91.5625px" />
                                                <col data-dt-column="6" style="width: 34.7656px" />
                                            </colgroup>
                                            <thead class="d-none">
                                                <tr role="row">
                                                    <th data-dt-column="0" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Campaign: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Campaign</span><span class="dt-column-order"></span></th>
                                                    <th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Platforms: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Platforms</span><span class="dt-column-order"></span></th>
                                                    <th data-dt-column="2" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th>
                                                    <th data-dt-column="3" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Team: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Team</span><span class="dt-column-order"></span></th>
                                                    <th data-dt-column="4" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                                                    <th data-dt-column="5" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Progress: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Progress</span><span class="dt-column-order"></span></th>
                                                    <th data-dt-column="6" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Action: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Action</span><span class="dt-column-order"></span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-info"></div>
                                                            <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Happy Christmas</a>
                                                            <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!--begin::Icons-->
                                                        <div class="d-flex gap-2 mb-2">
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/facebook-4.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/linkedin-2.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                                            </a>
                                                        </div>
                                                        <!--end::Icons-->

                                                        <div class="fs-7 text-muted fw-bold">Labor 24 - 35 years</div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Live Now</span>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-6.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-5.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-25.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-9.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">E</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Member-->

                                                            <!--begin::More members-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-dark">
                                                                    <span class="fs-8 text-inverse-dark">+0</span>
                                                                </div>
                                                            </div>
                                                            <!--end::More members-->
                                                        </div>
                                                        <!--end::Team members-->

                                                        <div class="fs-7 fw-bold text-muted">Team Members</div>
                                                    </td>
                                                    <td class="min-w-150px">
                                                        <div class="mb-2 fw-bold">24 Dec 21 - 06 Jan 22</div>
                                                        <div class="fs-7 fw-bold text-muted">Date range</div>
                                                    </td>
                                                    <td class="d-none">Pending</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-warning"></div>
                                                            <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Halloween</a>
                                                            <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!--begin::Icons-->
                                                        <div class="d-flex gap-2 mb-2">
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                                            </a>
                                                        </div>
                                                        <!--end::Icons-->

                                                        <div class="fs-7 text-muted fw-bold">Labor 37 - 52 years</div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-primary">Reviewing</span>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-1.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-25.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-6.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                        </div>
                                                        <!--end::Team members-->

                                                        <div class="fs-7 fw-bold text-muted">Team Members</div>
                                                    </td>
                                                    <td class="min-w-150px">
                                                        <div class="mb-2 fw-bold">03 Feb 22 - 14 Feb 22</div>
                                                        <div class="fs-7 fw-bold text-muted">Date range</div>
                                                    </td>
                                                    <td class="d-none">Completed</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-success"></div>
                                                            <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Cyber Monday</a>
                                                            <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!--begin::Icons-->
                                                        <div class="d-flex gap-2 mb-2">
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/facebook-4.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                                            </a>
                                                        </div>
                                                        <!--end::Icons-->

                                                        <div class="fs-7 text-muted fw-bold">Labor 24 - 38 years</div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Live Now</span>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-danger">
                                                                    <span class="fs-7 text-inverse-danger">M</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-6.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-primary">
                                                                    <span class="fs-7 text-inverse-primary">N</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-13.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                        </div>
                                                        <!--end::Team members-->

                                                        <div class="fs-7 fw-bold text-muted">Team Members</div>
                                                    </td>
                                                    <td class="min-w-150px">
                                                        <div class="mb-2 fw-bold">19 Mar 22 - 04 Apr 22</div>
                                                        <div class="fs-7 fw-bold text-muted">Date range</div>
                                                    </td>
                                                    <td class="d-none">Pending</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-danger"></div>
                                                            <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Thanksgiving</a>
                                                            <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!--begin::Icons-->
                                                        <div class="d-flex gap-2 mb-2">
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/linkedin-2.svg" class="w-20px" alt="" />
                                                            </a>
                                                        </div>
                                                        <!--end::Icons-->

                                                        <div class="fs-7 text-muted fw-bold">Labor 24 - 38 years</div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-warning">Paused</span>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-6.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-25.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-1.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-primary">
                                                                    <span class="fs-7 text-inverse-primary">N</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-5.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->

                                                            <!--begin::More members-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-dark">
                                                                    <span class="fs-8 text-inverse-dark">+0</span>
                                                                </div>
                                                            </div>
                                                            <!--end::More members-->
                                                        </div>
                                                        <!--end::Team members-->

                                                        <div class="fs-7 fw-bold text-muted">Team Members</div>
                                                    </td>
                                                    <td class="min-w-150px">
                                                        <div class="mb-2 fw-bold">20 Jun 22 - 30 Jun 22</div>
                                                        <div class="fs-7 fw-bold text-muted">Date range</div>
                                                    </td>
                                                    <td class="d-none">Pending</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-primary"></div>
                                                            <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Happy Mother's Day</a>
                                                            <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!--begin::Icons-->
                                                        <div class="d-flex gap-2 mb-2">
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                                            </a>
                                                        </div>
                                                        <!--end::Icons-->

                                                        <div class="fs-7 text-muted fw-bold">Labor 30 - 40 years</div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-warning">Paused</span>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-23.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-13.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                        </div>
                                                        <!--end::Team members-->

                                                        <div class="fs-7 fw-bold text-muted">Team Members</div>
                                                    </td>
                                                    <td class="min-w-150px">
                                                        <div class="mb-2 fw-bold">01 Aug 22 - 01 Sep 22</div>
                                                        <div class="fs-7 fw-bold text-muted">Date range</div>
                                                    </td>
                                                    <td class="d-none">Completed</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-175px">
                                                        <div class="position-relative ps-6 pe-3 py-2">
                                                            <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-success"></div>
                                                            <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Team Getaway</a>
                                                            <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!--begin::Icons-->
                                                        <div class="d-flex gap-2 mb-2">
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                                            </a>
                                                            <a href="#">
                                                                <img src="/assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                                            </a>
                                                        </div>
                                                        <!--end::Icons-->

                                                        <div class="fs-7 text-muted fw-bold">Labor 24 - 38 years</div>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-light-success">Live Now</span>
                                                    </td>
                                                    <td class="min-w-125px">
                                                        <!--begin::Team members-->
                                                        <div class="symbol-group symbol-hover mb-1">
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-6.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <img src="/assets/media/avatars/300-13.jpg" alt="" />
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-primary">
                                                                    <span class="fs-7 text-inverse-primary">N</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Member-->
                                                            <!--begin::Member-->
                                                            <div class="symbol symbol-circle symbol-25px">
                                                                <div class="symbol-label bg-info">
                                                                    <span class="fs-7 text-inverse-info">A</span>
                                                                </div>
                                                            </div>
                                                            <!--end::Member-->
                                                        </div>
                                                        <!--end::Team members-->

                                                        <div class="fs-7 fw-bold text-muted">Team Members</div>
                                                    </td>
                                                    <td class="min-w-150px">
                                                        <div class="mb-2 fw-bold">24 Jul 22 - 26 Jul 22</div>
                                                        <div class="fs-7 fw-bold text-muted">Date range</div>
                                                    </td>
                                                    <td class="d-none">Completed</td>
                                                    <td class="text-end">
                                                        <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                                            <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <!--end::Table-->
                                            <tfoot></tfoot>
                                        </table>
                                    </div>
                                    <div id="" class="row">
                                        <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                        <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                                    </div>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Table Widget 3-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::Engage widget 1-->
                        <div class="card h-xl-100" dir="ltr">
                            <div class="card-body d-flex flex-column flex-center">
                                <!--begin::Heading-->
                                <div class="mb-2">
                                    <!--begin::Title-->
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">
                                        Have you tried <br />
                                        new
                                        <span class="fw-bolder"> Mobile Application ?</span>
                                    </h1>
                                    <!--end::Title-->

                                    <!--begin::Illustration-->
                                    <div class="py-10 text-center">
                                        <img src="/assets/media/svg/illustrations/easy/1.svg" class="theme-light-show w-200px" alt="" />
                                        <img src="/assets/media/svg/illustrations/easy/1-dark.svg" class="theme-dark-show w-200px" alt="" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Links-->
                                <div class="text-center mb-1">
                                    <!--begin::Link-->
                                    <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_new_card" data-bs-toggle="modal"> Try now </a>
                                    <!--end::Link-->

                                    <!--begin::Link-->
                                    <a class="btn btn-sm btn-light" href="/pages/user-profile/followers.html"> Learn more </a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Links-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Engage widget 1-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-xl-8">
                        <!--begin::Timeline Widget 1-->
                        <div class="card card-flush h-xl-100">
                            <!--begin::Card header-->
                            <div class="card-header pt-5">
                                <!--begin::Card title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">Team Schedule</span>

                                    <span class="text-gray-500 pt-2 fw-semibold fs-6">49 Acual Tasks</span>
                                </h3>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Tabs-->
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_day" aria-selected="true" role="tab">Day</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_week" aria-selected="false" tabindex="-1" role="tab">Week</a>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1" data-kt-timeline-widget-1="tab" data-bs-toggle="tab" href="#kt_timeline_widget_1_tab_month" aria-selected="false" tabindex="-1" role="tab">Month</a>
                                        </li>
                                    </ul>
                                    <!--end::Tabs-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pb-0">
                                <!--begin::Tab content-->
                                <div class="tab-content">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane active blockui" id="kt_timeline_widget_1_tab_day" role="tabpanel" aria-labelledby="day-tab" data-kt-timeline-widget-1-blockui="true" style="">
                                        <div class="table-responsive pb-10">
                                            <!--begin::Timeline-->
                                            <div id="kt_timeline_widget_1_1" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-1-image-root="/assets/media/" style="position: relative">
                                                <div class="vis-timeline vis-bottom vis-ltr" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); visibility: visible; height: 354px">
                                                    <div class="vis-panel vis-background" style="height: 354px; width: 700px; left: 0px; top: 0px"></div>
                                                    <div class="vis-panel vis-background vis-vertical" style="height: 354px; width: 573px; left: 129px; top: 0px">
                                                        <div class="vis-axis" style="top: 304px; left: 0px">
                                                            <div class="vis-group"></div>
                                                            <div class="vis-group"></div>
                                                            <div class="vis-group"></div>
                                                            <div class="vis-group"></div>
                                                        </div>
                                                        <div class="vis-time-axis vis-background">
                                                            <div class="vis-grid vis-vertical vis-minor vis-h15 vis-today vis-odd" style="width: 184.333px; height: 330px; transform: translate(-77.3471px, -1px)"></div>
                                                            <div class="vis-grid vis-vertical vis-minor vis-h16 vis-today vis-even" style="width: 184.333px; height: 330px; transform: translate(106.986px, -1px)"></div>
                                                            <div class="vis-grid vis-vertical vis-minor vis-h17 vis-today vis-odd" style="width: 184.333px; height: 330px; transform: translate(291.32px, -1px)"></div>
                                                            <div class="vis-grid vis-vertical vis-minor vis-h18 vis-today vis-even" style="width: 184.333px; height: 330px; transform: translate(475.653px, -1px)"></div>
                                                        </div>
                                                    </div>
                                                    <div class="vis-panel vis-background vis-horizontal" style="height: 305px; width: 700px; left: 0px; top: -1px"></div>
                                                    <div class="vis-panel vis-center" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); height: 305px; width: 573px; left: 128px; top: -1px">
                                                        <div class="vis-content" style="left: 0px; transform: translateY(0px)">
                                                            <div class="vis-itemset" style="height: 303px">
                                                                <div class="vis-background">
                                                                    <div class="vis-group" style="height: 0px"><div style="visibility: hidden; position: absolute"></div></div>
                                                                    <div class="vis-group" style="height: 75px"><div style="visibility: hidden; position: absolute"></div></div>
                                                                    <div class="vis-group" style="height: 75px"><div style="visibility: hidden; position: absolute"></div></div>
                                                                    <div class="vis-group" style="height: 75px"><div style="visibility: hidden; position: absolute"></div></div>
                                                                    <div class="vis-group" style="height: 78px"><div style="visibility: hidden; position: absolute"></div></div>
                                                                </div>
                                                                <div class="vis-foreground">
                                                                    <div class="vis-group" style="height: 75px">
                                                                        <div class="vis-item vis-range vis-readonly" style="transform: translateX(10px); width: 276.5px; top: 17.5px">
                                                                            <div class="vis-item-overflow">
                                                                                <div class="vis-item-content" style="transform: translateX(0px)">
                                                                                    <div class="rounded-pill bg-light-primary d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                        <div class="position-absolute rounded-pill d-block bg-primary start-0 top-0 h-100 z-index-1" style="width: 60%"></div>

                                                                                        <div class="d-flex align-items-center position-relative z-index-2">
                                                                                            <div class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-6.jpg" /></div>
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-1.jpg" /></div>
                                                                                            </div>

                                                                                            <a href="#" class="fw-bold text-white text-hover-dark">Meeting</a>
                                                                                        </div>

                                                                                        <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">60%</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vis-item-visible-frame"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-group" style="height: 75px">
                                                                        <div class="vis-item vis-range vis-readonly" style="transform: translateX(194.333px); width: 184.333px; top: 17.5px">
                                                                            <div class="vis-item-overflow">
                                                                                <div class="vis-item-content" style="transform: translateX(0px)">
                                                                                    <div class="rounded-pill bg-light-success d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                        <div class="position-absolute rounded-pill d-block bg-success start-0 top-0 h-100 z-index-1" style="width: 47%"></div>

                                                                                        <div class="d-flex align-items-center position-relative z-index-2">
                                                                                            <div class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-2.jpg" /></div>
                                                                                            </div>

                                                                                            <a href="#" class="fw-bold text-white text-hover-dark">Testing</a>
                                                                                        </div>

                                                                                        <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">47%</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vis-item-visible-frame"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-group" style="height: 75px">
                                                                        <div class="vis-item vis-range vis-readonly" style="transform: translateX(102.167px); width: 368.667px; top: 17.5px">
                                                                            <div class="vis-item-overflow">
                                                                                <div class="vis-item-content" style="transform: translateX(0px)">
                                                                                    <div class="rounded-pill bg-light-danger d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                        <div class="position-absolute rounded-pill d-block bg-danger start-0 top-0 h-100 z-index-1" style="width: 55%"></div>

                                                                                        <div class="d-flex align-items-center position-relative z-index-2">
                                                                                            <div class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-5.jpg" /></div>
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-20.jpg" /></div>
                                                                                            </div>

                                                                                            <a href="#" class="fw-bold text-white text-hover-dark">Landing page</a>
                                                                                        </div>

                                                                                        <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">55%</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vis-item-visible-frame"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="vis-group" style="height: 78px">
                                                                        <div class="vis-item vis-range vis-readonly" style="transform: translateX(286.5px); width: 276.5px; top: 18px">
                                                                            <div class="vis-item-overflow">
                                                                                <div class="vis-item-content" style="transform: translateX(0px)">
                                                                                    <div class="rounded-pill bg-light-info d-flex align-items-center position-relative h-40px w-100 p-2 overflow-hidden">
                                                                                        <div class="position-absolute rounded-pill d-block bg-info start-0 top-0 h-100 z-index-1" style="width: 75%"></div>

                                                                                        <div class="d-flex align-items-center position-relative z-index-2">
                                                                                            <div class="symbol-group symbol-hover flex-nowrap me-3">
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-23.jpg" /></div>
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-12.jpg" /></div>
                                                                                                <div class="symbol symbol-circle symbol-25px"><img alt="" src="/assets/media/avatars/300-9.jpg" /></div>
                                                                                            </div>

                                                                                            <a href="#" class="fw-bold text-white text-hover-dark">Products module</a>
                                                                                        </div>

                                                                                        <div class="d-flex flex-center bg-body rounded-pill fs-7 fw-bolder ms-auto h-100 px-3 position-relative z-index-2">75%</div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="vis-item-visible-frame"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="vis-shadow vis-top" style="visibility: hidden"></div>
                                                        <div class="vis-shadow vis-bottom" style="visibility: hidden"></div>
                                                    </div>
                                                    <div class="vis-panel vis-left" style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); height: 305px; left: 0px; top: -1px">
                                                        <div class="vis-content" style="left: 0px; top: 0px">
                                                            <div class="vis-labelset">
                                                                <div class="vis-label vis-group-level-0" title="" style="height: 75px"><div class="vis-inner">Research</div></div>
                                                                <div class="vis-label vis-group-level-0" title="" style="height: 75px"><div class="vis-inner">Phase 2.6 QA</div></div>
                                                                <div class="vis-label vis-group-level-0" title="" style="height: 75px"><div class="vis-inner">UI Design</div></div>
                                                                <div class="vis-label vis-group-level-0" title="" style="height: 78px"><div class="vis-inner">Development</div></div>
                                                            </div>
                                                        </div>
                                                        <div class="vis-shadow vis-top" style="visibility: hidden"></div>
                                                        <div class="vis-shadow vis-bottom" style="visibility: hidden"></div>
                                                    </div>
                                                    <div class="vis-panel vis-right" style="height: 305px; left: 701px; top: -1px">
                                                        <div class="vis-content" style="left: 0px; top: 0px"></div>
                                                        <div class="vis-shadow vis-top" style="visibility: hidden"></div>
                                                        <div class="vis-shadow vis-bottom" style="visibility: hidden"></div>
                                                    </div>
                                                    <div class="vis-panel vis-top" style="width: 573px; left: 128px; top: 0px"></div>
                                                    <div class="vis-panel vis-bottom" style="width: 573px; left: 128px; top: 304px">
                                                        <div class="vis-time-axis vis-foreground" style="height: 50px">
                                                            <div class="vis-text vis-minor vis-measure" style="position: absolute">0</div>
                                                            <div class="vis-text vis-major vis-measure" style="position: absolute">0</div>
                                                            <div class="vis-text vis-minor vis-h15 vis-today vis-odd" style="transform: translate(-76.8471px, 0px); width: 184.333px">15:00</div>
                                                            <div class="vis-text vis-minor vis-h16 vis-today vis-even" style="transform: translate(107.486px, 0px); width: 184.333px">16:00</div>
                                                            <div class="vis-text vis-minor vis-h17 vis-today vis-odd" style="transform: translate(291.82px, 0px); width: 184.333px">17:00</div>
                                                            <div class="vis-text vis-minor vis-h18 vis-today vis-even" style="transform: translate(476.153px, 0px); width: 184.333px">18:00</div>
                                                            <div class="vis-text vis-major vis-h18 vis-today vis-even" style="transform: translate(0px, 25px)"><div>Cum 4 Temmuz</div></div>
                                                        </div>
                                                    </div>
                                                    <div class="vis-rolling-mode-btn" style="visibility: hidden"></div>
                                                </div>
                                            </div>
                                            <!--end::Timeline-->
                                        </div>
                                    </div>
                                    <!--end::Tab pane-->

                                    <!--begin::Tab pane-->
                                    <div class="tab-pane blockui" id="kt_timeline_widget_1_tab_week" role="tabpanel" aria-labelledby="week-tab" data-kt-timeline-widget-1-blockui="true" style="overflow: hidden">
                                        <div class="table-responsive pb-10">
                                            <!--begin::Timeline-->
                                            <div id="kt_timeline_widget_1_2" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-1-image-root="/assets/media/"></div>
                                            <!--end::Timeline-->
                                        </div>
                                        <div class="blockui-overlay bg-body" style="z-index: 1"><span class="spinner-border text-primary"></span></div>
                                    </div>
                                    <!--end::Tab pane-->

                                    <!--begin::Tab pane-->
                                    <div class="tab-pane blockui" id="kt_timeline_widget_1_tab_month" role="tabpanel" aria-labelledby="month-tab" data-kt-timeline-widget-1-blockui="true" style="overflow: hidden">
                                        <div class="table-responsive pb-10">
                                            <!--begin::Timeline-->
                                            <div id="kt_timeline_widget_1_3" class="vis-timeline-custom h-350px min-w-700px" data-kt-timeline-widget-1-image-root="/assets/media/"></div>
                                            <!--end::Timeline-->
                                        </div>
                                        <div class="blockui-overlay bg-body" style="z-index: 1"><span class="spinner-border text-primary"></span></div>
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Timeline Widget 1-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->

    <!--begin::Footer-->
    <div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3">
        <!--begin::Copyright-->
        <div class="text-gray-900 order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2025©</span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
        </div>
        <!--end::Copyright-->

        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item"><a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a></li>

            <li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a></li>

            <li class="menu-item"><a href="https://keenthemes.com/products" target="_blank" class="menu-link px-2">Purchase</a></li>
        </ul>
    </div>
    <!--end::Footer-->
</div>

@endsection
@section('page-scripts')
<script src="{{ asset('plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/auth-modal.js') }}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/form.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/tr.js"></script>
@endsection
