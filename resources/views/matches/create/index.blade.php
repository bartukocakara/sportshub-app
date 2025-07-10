@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Apps
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Projects
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700">
                                View Project
                            </li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->

                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            View Project
                        </h1>
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->

                    <!--begin::Actions-->
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                        Create Project
                    </a>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Navbar-->
                <div class="card mb-6 mb-xl-9">
                    <div class="card-body pt-9 pb-0">
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                            <!--begin::Image-->
                            <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                                <img class="mw-50px mw-lg-75px" src="/assets/media/svg/brand-logos/volicity-9.svg" alt="image" />
                            </div>
                            <!--end::Image-->

                            <!--begin::Wrapper-->
                            <div class="flex-grow-1">
                                <!--begin::Head-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Status-->
                                        <div class="d-flex align-items-center mb-1">
                                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">CRM Dashboard</a>
                                            <span class="badge badge-light-success me-auto">In Progress</span>
                                        </div>
                                        <!--end::Status-->

                                        <!--begin::Description-->
                                        <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                            #1 Tool to get started with Web Apps any Kind &amp; size
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Actions-->
                                    <div class="d-flex mb-4">
                                        <a href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add User</a>

                                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add Target</a>

                                        <!--begin::Menu-->
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                            </button>

                                            <!--begin::Menu 3-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                <!--begin::Heading-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                        Payments
                                                    </div>
                                                </div>
                                                <!--end::Heading-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Create Invoice
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">
                                                        Create Payment

                                                        <span
                                                            class="ms-2"
                                                            data-bs-toggle="tooltip"
                                                            aria-label="Specify a target name for future usage and reference"
                                                            data-bs-original-title="Specify a target name for future usage and reference"
                                                            data-kt-initialized="1"
                                                        >
                                                            <i class="ki-duotone ki-information fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        </span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">
                                                        Generate Bill
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>

                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Plans
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Billing
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Statements
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu separator-->
                                                        <div class="separator my-2"></div>
                                                        <!--end::Menu separator-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <!--begin::Switch-->
                                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                                    <!--begin::Input-->
                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
                                                                    <!--end::Input-->

                                                                    <!--end::Label-->
                                                                    <span class="form-check-label text-muted fs-6">
                                                                        Recuring
                                                                    </span>
                                                                    <!--end::Label-->
                                                                </label>
                                                                <!--end::Switch-->
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu sub-->
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">
                                                        Settings
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu 3-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Head-->

                                <!--begin::Info-->
                                <div class="d-flex flex-wrap justify-content-start">
                                    <!--begin::Stats-->
                                    <div class="d-flex flex-wrap">
                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <div class="fs-4 fw-bold">29 Jan, 2025</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Due Date</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span class="path1"></span><span class="path2"></span></i>
                                                <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75" data-kt-initialized="1">75</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Open Tasks</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->

                                        <!--begin::Stat-->
                                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                            <!--begin::Number-->
                                            <div class="d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>
                                                <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="15000" data-kt-countup-prefix="$" data-kt-initialized="1">$15,000</div>
                                            </div>
                                            <!--end::Number-->

                                            <!--begin::Label-->
                                            <div class="fw-semibold fs-6 text-gray-500">Budget Spent</div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Stat-->
                                    </div>
                                    <!--end::Stats-->

                                    <!--begin::Users-->
                                    <div class="symbol-group symbol-hover mb-3">
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon" data-bs-original-title="Michael Eberon" data-kt-initialized="1">
                                            <img alt="Pic" src="/assets/media/avatars/300-11.jpg" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston" data-kt-initialized="1">
                                            <img alt="Pic" src="/assets/media/avatars/300-7.jpg" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Francis Mitcham" data-bs-original-title="Francis Mitcham" data-kt-initialized="1">
                                            <img alt="Pic" src="/assets/media/avatars/300-20.jpg" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                                            <img alt="Pic" src="/assets/media/avatars/300-2.jpg" />
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Perry Matthew" data-kt-initialized="1">
                                            <span class="symbol-label bg-info text-inverse-info fw-bold">P</span>
                                        </div>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Barry Walter" data-bs-original-title="Barry Walter" data-kt-initialized="1">
                                            <img alt="Pic" src="/assets/media/avatars/300-12.jpg" />
                                        </div>
                                        <!--end::User-->

                                        <!--begin::All users-->
                                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                            <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="View more users" data-kt-initialized="1">+42</span>
                                        </a>
                                        <!--end::All users-->
                                    </div>
                                    <!--end::Users-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Details-->

                        <div class="separator"></div>

                        <!--begin::Nav-->
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6 active" href="/apps/projects/project.html"> Overview </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/targets.html"> Targets </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/budget.html"> Budget </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/users.html"> Users </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/files.html"> Files </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/activity.html"> Activity </a>
                            </li>
                            <!--end::Nav item-->
                            <!--begin::Nav item-->
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/settings.html"> Settings </a>
                            </li>
                            <!--end::Nav item-->
                        </ul>
                        <!--end::Nav-->
                    </div>
                </div>
                <!--end::Navbar-->
                <!--begin::Row-->
                <div class="row gx-6 gx-xl-9">
                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Summary-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">Tasks Summary</h3>

                                    <div class="fs-6 fw-semibold text-gray-500">24 Overdue Tasks</div>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-light btn-sm">View Tasks</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body p-9 pt-5">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Chart-->
                                    <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                                        <div class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                                            <span class="fs-2qx fw-bold">237</span>
                                            <span class="fs-6 fw-semibold text-gray-500">Total Tasks</span>
                                        </div>

                                        <canvas id="project_overview_chart" width="350" height="350" style="display: block; box-sizing: border-box; height: 175px; width: 175px;"></canvas>
                                    </div>
                                    <!--end::Chart-->

                                    <!--begin::Labels-->
                                    <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                            <div class="bullet bg-primary me-3"></div>
                                            <div class="text-gray-500">Active</div>
                                            <div class="ms-auto fw-bold text-gray-700">30</div>
                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                            <div class="bullet bg-success me-3"></div>
                                            <div class="text-gray-500">Completed</div>
                                            <div class="ms-auto fw-bold text-gray-700">45</div>
                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                            <div class="bullet bg-danger me-3"></div>
                                            <div class="text-gray-500">Overdue</div>
                                            <div class="ms-auto fw-bold text-gray-700">0</div>
                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Label-->
                                        <div class="d-flex fs-6 fw-semibold align-items-center">
                                            <div class="bullet bg-gray-300 me-3"></div>
                                            <div class="text-gray-500">Yet to start</div>
                                            <div class="ms-auto fw-bold text-gray-700">25</div>
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Wrapper-->

                                <!--begin::Notice-->
                                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <div class="fs-6 text-gray-700"><a href="#" class="fw-bold me-1">Invite New .NET Collaborators</a> to create great outstanding business to business .jsp modutr class scripts</div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Summary-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Graph-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">Tasks Over Time</h3>

                                    <!--begin::Labels-->
                                    <div class="fs-6 d-flex text-gray-500 fs-6 fw-semibold">
                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center me-6">
                                            <span class="menu-bullet d-flex align-items-center me-2">
                                                <span class="bullet bg-success"></span>
                                            </span>
                                            Complete
                                        </div>
                                        <!--end::Label-->

                                        <!--begin::Label-->
                                        <div class="d-flex align-items-center">
                                            <span class="menu-bullet d-flex align-items-center me-2">
                                                <span class="bullet bg-primary"></span>
                                            </span>
                                            Incomplete
                                        </div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Labels-->
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Select-->
                                    <select
                                        name="status"
                                        data-control="select2"
                                        data-hide-search="true"
                                        class="form-select form-select-solid form-select-sm fw-bold w-100px select2-hidden-accessible"
                                        data-select2-id="select2-data-7-uyv7"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        data-kt-initialized="1"
                                    >
                                        <option value="1">2020 Q1</option>
                                        <option value="2">2020 Q2</option>
                                        <option value="3" selected="" data-select2-id="select2-data-9-d8qz">2020 Q3</option>
                                        <option value="4">2020 Q4</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-c0e9" style="width: 100%;">
                                        <span class="selection">
                                            <span
                                                class="select2-selection select2-selection--single form-select form-select-solid form-select-sm fw-bold w-100px"
                                                role="combobox"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                tabindex="0"
                                                aria-disabled="false"
                                                aria-labelledby="select2-status-mn-container"
                                                aria-controls="select2-status-mn-container"
                                            >
                                                <span class="select2-selection__rendered" id="select2-status-mn-container" role="textbox" aria-readonly="true" title="2020 Q3">2020 Q3</span>
                                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                            </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                    </span>
                                    <!--end::Select-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-10 pb-0 px-5">
                                <!--begin::Chart-->
                                <div id="kt_project_overview_graph" class="card-rounded-bottom" style="height: 300px; min-height: 315px;">
                                    <div id="apexcharts12rg9ly7f" class="apexcharts-canvas apexcharts12rg9ly7f apexcharts-theme-" style="width: 448px; height: 300px;">
                                        <svg
                                            id="SvgjsSvg1006"
                                            width="448"
                                            height="300"
                                            xmlns="http://www.w3.org/2000/svg"
                                            version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg apexcharts-zoomable"
                                            xmlns:data="ApexChartsNS"
                                            transform="translate(0, 0)"
                                        >
                                            <foreignObject x="0" y="0" width="448" height="300"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 150px;"></div></foreignObject>
                                            <g id="SvgjsG1013" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                            <g id="SvgjsG1014" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                            <rect id="SvgjsRect1038" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                            <g id="SvgjsG1065" class="apexcharts-yaxis" rel="0" transform="translate(12, 0)">
                                                <g id="SvgjsG1066" class="apexcharts-yaxis-texts-g">
                                                    <text
                                                        id="SvgjsText1068"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="20"
                                                        y="34"
                                                        text-anchor="end"
                                                        dominant-baseline="auto"
                                                        font-size="12px"
                                                        font-weight="400"
                                                        fill="#636674"
                                                        class="apexcharts-text apexcharts-yaxis-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;"
                                                    >
                                                        <tspan id="SvgjsTspan1069">80</tspan>
                                                        <title>80</title>
                                                    </text>
                                                    <text
                                                        id="SvgjsText1071"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="20"
                                                        y="80.3078"
                                                        text-anchor="end"
                                                        dominant-baseline="auto"
                                                        font-size="12px"
                                                        font-weight="400"
                                                        fill="#636674"
                                                        class="apexcharts-text apexcharts-yaxis-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;"
                                                    >
                                                        <tspan id="SvgjsTspan1072">75</tspan>
                                                        <title>75</title>
                                                    </text>
                                                    <text
                                                        id="SvgjsText1074"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="20"
                                                        y="126.6156"
                                                        text-anchor="end"
                                                        dominant-baseline="auto"
                                                        font-size="12px"
                                                        font-weight="400"
                                                        fill="#636674"
                                                        class="apexcharts-text apexcharts-yaxis-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;"
                                                    >
                                                        <tspan id="SvgjsTspan1075">70</tspan>
                                                        <title>70</title>
                                                    </text>
                                                    <text
                                                        id="SvgjsText1077"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="20"
                                                        y="172.92340000000002"
                                                        text-anchor="end"
                                                        dominant-baseline="auto"
                                                        font-size="12px"
                                                        font-weight="400"
                                                        fill="#636674"
                                                        class="apexcharts-text apexcharts-yaxis-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;"
                                                    >
                                                        <tspan id="SvgjsTspan1078">65</tspan>
                                                        <title>65</title>
                                                    </text>
                                                    <text
                                                        id="SvgjsText1080"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="20"
                                                        y="219.2312"
                                                        text-anchor="end"
                                                        dominant-baseline="auto"
                                                        font-size="12px"
                                                        font-weight="400"
                                                        fill="#636674"
                                                        class="apexcharts-text apexcharts-yaxis-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;"
                                                    >
                                                        <tspan id="SvgjsTspan1081">60</tspan>
                                                        <title>60</title>
                                                    </text>
                                                    <text
                                                        id="SvgjsText1083"
                                                        font-family="Helvetica, Arial, sans-serif"
                                                        x="20"
                                                        y="265.539"
                                                        text-anchor="end"
                                                        dominant-baseline="auto"
                                                        font-size="12px"
                                                        font-weight="400"
                                                        fill="#636674"
                                                        class="apexcharts-text apexcharts-yaxis-label"
                                                        style="font-family: Helvetica, Arial, sans-serif;"
                                                    >
                                                        <tspan id="SvgjsTspan1084">55</tspan>
                                                        <title>55</title>
                                                    </text>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical" transform="translate(42, 30)">
                                                <defs id="SvgjsDefs1007">
                                                    <clipPath id="gridRectMask12rg9ly7f">
                                                        <rect id="SvgjsRect1011" width="390.6328125" height="238.539" x="-3.5" y="-3.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMask12rg9ly7f"></clipPath>
                                                    <clipPath id="nonForecastMask12rg9ly7f"></clipPath>
                                                    <clipPath id="gridRectMarkerMask12rg9ly7f">
                                                        <rect id="SvgjsRect1012" width="387.6328125" height="235.539" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1026" class="apexcharts-grid">
                                                    <g id="SvgjsG1027" class="apexcharts-gridlines-horizontal">
                                                        <line id="SvgjsLine1031" x1="0" y1="46.3078" x2="383.6328125" y2="46.3078" stroke="#26272f" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1032" x1="0" y1="92.6156" x2="383.6328125" y2="92.6156" stroke="#26272f" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line
                                                            id="SvgjsLine1033"
                                                            x1="0"
                                                            y1="138.92340000000002"
                                                            x2="383.6328125"
                                                            y2="138.92340000000002"
                                                            stroke="#26272f"
                                                            stroke-dasharray="4"
                                                            stroke-linecap="butt"
                                                            class="apexcharts-gridline"
                                                        ></line>
                                                        <line id="SvgjsLine1034" x1="0" y1="185.2312" x2="383.6328125" y2="185.2312" stroke="#26272f" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1028" class="apexcharts-gridlines-vertical"></g>
                                                    <line id="SvgjsLine1037" x1="0" y1="231.539" x2="383.6328125" y2="231.539" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1036" x1="0" y1="1" x2="0" y2="231.539" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1029" class="apexcharts-grid-borders">
                                                    <line id="SvgjsLine1030" x1="0" y1="0" x2="383.6328125" y2="0" stroke="#26272f" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    <line id="SvgjsLine1035" x1="0" y1="231.539" x2="383.6328125" y2="231.539" stroke="#26272f" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                </g>
                                                <g id="SvgjsG1015" class="apexcharts-area-series apexcharts-plot-series">
                                                    <g id="SvgjsG1016" class="apexcharts-series" zIndex="0" seriesName="Incomplete" data:longestSeries="true" rel="1" data:realIndex="0">
                                                        <path
                                                            id="SvgjsPath1019"
                                                            d="M0 92.61559999999997C22.378580729166668 92.61559999999997 41.56022135416667 92.61559999999997 63.938802083333336 92.61559999999997C86.3173828125 92.61559999999997 105.4990234375 0 127.87760416666667 0C150.25618489583334 0 169.43782552083334 0 191.81640625 0C214.19498697916666 0 233.37662760416669 46.30780000000004 255.75520833333334 46.30780000000004C278.1337890625 46.30780000000004 297.3154296875 46.30780000000004 319.6940104166667 46.30780000000004C342.07259114583337 46.30780000000004 361.25423177083337 46.30780000000004 383.6328125 46.30780000000004C383.6328125 46.30780000000004 383.6328125 46.30780000000004 383.6328125 231.539L0 231.539C0 231.539 0 92.61559999999997 0 92.61559999999997 "
                                                            fill="rgba(23,35,49,1)"
                                                            fill-opacity="1"
                                                            stroke-opacity="1"
                                                            stroke-linecap="butt"
                                                            stroke-width="0"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask12rg9ly7f)"
                                                            pathTo="M 0 92.61559999999997C 22.378580729166668 92.61559999999997 41.56022135416667 92.61559999999997 63.938802083333336 92.61559999999997C 86.3173828125 92.61559999999997 105.4990234375 0 127.87760416666667 0C 150.25618489583334 0 169.43782552083334 0 191.81640625 0C 214.19498697916666 0 233.37662760416669 46.30780000000004 255.75520833333334 46.30780000000004C 278.1337890625 46.30780000000004 297.3154296875 46.30780000000004 319.6940104166667 46.30780000000004C 342.07259114583337 46.30780000000004 361.25423177083337 46.30780000000004 383.6328125 46.30780000000004C 383.6328125 46.30780000000004 383.6328125 46.30780000000004 383.6328125 231.539 L 0 231.539z"
                                                            pathFrom="M 0 740.9248 L 0 740.9248 L 63.938802083333336 740.9248 L 127.87760416666667 740.9248 L 191.81640625 740.9248 L 255.75520833333334 740.9248 L 319.6940104166667 740.9248 L 383.6328125 740.9248z"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1020"
                                                            d="M0 92.61559999999997C22.378580729166668 92.61559999999997 41.56022135416667 92.61559999999997 63.938802083333336 92.61559999999997C86.3173828125 92.61559999999997 105.4990234375 0 127.87760416666667 0C150.25618489583334 0 169.43782552083334 0 191.81640625 0C214.19498697916666 0 233.37662760416669 46.30780000000004 255.75520833333334 46.30780000000004C278.1337890625 46.30780000000004 297.3154296875 46.30780000000004 319.6940104166667 46.30780000000004C342.07259114583337 46.30780000000004 361.25423177083337 46.30780000000004 383.6328125 46.30780000000004C383.6328125 46.30780000000004 383.6328125 46.30780000000004 383.6328125 46.30780000000004 "
                                                            fill="none"
                                                            fill-opacity="1"
                                                            stroke="#006ae6"
                                                            stroke-opacity="1"
                                                            stroke-linecap="butt"
                                                            stroke-width="3"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask12rg9ly7f)"
                                                            pathTo="M 0 92.61559999999997C 22.378580729166668 92.61559999999997 41.56022135416667 92.61559999999997 63.938802083333336 92.61559999999997C 86.3173828125 92.61559999999997 105.4990234375 0 127.87760416666667 0C 150.25618489583334 0 169.43782552083334 0 191.81640625 0C 214.19498697916666 0 233.37662760416669 46.30780000000004 255.75520833333334 46.30780000000004C 278.1337890625 46.30780000000004 297.3154296875 46.30780000000004 319.6940104166667 46.30780000000004C 342.07259114583337 46.30780000000004 361.25423177083337 46.30780000000004 383.6328125 46.30780000000004"
                                                            pathFrom="M 0 740.9248 L 0 740.9248 L 63.938802083333336 740.9248 L 127.87760416666667 740.9248 L 191.81640625 740.9248 L 255.75520833333334 740.9248 L 319.6940104166667 740.9248 L 383.6328125 740.9248"
                                                            fill-rule="evenodd"
                                                        ></path>
                                                        <g id="SvgjsG1017" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="0">
                                                            <g class="apexcharts-series-markers">
                                                                <path
                                                                    id="SvgjsPath1088"
                                                                    d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                    fill="#172331"
                                                                    fill-opacity="1"
                                                                    stroke="#006ae6"
                                                                    stroke-opacity="0.9"
                                                                    stroke-linecap="butt"
                                                                    stroke-width="3"
                                                                    stroke-dasharray="0"
                                                                    cx="0"
                                                                    cy="0"
                                                                    shape="circle"
                                                                    class="apexcharts-marker wy1fu8o88 no-pointer-events"
                                                                    default-marker-size="0"
                                                                ></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1021" class="apexcharts-series" zIndex="1" seriesName="Complete" data:longestSeries="true" rel="2" data:realIndex="1">
                                                        <path
                                                            id="SvgjsPath1024"
                                                            d="M0 231.53900000000004C22.378580729166668 231.53900000000004 41.56022135416667 231.53900000000004 63.938802083333336 231.53900000000004C86.3173828125 231.53900000000004 105.4990234375 185.23120000000006 127.87760416666667 185.23120000000006C150.25618489583334 185.23120000000006 169.43782552083334 185.23120000000006 191.81640625 185.23120000000006C214.19498697916666 185.23120000000006 233.37662760416669 231.53900000000004 255.75520833333334 231.53900000000004C278.1337890625 231.53900000000004 297.3154296875 231.53900000000004 319.6940104166667 231.53900000000004C342.07259114583337 231.53900000000004 361.25423177083337 185.23120000000006 383.6328125 185.23120000000006C383.6328125 185.23120000000006 383.6328125 185.23120000000006 383.6328125 231.539L0 231.539C0 231.539 0 231.53900000000004 0 231.53900000000004 "
                                                            fill="rgba(31,33,42,1)"
                                                            fill-opacity="1"
                                                            stroke-opacity="1"
                                                            stroke-linecap="butt"
                                                            stroke-width="0"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-area"
                                                            index="1"
                                                            clip-path="url(#gridRectMask12rg9ly7f)"
                                                            pathTo="M 0 231.53900000000004C 22.378580729166668 231.53900000000004 41.56022135416667 231.53900000000004 63.938802083333336 231.53900000000004C 86.3173828125 231.53900000000004 105.4990234375 185.23120000000006 127.87760416666667 185.23120000000006C 150.25618489583334 185.23120000000006 169.43782552083334 185.23120000000006 191.81640625 185.23120000000006C 214.19498697916666 185.23120000000006 233.37662760416669 231.53900000000004 255.75520833333334 231.53900000000004C 278.1337890625 231.53900000000004 297.3154296875 231.53900000000004 319.6940104166667 231.53900000000004C 342.07259114583337 231.53900000000004 361.25423177083337 185.23120000000006 383.6328125 185.23120000000006C 383.6328125 185.23120000000006 383.6328125 185.23120000000006 383.6328125 231.539 L 0 231.539z"
                                                            pathFrom="M 0 740.9248 L 0 740.9248 L 63.938802083333336 740.9248 L 127.87760416666667 740.9248 L 191.81640625 740.9248 L 255.75520833333334 740.9248 L 319.6940104166667 740.9248 L 383.6328125 740.9248z"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1025"
                                                            d="M0 231.53900000000004C22.378580729166668 231.53900000000004 41.56022135416667 231.53900000000004 63.938802083333336 231.53900000000004C86.3173828125 231.53900000000004 105.4990234375 185.23120000000006 127.87760416666667 185.23120000000006C150.25618489583334 185.23120000000006 169.43782552083334 185.23120000000006 191.81640625 185.23120000000006C214.19498697916666 185.23120000000006 233.37662760416669 231.53900000000004 255.75520833333334 231.53900000000004C278.1337890625 231.53900000000004 297.3154296875 231.53900000000004 319.6940104166667 231.53900000000004C342.07259114583337 231.53900000000004 361.25423177083337 185.23120000000006 383.6328125 185.23120000000006C383.6328125 185.23120000000006 383.6328125 185.23120000000006 383.6328125 185.23120000000006 "
                                                            fill="none"
                                                            fill-opacity="1"
                                                            stroke="#00a261"
                                                            stroke-opacity="1"
                                                            stroke-linecap="butt"
                                                            stroke-width="3"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-area"
                                                            index="1"
                                                            clip-path="url(#gridRectMask12rg9ly7f)"
                                                            pathTo="M 0 231.53900000000004C 22.378580729166668 231.53900000000004 41.56022135416667 231.53900000000004 63.938802083333336 231.53900000000004C 86.3173828125 231.53900000000004 105.4990234375 185.23120000000006 127.87760416666667 185.23120000000006C 150.25618489583334 185.23120000000006 169.43782552083334 185.23120000000006 191.81640625 185.23120000000006C 214.19498697916666 185.23120000000006 233.37662760416669 231.53900000000004 255.75520833333334 231.53900000000004C 278.1337890625 231.53900000000004 297.3154296875 231.53900000000004 319.6940104166667 231.53900000000004C 342.07259114583337 231.53900000000004 361.25423177083337 185.23120000000006 383.6328125 185.23120000000006"
                                                            pathFrom="M 0 740.9248 L 0 740.9248 L 63.938802083333336 740.9248 L 127.87760416666667 740.9248 L 191.81640625 740.9248 L 255.75520833333334 740.9248 L 319.6940104166667 740.9248 L 383.6328125 740.9248"
                                                            fill-rule="evenodd"
                                                        ></path>
                                                        <g id="SvgjsG1022" class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown" data:realIndex="1">
                                                            <g class="apexcharts-series-markers">
                                                                <path
                                                                    id="SvgjsPath1089"
                                                                    d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0"
                                                                    fill="#1f212a"
                                                                    fill-opacity="1"
                                                                    stroke="#00a261"
                                                                    stroke-opacity="0.9"
                                                                    stroke-linecap="butt"
                                                                    stroke-width="3"
                                                                    stroke-dasharray="0"
                                                                    cx="0"
                                                                    cy="0"
                                                                    shape="circle"
                                                                    class="apexcharts-marker wuan4qfba no-pointer-events"
                                                                    default-marker-size="0"
                                                                ></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                    <g id="SvgjsG1018" class="apexcharts-datalabels" data:realIndex="0"></g>
                                                    <g id="SvgjsG1023" class="apexcharts-datalabels" data:realIndex="1"></g>
                                                </g>
                                                <line
                                                    id="SvgjsLine1039"
                                                    x1="0"
                                                    y1="0"
                                                    x2="0"
                                                    y2="231.539"
                                                    stroke="#006ae6"
                                                    stroke-dasharray="3"
                                                    stroke-linecap="butt"
                                                    class="apexcharts-xcrosshairs"
                                                    x="0"
                                                    y="0"
                                                    width="1"
                                                    height="231.539"
                                                    fill="#b1b9c4"
                                                    filter="none"
                                                    fill-opacity="0.9"
                                                    stroke-width="1"
                                                ></line>
                                                <line id="SvgjsLine1040" x1="0" y1="0" x2="383.6328125" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1041" x1="0" y1="0" x2="383.6328125" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1042" class="apexcharts-xaxis" transform="translate(0, 0)">
                                                    <g id="SvgjsG1043" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                                        <text
                                                            id="SvgjsText1045"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="0"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1046">Feb</tspan>
                                                            <title>Feb</title>
                                                        </text>
                                                        <text
                                                            id="SvgjsText1048"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="63.93880208333333"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1049">Mar</tspan>
                                                            <title>Mar</title>
                                                        </text>
                                                        <text
                                                            id="SvgjsText1051"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="127.87760416666667"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1052">Apr</tspan>
                                                            <title>Apr</title>
                                                        </text>
                                                        <text
                                                            id="SvgjsText1054"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="191.81640625000003"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1055">May</tspan>
                                                            <title>May</title>
                                                        </text>
                                                        <text
                                                            id="SvgjsText1057"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="255.75520833333334"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1058">Jun</tspan>
                                                            <title>Jun</title>
                                                        </text>
                                                        <text
                                                            id="SvgjsText1060"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="319.69401041666663"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1061">Jul</tspan>
                                                            <title>Jul</title>
                                                        </text>
                                                        <text
                                                            id="SvgjsText1063"
                                                            font-family="Helvetica, Arial, sans-serif"
                                                            x="383.63281249999994"
                                                            y="259.539"
                                                            text-anchor="middle"
                                                            dominant-baseline="auto"
                                                            font-size="12px"
                                                            font-weight="400"
                                                            fill="#636674"
                                                            class="apexcharts-text apexcharts-xaxis-label"
                                                            style="font-family: Helvetica, Arial, sans-serif;"
                                                        >
                                                            <tspan id="SvgjsTspan1064">Aug</tspan>
                                                            <title>Aug</title>
                                                        </text>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1085" class="apexcharts-yaxis-annotations apexcharts-hidden-element-shown"></g>
                                                <g id="SvgjsG1086" class="apexcharts-xaxis-annotations apexcharts-hidden-element-shown"></g>
                                                <g id="SvgjsG1087" class="apexcharts-point-annotations apexcharts-hidden-element-shown"></g>
                                                <rect id="SvgjsRect1090" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                                <rect id="SvgjsRect1091" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                            </g>
                                        </svg>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                <span class="apexcharts-tooltip-marker" style="background-color: rgb(23, 35, 49);"></span>
                                                <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 2;">
                                                <span class="apexcharts-tooltip-marker" style="background-color: rgb(31, 33, 42);"></span>
                                                <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                            <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                        </div>
                                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div>
                                    </div>
                                </div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Graph-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">What's on the road?</h3>

                                    <div class="fs-6 text-gray-500">Total 482 participants</div>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Select-->
                                    <select
                                        name="status"
                                        data-control="select2"
                                        data-hide-search="true"
                                        class="form-select form-select-solid form-select-sm fw-bold w-100px select2-hidden-accessible"
                                        data-select2-id="select2-data-10-x0nu"
                                        tabindex="-1"
                                        aria-hidden="true"
                                        data-kt-initialized="1"
                                    >
                                        <option value="1" selected="" data-select2-id="select2-data-12-37bg">Options</option>
                                        <option value="2">Option 1</option>
                                        <option value="3">Option 2</option>
                                        <option value="4">Option 3</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-b6uu" style="width: 100%;">
                                        <span class="selection">
                                            <span
                                                class="select2-selection select2-selection--single form-select form-select-solid form-select-sm fw-bold w-100px"
                                                role="combobox"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                tabindex="0"
                                                aria-disabled="false"
                                                aria-labelledby="select2-status-z8-container"
                                                aria-controls="select2-status-z8-container"
                                            >
                                                <span class="select2-selection__rendered" id="select2-status-z8-container" role="textbox" aria-readonly="true" title="Options">Options</span>
                                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                            </span>
                                        </span>
                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                    </span>
                                    <!--end::Select-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body p-9 pt-4">
                                <!--begin::Dates-->
                                <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2" role="tablist">
                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_0"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">22</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary active" data-bs-toggle="tab" href="#kt_schedule_day_1" aria-selected="true" role="tab">
                                            <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 fw-bold">23</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_2"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">24</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_3"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">We</span>
                                            <span class="fs-6 fw-bold">25</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_4"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                            <span class="fs-6 fw-bold">26</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_5"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                            <span class="fs-6 fw-bold">27</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_6"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                            <span class="fs-6 fw-bold">28</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_7"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                            <span class="fs-6 fw-bold">29</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_8"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                            <span class="fs-6 fw-bold">30</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->

                                    <!--begin::Date-->
                                    <li class="nav-item me-1" role="presentation">
                                        <a
                                            class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary"
                                            data-bs-toggle="tab"
                                            href="#kt_schedule_day_9"
                                            aria-selected="false"
                                            tabindex="-1"
                                            role="tab"
                                        >
                                            <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                            <span class="fs-6 fw-bold">31</span>
                                        </a>
                                    </li>
                                    <!--end::Date-->
                                </ul>
                                <!--end::Dates-->

                                <!--begin::Tab Content-->
                                <div class="tab-content">
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_0" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Marketing Campaign Discussion </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Project Review &amp; Testing </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Sean Bean</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_1" class="tab-pane fade show active" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Karina Clarke</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Team Backlog Grooming Session </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_2" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> 9 Degree Project Estimation Meeting </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Michael Walters</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_3" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Team Backlog Grooming Session </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Michael Walters</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_4" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Karina Clarke</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Yannis Gloverson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Project Review &amp; Testing </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Caleb Donaldson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_5" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    14:30 - 15:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Bob Harris</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Team Backlog Grooming Session </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Terry Robins</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_6" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Committee Review Approvals </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Bob Harris</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Terry Robins</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Karina Clarke</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_7" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Sales Pitch Proposal </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Mark Randall</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Dashboard UI/UX Design Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Marketing Campaign Discussion </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Walter White</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_8" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    10:00 - 11:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Walter White</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    11:00 - 11:45

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Development Team Capacity Review </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Naomi Hayabusa</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    13:00 - 14:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                    <!--begin::Day-->
                                    <div id="kt_schedule_day_9" class="tab-pane fade show" role="tabpanel">
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    12:00 - 13:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Kendell Trevor</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    9:00 - 10:00

                                                    <span class="fs-7 text-gray-500 text-uppercase"> am </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Creative Content Initiative </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">David Stevenson</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                        <!--begin::Time-->
                                        <div class="d-flex flex-stack position-relative mt-8">
                                            <!--begin::Bar-->
                                            <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                            <!--end::Bar-->

                                            <!--begin::Info-->
                                            <div class="fw-semibold ms-5 text-gray-600">
                                                <!--begin::Time-->
                                                <div class="fs-5">
                                                    16:30 - 17:30

                                                    <span class="fs-7 text-gray-500 text-uppercase"> pm </span>
                                                </div>
                                                <!--end::Time-->

                                                <!--begin::Title-->
                                                <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2"> Weekly Team Stand-Up </a>
                                                <!--end::Title-->

                                                <!--begin::User-->
                                                <div class="text-gray-500">Lead by <a href="#">Peter Marcus</a></div>
                                                <!--end::User-->
                                            </div>
                                            <!--end::Info-->

                                            <!--begin::Action-->
                                            <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Time-->
                                    </div>
                                    <!--end::Day-->
                                </div>
                                <!--end::Tab Content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">Latest Files</h3>

                                    <div class="fs-6 text-gray-500">Total 382 fiels, 2,6GB space usage</div>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body p-9 pt-3">
                                <!--begin::Files-->
                                <div class="d-flex flex-column mb-9">
                                    <!--begin::File-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Icon-->
                                        <div class="symbol symbol-30px me-5">
                                            <img alt="Icon" src="/assets/media/svg/files/pdf.svg" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Details-->
                                        <div class="fw-semibold">
                                            <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Project tech requirements</a>

                                            <div class="text-gray-500">2 days ago <a href="#">Karina Clark</a></div>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Menu-->
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </button>

                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc849">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->

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
                                                            data-dropdown-parent="#kt_menu_686fb458cc849"
                                                            data-allow-clear="true"
                                                            data-select2-id="select2-data-13-lee7"
                                                            tabindex="-1"
                                                            aria-hidden="true"
                                                            data-kt-initialized="1"
                                                        >
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                        <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-ot78" style="width: 100%;">
                                                            <span class="selection">
                                                                <span
                                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                    role="combobox"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    tabindex="-1"
                                                                    aria-disabled="false"
                                                                >
                                                                    <ul class="select2-selection__rendered" id="select2-lr54-container"></ul>
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
                                                                            aria-describedby="select2-lr54-container"
                                                                            placeholder="Select option"
                                                                            style="width: 100%;"
                                                                        ></textarea>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                        </span>
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
                                                            <span class="form-check-label">
                                                                Author
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                            <span class="form-check-label">
                                                                Customer
                                                            </span>
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
                                                        <label class="form-check-label">
                                                            Enabled
                                                        </label>
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
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::File-->
                                    <!--begin::File-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Icon-->
                                        <div class="symbol symbol-30px me-5">
                                            <img alt="Icon" src="/assets/media/svg/files/doc.svg" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Details-->
                                        <div class="fw-semibold">
                                            <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create FureStibe branding proposal</a>

                                            <div class="text-gray-500">Due in 1 day <a href="#">Marcus Blake</a></div>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Menu-->
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </button>

                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc854">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->

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
                                                            data-dropdown-parent="#kt_menu_686fb458cc854"
                                                            data-allow-clear="true"
                                                            data-select2-id="select2-data-15-z729"
                                                            tabindex="-1"
                                                            aria-hidden="true"
                                                            data-kt-initialized="1"
                                                        >
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                        <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-16-mktj" style="width: 100%;">
                                                            <span class="selection">
                                                                <span
                                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                    role="combobox"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    tabindex="-1"
                                                                    aria-disabled="false"
                                                                >
                                                                    <ul class="select2-selection__rendered" id="select2-d7uh-container"></ul>
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
                                                                            aria-describedby="select2-d7uh-container"
                                                                            placeholder="Select option"
                                                                            style="width: 100%;"
                                                                        ></textarea>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                        </span>
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
                                                            <span class="form-check-label">
                                                                Author
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                            <span class="form-check-label">
                                                                Customer
                                                            </span>
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
                                                        <label class="form-check-label">
                                                            Enabled
                                                        </label>
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
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::File-->
                                    <!--begin::File-->
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Icon-->
                                        <div class="symbol symbol-30px me-5">
                                            <img alt="Icon" src="/assets/media/svg/files/css.svg" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Details-->
                                        <div class="fw-semibold">
                                            <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Completed Project Stylings</a>

                                            <div class="text-gray-500">Due in 1 day <a href="#">Terry Barry</a></div>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Menu-->
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </button>

                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc85e">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->

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
                                                            data-dropdown-parent="#kt_menu_686fb458cc85e"
                                                            data-allow-clear="true"
                                                            data-select2-id="select2-data-17-12xh"
                                                            tabindex="-1"
                                                            aria-hidden="true"
                                                            data-kt-initialized="1"
                                                        >
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                        <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-18-6lrx" style="width: 100%;">
                                                            <span class="selection">
                                                                <span
                                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                    role="combobox"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    tabindex="-1"
                                                                    aria-disabled="false"
                                                                >
                                                                    <ul class="select2-selection__rendered" id="select2-ooz8-container"></ul>
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
                                                                            aria-describedby="select2-ooz8-container"
                                                                            placeholder="Select option"
                                                                            style="width: 100%;"
                                                                        ></textarea>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                        </span>
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
                                                            <span class="form-check-label">
                                                                Author
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                            <span class="form-check-label">
                                                                Customer
                                                            </span>
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
                                                        <label class="form-check-label">
                                                            Enabled
                                                        </label>
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
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::File-->
                                    <!--begin::File-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <div class="symbol symbol-30px me-5">
                                            <img alt="Icon" src="/assets/media/svg/files/ai.svg" />
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Details-->
                                        <div class="fw-semibold">
                                            <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create Project Wireframes</a>

                                            <div class="text-gray-500">Due in 3 days <a href="#">Roth Bloom</a></div>
                                        </div>
                                        <!--end::Details-->

                                        <!--begin::Menu-->
                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </button>

                                        <!--begin::Menu 1-->
                                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc868">
                                            <!--begin::Header-->
                                            <div class="px-7 py-5">
                                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                            </div>
                                            <!--end::Header-->

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
                                                            data-dropdown-parent="#kt_menu_686fb458cc868"
                                                            data-allow-clear="true"
                                                            data-select2-id="select2-data-19-zqd8"
                                                            tabindex="-1"
                                                            aria-hidden="true"
                                                            data-kt-initialized="1"
                                                        >
                                                            <option></option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Pending</option>
                                                            <option value="2">In Process</option>
                                                            <option value="2">Rejected</option>
                                                        </select>
                                                        <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-cn46" style="width: 100%;">
                                                            <span class="selection">
                                                                <span
                                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                    role="combobox"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    tabindex="-1"
                                                                    aria-disabled="false"
                                                                >
                                                                    <ul class="select2-selection__rendered" id="select2-0g45-container"></ul>
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
                                                                            aria-describedby="select2-0g45-container"
                                                                            placeholder="Select option"
                                                                            style="width: 100%;"
                                                                        ></textarea>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                        </span>
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
                                                            <span class="form-check-label">
                                                                Author
                                                            </span>
                                                        </label>
                                                        <!--end::Options-->

                                                        <!--begin::Options-->
                                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                            <span class="form-check-label">
                                                                Customer
                                                            </span>
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
                                                        <label class="form-check-label">
                                                            Enabled
                                                        </label>
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
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::File-->
                                </div>
                                <!--end::Files-->

                                <!--begin::Notice-->
                                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-svg/files/upload.svg fs-2tx text-primary me-4"></i>
                                    <!--end::Icon-->

                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Quick file uploader</h4>

                                            <div class="fs-6 text-gray-700">Drag &amp; Drop or choose files from computer</div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Card body -->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Card-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">New Contibutors</h3>

                                    <div class="fs-6 text-gray-500">From total 482 Participants</div>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card toolbar-->

                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-column p-9 pt-3 mb-9">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Avatar-->
                                    <div class="me-5 position-relative">
                                        <!--begin::Image-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="/assets/media/avatars/300-6.jpg" />
                                        </div>
                                        <!--end::Image-->
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Emma Smith</a>

                                        <div class="text-gray-500">
                                            8 Pending &amp; 97 Completed Tasks
                                        </div>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Badge-->
                                    <div class="badge badge-light ms-auto">5</div>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Avatar-->
                                    <div class="me-5 position-relative">
                                        <!--begin::Image-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <span class="symbol-label bg-light-danger text-danger fw-semibold"> M </span>
                                        </div>
                                        <!--end::Image-->

                                        <!--begin::Online-->
                                        <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                        <!--end::Online-->
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Melody Macy</a>

                                        <div class="text-gray-500">
                                            5 Pending &amp; 84 Completed
                                        </div>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Badge-->
                                    <div class="badge badge-light ms-auto">8</div>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Avatar-->
                                    <div class="me-5 position-relative">
                                        <!--begin::Image-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="/assets/media/avatars/300-1.jpg" />
                                        </div>
                                        <!--end::Image-->
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Max Smith</a>

                                        <div class="text-gray-500">
                                            9 Pending &amp; 103 Completed
                                        </div>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Badge-->
                                    <div class="badge badge-light ms-auto">9</div>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center mb-5">
                                    <!--begin::Avatar-->
                                    <div class="me-5 position-relative">
                                        <!--begin::Image-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="/assets/media/avatars/300-5.jpg" />
                                        </div>
                                        <!--end::Image-->
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Sean Bean</a>

                                        <div class="text-gray-500">
                                            3 Pending &amp; 55 Completed
                                        </div>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Badge-->
                                    <div class="badge badge-light ms-auto">3</div>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Item-->

                                <!--begin::Item-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="me-5 position-relative">
                                        <!--begin::Image-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            <img alt="Pic" src="/assets/media/avatars/300-25.jpg" />
                                        </div>
                                        <!--end::Image-->
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Brian Cox</a>

                                        <div class="text-gray-500">
                                            4 Pending &amp; 115 Completed
                                        </div>
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Badge-->
                                    <div class="badge badge-light ms-auto">4</div>
                                    <!--end::Badge-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-lg-6">
                        <!--begin::Tasks-->
                        <div class="card card-flush h-lg-100">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title flex-column">
                                    <h3 class="fw-bold mb-1">My Tasks</h3>

                                    <div class="fs-6 text-gray-500">Total 25 tasks in backlog</div>
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-column mb-9 p-9 pt-3">
                                <!--begin::Item-->
                                <div class="d-flex align-items-center position-relative mb-7">
                                    <!--begin::Label-->
                                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                    <!--end::Label-->

                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                    <!--end::Checkbox-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Create FureStibe branding logo</a>

                                        <!--begin::Info-->
                                        <div class="text-gray-500">Due in 1 day <a href="#">Karina Clark</a></div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </button>

                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc899">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->

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
                                                        data-dropdown-parent="#kt_menu_686fb458cc899"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-21-q5so"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1"
                                                    >
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-22-7aow" style="width: 100%;">
                                                        <span class="selection">
                                                            <span
                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="-1"
                                                                aria-disabled="false"
                                                            >
                                                                <ul class="select2-selection__rendered" id="select2-ig64-container"></ul>
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
                                                                        aria-describedby="select2-ig64-container"
                                                                        placeholder="Select option"
                                                                        style="width: 100%;"
                                                                    ></textarea>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>
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
                                                        <span class="form-check-label">
                                                            Author
                                                        </span>
                                                    </label>
                                                    <!--end::Options-->

                                                    <!--begin::Options-->
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                        <span class="form-check-label">
                                                            Customer
                                                        </span>
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
                                                    <label class="form-check-label">
                                                        Enabled
                                                    </label>
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
                                    <!--end::Menu-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center position-relative mb-7">
                                    <!--begin::Label-->
                                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                    <!--end::Label-->

                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                    <!--end::Checkbox-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Schedule a meeting with FireBear CTO John</a>

                                        <!--begin::Info-->
                                        <div class="text-gray-500">Due in 3 days <a href="#">Rober Doe</a></div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </button>

                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc8a3">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->

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
                                                        data-dropdown-parent="#kt_menu_686fb458cc8a3"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-23-a2x2"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1"
                                                    >
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-24-j27c" style="width: 100%;">
                                                        <span class="selection">
                                                            <span
                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="-1"
                                                                aria-disabled="false"
                                                            >
                                                                <ul class="select2-selection__rendered" id="select2-2xgc-container"></ul>
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
                                                                        aria-describedby="select2-2xgc-container"
                                                                        placeholder="Select option"
                                                                        style="width: 100%;"
                                                                    ></textarea>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>
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
                                                        <span class="form-check-label">
                                                            Author
                                                        </span>
                                                    </label>
                                                    <!--end::Options-->

                                                    <!--begin::Options-->
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                        <span class="form-check-label">
                                                            Customer
                                                        </span>
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
                                                    <label class="form-check-label">
                                                        Enabled
                                                    </label>
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
                                    <!--end::Menu-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center position-relative mb-7">
                                    <!--begin::Label-->
                                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                    <!--end::Label-->

                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                    <!--end::Checkbox-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">9 Degree Porject Estimation</a>

                                        <!--begin::Info-->
                                        <div class="text-gray-500">Due in 1 week <a href="#">Neil Owen</a></div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </button>

                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc8ac">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->

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
                                                        data-dropdown-parent="#kt_menu_686fb458cc8ac"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-25-ecff"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1"
                                                    >
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-26-xuqs" style="width: 100%;">
                                                        <span class="selection">
                                                            <span
                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="-1"
                                                                aria-disabled="false"
                                                            >
                                                                <ul class="select2-selection__rendered" id="select2-ms40-container"></ul>
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
                                                                        aria-describedby="select2-ms40-container"
                                                                        placeholder="Select option"
                                                                        style="width: 100%;"
                                                                    ></textarea>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>
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
                                                        <span class="form-check-label">
                                                            Author
                                                        </span>
                                                    </label>
                                                    <!--end::Options-->

                                                    <!--begin::Options-->
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                        <span class="form-check-label">
                                                            Customer
                                                        </span>
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
                                                    <label class="form-check-label">
                                                        Enabled
                                                    </label>
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
                                    <!--end::Menu-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center position-relative mb-7">
                                    <!--begin::Label-->
                                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                    <!--end::Label-->

                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                    <!--end::Checkbox-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Dashgboard UI &amp; UX for Leafr CRM</a>

                                        <!--begin::Info-->
                                        <div class="text-gray-500">Due in 1 week <a href="#">Olivia Wild</a></div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </button>

                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc8b5">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->

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
                                                        data-dropdown-parent="#kt_menu_686fb458cc8b5"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-27-dmc5"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1"
                                                    >
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-28-h8kn" style="width: 100%;">
                                                        <span class="selection">
                                                            <span
                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="-1"
                                                                aria-disabled="false"
                                                            >
                                                                <ul class="select2-selection__rendered" id="select2-xdve-container"></ul>
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
                                                                        aria-describedby="select2-xdve-container"
                                                                        placeholder="Select option"
                                                                        style="width: 100%;"
                                                                    ></textarea>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>
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
                                                        <span class="form-check-label">
                                                            Author
                                                        </span>
                                                    </label>
                                                    <!--end::Options-->

                                                    <!--begin::Options-->
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                        <span class="form-check-label">
                                                            Customer
                                                        </span>
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
                                                    <label class="form-check-label">
                                                        Enabled
                                                    </label>
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
                                    <!--end::Menu-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex align-items-center position-relative">
                                    <!--begin::Label-->
                                    <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                    <!--end::Label-->

                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                    <!--end::Checkbox-->

                                    <!--begin::Details-->
                                    <div class="fw-semibold">
                                        <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Mivy App R&amp;D, Meeting with clients</a>

                                        <!--begin::Info-->
                                        <div class="text-gray-500">Due in 2 weeks <a href="#">Sean Bean</a></div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Details-->

                                    <!--begin::Menu-->
                                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                    </button>

                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_686fb458cc8be">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                        </div>
                                        <!--end::Header-->

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
                                                        data-dropdown-parent="#kt_menu_686fb458cc8be"
                                                        data-allow-clear="true"
                                                        data-select2-id="select2-data-29-ib1h"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1"
                                                    >
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-30-0mms" style="width: 100%;">
                                                        <span class="selection">
                                                            <span
                                                                class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="-1"
                                                                aria-disabled="false"
                                                            >
                                                                <ul class="select2-selection__rendered" id="select2-t6yp-container"></ul>
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
                                                                        aria-describedby="select2-t6yp-container"
                                                                        placeholder="Select option"
                                                                        style="width: 100%;"
                                                                    ></textarea>
                                                                </span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>
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
                                                        <span class="form-check-label">
                                                            Author
                                                        </span>
                                                    </label>
                                                    <!--end::Options-->

                                                    <!--begin::Options-->
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                        <span class="form-check-label">
                                                            Customer
                                                        </span>
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
                                                    <label class="form-check-label">
                                                        Enabled
                                                    </label>
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
                                    <!--end::Menu-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Tasks-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->

                <!--begin::Table-->
                <div class="card card-flush mt-6 mt-xl-9">
                    <!--begin::Card header-->
                    <div class="card-header mt-5">
                        <!--begin::Card title-->
                        <div class="card-title flex-column">
                            <h3 class="fw-bold mb-1">Project Spendings</h3>

                            <div class="fs-6 text-gray-500">Total $260,300 sepnt so far</div>
                        </div>
                        <!--begin::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar my-1">
                            <!--begin::Select-->
                            <div class="me-6 my-1">
                                <select
                                    id="kt_filter_year"
                                    name="year"
                                    data-control="select2"
                                    data-hide-search="true"
                                    class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible"
                                    data-select2-id="select2-data-kt_filter_year"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    data-kt-initialized="1"
                                >
                                    <option value="All" selected="" data-select2-id="select2-data-32-25vx">All time</option>
                                    <option value="thisyear">This year</option>
                                    <option value="thismonth">This month</option>
                                    <option value="lastmonth">Last month</option>
                                    <option value="last90days">Last 90 days</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-31-x550" style="width: 100%;">
                                    <span class="selection">
                                        <span
                                            class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm"
                                            role="combobox"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            tabindex="0"
                                            aria-disabled="false"
                                            aria-labelledby="select2-kt_filter_year-container"
                                            aria-controls="select2-kt_filter_year-container"
                                        >
                                            <span class="select2-selection__rendered" id="select2-kt_filter_year-container" role="textbox" aria-readonly="true" title="All time">All time</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                            </div>
                            <!--end::Select-->

                            <!--begin::Select-->
                            <div class="me-4 my-1">
                                <select
                                    id="kt_filter_orders"
                                    name="orders"
                                    data-control="select2"
                                    data-hide-search="true"
                                    class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible"
                                    data-select2-id="select2-data-kt_filter_orders"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    data-kt-initialized="1"
                                >
                                    <option value="All" selected="" data-select2-id="select2-data-34-l51r">All Orders</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Declined">Declined</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="In Transit">In Transit</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-33-7cvv" style="width: 100%;">
                                    <span class="selection">
                                        <span
                                            class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm"
                                            role="combobox"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            tabindex="0"
                                            aria-disabled="false"
                                            aria-labelledby="select2-kt_filter_orders-container"
                                            aria-controls="select2-kt_filter_orders-container"
                                        >
                                            <span class="select2-selection__rendered" id="select2-kt_filter_orders-container" role="textbox" aria-readonly="true" title="All Orders">All Orders</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                            </div>
                            <!--end::Select-->

                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3"><span class="path1"></span><span class="path2"></span></i>
                                <input type="text" id="kt_filter_search" class="form-control form-control-solid form-select-sm w-150px ps-9" placeholder="Search Order" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <div id="kt_profile_overview_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                <div id="" class="table-responsive">
                                    <table id="kt_profile_overview_table" class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable" style="width: 100%;">
                                        <colgroup>
                                            <col data-dt-column="0" style="width: 352.633px;" />
                                            <col data-dt-column="1" style="width: 211.578px;" />
                                            <col data-dt-column="2" style="width: 126.945px;" />
                                            <col data-dt-column="3" style="width: 148.961px;" />
                                            <col data-dt-column="4" style="width: 94.3828px;" />
                                        </colgroup>
                                        <thead class="fs-7 text-gray-500 text-uppercase">
                                            <tr role="row">
                                                <th class="min-w-250px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Manager: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Manager</span><span class="dt-column-order"></span>
                                                </th>
                                                <th class="min-w-150px dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span>
                                                </th>
                                                <th class="min-w-90px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Amount: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span>
                                                </th>
                                                <th class="min-w-90px dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Status: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span>
                                                </th>
                                                <th class="min-w-50px text-end dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Details: Activate to sort" tabindex="0">
                                                    <span class="dt-column-title" role="button">Details</span><span class="dt-column-order"></span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="fs-6">
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/assets/media/avatars/300-6.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Emma Smith</a>

                                                            <div class="fw-semibold text-gray-500">smith@kpmg.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-06-24T00:00:00+03:00">Jun 24, 2025</td>
                                                <td class="dt-type-numeric">$580.00</td>
                                                <td>
                                                    <span class="badge badge-light-info fw-bold px-4 py-3"> In progress </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-danger text-danger fw-semibold"> M </span>
                                                            </div>
                                                            <!--end::Avatar-->

                                                            <!--begin::Online-->
                                                            <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                            <!--end::Online-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Melody Macy</a>

                                                            <div class="fw-semibold text-gray-500">melody@altbox.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-08-19T00:00:00+03:00">Aug 19, 2025</td>
                                                <td class="dt-type-numeric">$457.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning fw-bold px-4 py-3"> Pending </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/assets/media/avatars/300-1.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Max Smith</a>

                                                            <div class="fw-semibold text-gray-500">max@kt.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-03-10T00:00:00+03:00">Mar 10, 2025</td>
                                                <td class="dt-type-numeric">$865.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning fw-bold px-4 py-3"> Pending </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/assets/media/avatars/300-5.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Sean Bean</a>

                                                            <div class="fw-semibold text-gray-500">sean@dellito.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-06-24T00:00:00+03:00">Jun 24, 2025</td>
                                                <td class="dt-type-numeric">$676.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning fw-bold px-4 py-3"> Pending </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/assets/media/avatars/300-25.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Brian Cox</a>

                                                            <div class="fw-semibold text-gray-500">brian@exchange.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-06-20T00:00:00+03:00">Jun 20, 2025</td>
                                                <td class="dt-type-numeric">$563.00</td>
                                                <td>
                                                    <span class="badge badge-light-danger fw-bold px-4 py-3"> Rejected </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-warning text-warning fw-semibold"> C </span>
                                                            </div>
                                                            <!--end::Avatar-->

                                                            <!--begin::Online-->
                                                            <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                            <!--end::Online-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Mikaela Collins</a>

                                                            <div class="fw-semibold text-gray-500">mik@pex.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-10-25T00:00:00+03:00">Oct 25, 2025</td>
                                                <td class="dt-type-numeric">$856.00</td>
                                                <td>
                                                    <span class="badge badge-light-info fw-bold px-4 py-3"> In progress </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/assets/media/avatars/300-9.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Francis Mitcham</a>

                                                            <div class="fw-semibold text-gray-500">f.mit@kpmg.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-04-15T00:00:00+03:00">Apr 15, 2025</td>
                                                <td class="dt-type-numeric">$644.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning fw-bold px-4 py-3"> Pending </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-danger text-danger fw-semibold"> O </span>
                                                            </div>
                                                            <!--end::Avatar-->

                                                            <!--begin::Online-->
                                                            <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                            <!--end::Online-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Olivia Wild</a>

                                                            <div class="fw-semibold text-gray-500">olivia@corpmail.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-10-25T00:00:00+03:00">Oct 25, 2025</td>
                                                <td class="dt-type-numeric">$730.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning fw-bold px-4 py-3"> Pending </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <span class="symbol-label bg-light-primary text-primary fw-semibold"> N </span>
                                                            </div>
                                                            <!--end::Avatar-->

                                                            <!--begin::Online-->
                                                            <div class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1"></div>
                                                            <!--end::Online-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Neil Owen</a>

                                                            <div class="fw-semibold text-gray-500">owen.neil@gmail.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-02-21T00:00:00+03:00">Feb 21, 2025</td>
                                                <td class="dt-type-numeric">$947.00</td>
                                                <td>
                                                    <span class="badge badge-light-info fw-bold px-4 py-3"> In progress </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Wrapper-->
                                                        <div class="me-5 position-relative">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-35px symbol-circle">
                                                                <img alt="Pic" src="/assets/media/avatars/300-23.jpg" />
                                                            </div>
                                                            <!--end::Avatar-->
                                                        </div>
                                                        <!--end::Wrapper-->

                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a href="" class="fs-6 text-gray-800 text-hover-primary">Dan Wilson</a>

                                                            <div class="fw-semibold text-gray-500">dam@consilting.com</div>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->
                                                </td>
                                                <td data-order="2025-06-20T00:00:00+03:00">Jun 20, 2025</td>
                                                <td class="dt-type-numeric">$618.00</td>
                                                <td>
                                                    <span class="badge badge-light-info fw-bold px-4 py-3"> In progress </span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-sm">View</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                                <div id="" class="row">
                                    <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar">
                                        <div>
                                            <select name="kt_profile_overview_table_length" aria-controls="kt_profile_overview_table" class="form-select form-select-solid form-select-sm" id="dt-length-0">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            <label for="dt-length-0"></label>
                                        </div>
                                    </div>
                                    <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                        <div class="dt-paging paging_simple_numbers">
                                            <nav>
                                                <ul class="pagination">
                                                    <li class="dt-paging-button page-item disabled">
                                                        <button class="page-link previous" role="link" type="button" aria-controls="kt_profile_overview_table" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1">
                                                            <i class="previous"></i>
                                                        </button>
                                                    </li>
                                                    <li class="dt-paging-button page-item active">
                                                        <button class="page-link" role="link" type="button" aria-controls="kt_profile_overview_table" aria-current="page" data-dt-idx="0">1</button>
                                                    </li>
                                                    <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_profile_overview_table" data-dt-idx="1">2</button></li>
                                                    <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_profile_overview_table" data-dt-idx="2">3</button></li>
                                                    <li class="dt-paging-button page-item">
                                                        <button class="page-link next" role="link" type="button" aria-controls="kt_profile_overview_table" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
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
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>

@endsection
@section('page-scripts')
@include('components.scripts.pagination-scripts')

@endsection
