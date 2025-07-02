@extends('layouts.app') @section('title', __('messages.teams')) @section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.teams') }}</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.team_details') }}</li>
                        </ul>
                        <!--end::Breadcrumb-->

                        <!--begin::Title-->
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.team_details') }}</h1>
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
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        <img src="/assets/media/avatars/300-1.jpg" alt="image" />
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Name-->
                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1"> Max Smith </a>
                                    <!--end::Name-->

                                    <!--begin::Position-->
                                    <div class="fs-5 fw-semibold text-muted mb-6">Software Enginer</div>
                                    <!--end::Position-->

                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap flex-center">
                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-75px">6,900</span>
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <div class="fw-semibold text-muted">Earnings</div>
                                        </div>
                                        <!--end::Stats-->

                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">130</span>
                                                <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <div class="fw-semibold text-muted">Tasks</div>
                                        </div>
                                        <!--end::Stats-->

                                        <!--begin::Stats-->
                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">500</span>
                                                <i class="ki-duotone ki-arrow-up fs-3 text-success"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <div class="fw-semibold text-muted">Hours</div>
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Summary-->

                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                                        Details
                                        <span class="ms-2 rotate-180"> <i class="ki-duotone ki-down fs-3"></i> </span>
                                    </div>

                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Edit customer details" data-kt-initialized="1">
                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_customer"> Edit </a>
                                    </span>
                                </div>
                                <!--end::Details toggle-->

                                <div class="separator separator-dashed my-3"></div>

                                <!--begin::Details content-->
                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-5 fs-6">
                                        <!--begin::Badge-->
                                        <div class="badge badge-light-info d-inline">Premium user</div>
                                        <!--begin::Badge-->

                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Account ID</div>
                                        <div class="text-gray-600">ID-45453423</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Billing Email</div>
                                        <div class="text-gray-600"><a href="#" class="text-gray-600 text-hover-primary">info@keenthemes.com</a></div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Billing Address</div>
                                        <div class="text-gray-600">101 Collin Street, <br />Melbourne 3000 VIC<br />Australia</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Language</div>
                                        <div class="text-gray-600">English</div>
                                        <!--begin::Details item-->
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>

                        </div>
                    </div>
                    <!--end::Sidebar-->

                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8" role="tablist">
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab" aria-selected="true" role="tab">Overview</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_overview_events_and_logs_tab" aria-selected="false" role="tab" tabindex="-1">Events &amp; Logs</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_overview_statements" data-kt-initialized="1" aria-selected="false" role="tab" tabindex="-1">Statements</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item ms-auto">
                                <!--begin::Action menu-->
                                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    Actions
                                    <i class="ki-duotone ki-down fs-2 me-0"></i>
                                </a>
                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5"> Create invoice </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link flex-stack px-5">
                                            Create payments

                                            <span class="ms-2" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
                                                <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
                                        <a href="#" class="menu-link px-5">
                                            <span class="menu-title">Subscription</span>
                                            <span class="menu-arrow"></span>
                                        </a>

                                        <!--begin::Menu sub-->
                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-5"> Apps </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-5"> Billing </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-5"> Statements </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu separator-->
                                            <div class="separator my-2"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content px-3">
                                                    <label class="form-check form-switch form-check-custom form-check-solid">
                                                        <input class="form-check-input w-30px h-20px" type="checkbox" value="" name="notifications" checked="" id="kt_user_menu_notifications" />
                                                        <span class="form-check-label text-muted fs-6" for="kt_user_menu_notifications"> Notifications </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu sub-->
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-3"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link px-5"> Reports </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="#" class="menu-link px-5"> Account Settings </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="#" class="menu-link text-danger px-5"> Delete customer </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->
                                <!--end::Menu-->
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->

                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade active show" id="kt_customer_view_overview_tab" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Payment Records</h2>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                                <i class="ki-duotone ki-plus-square fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                Add payment
                                            </button>
                                            <!--end::Filter-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table-->
                                        <div id="kt_table_customers_payment_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                            <div id="" class="table-responsive">
                                                <table class="table align-middle table-row-dashed gy-5 dataTable" id="kt_table_customers_payment" style="width: 100%">
                                                    <colgroup>
                                                        <col data-dt-column="0" style="width: 100px" />
                                                        <col data-dt-column="1" style="width: 91.9688px" />
                                                        <col data-dt-column="2" style="width: 80.7031px" />
                                                        <col data-dt-column="3" style="width: 100px" />
                                                        <col data-dt-column="4" style="width: 100px" />
                                                    </colgroup>
                                                    <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                        <tr class="text-start text-muted text-uppercase gs-0" role="row">
                                                            <th class="min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Invoice No.: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Invoice No.</span><span class="dt-column-order"></span></th>
                                                            <th data-dt-column="1" rowspan="1" colspan="1" class="dt-orderable-asc dt-orderable-desc" aria-label="Status: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Status</span><span class="dt-column-order"></span></th>
                                                            <th data-dt-column="2" rowspan="1" colspan="1" class="dt-type-numeric dt-orderable-asc dt-orderable-desc" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span></th>
                                                            <th class="min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                                                            <th class="text-end min-w-100px pe-4 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Actions"><span class="dt-column-title">Actions</span><span class="dt-column-order"></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold text-gray-600">
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">4718-9652</a>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <td class="dt-type-numeric">$1,200.00</td>
                                                            <td data-order="2020-12-14T20:43:00+03:00">14 Dec 2020, 8:43 pm</td>
                                                            <td class="pe-0 text-end">
                                                                <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    Actions
                                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                                </a>
                                                                <!--begin::Menu-->
                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                                                    </div>
                                                                    <!--end::Menu item-->
                                                                </div>
                                                                <!--end::Menu-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">3890-5988</a>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <td class="dt-type-numeric">$79.00</td>
                                                            <td data-order="2020-12-01T10:12:00+03:00">01 Dec 2020, 10:12 am</td>
                                                            <td class="pe-0 text-end">
                                                                <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    Actions
                                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                                </a>
                                                                <!--begin::Menu-->
                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                                                    </div>
                                                                    <!--end::Menu item-->
                                                                </div>
                                                                <!--end::Menu-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">3600-1283</a>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <td class="dt-type-numeric">$5,500.00</td>
                                                            <td data-order="2020-11-12T14:01:00+03:00">12 Nov 2020, 2:01 pm</td>
                                                            <td class="pe-0 text-end">
                                                                <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    Actions
                                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                                </a>
                                                                <!--begin::Menu-->
                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                                                    </div>
                                                                    <!--end::Menu item-->
                                                                </div>
                                                                <!--end::Menu-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">5431-6878</a>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-warning">Pending</span>
                                                            </td>
                                                            <td class="dt-type-numeric">$880.00</td>
                                                            <td data-order="2020-10-21T17:54:00+03:00">21 Oct 2020, 5:54 pm</td>
                                                            <td class="pe-0 text-end">
                                                                <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    Actions
                                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                                </a>
                                                                <!--begin::Menu-->
                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                                                    </div>
                                                                    <!--end::Menu item-->
                                                                </div>
                                                                <!--end::Menu-->
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#" class="text-gray-600 text-hover-primary mb-1">3165-5269</a>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-light-success">Successful</span>
                                                            </td>
                                                            <td class="dt-type-numeric">$7,650.00</td>
                                                            <td data-order="2020-10-19T07:32:00+03:00">19 Oct 2020, 7:32 am</td>
                                                            <td class="pe-0 text-end">
                                                                <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                    Actions
                                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                                                                </a>
                                                                <!--begin::Menu-->
                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="/apps/customers/view.html" class="menu-link px-3"> View </a>
                                                                    </div>
                                                                    <!--end::Menu item-->

                                                                    <!--begin::Menu item-->
                                                                    <div class="menu-item px-3">
                                                                        <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row"> Delete </a>
                                                                    </div>
                                                                    <!--end::Menu item-->
                                                                </div>
                                                                <!--end::Menu-->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>
                                            <div id="" class="row">
                                                <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                    <div class="dt-paging paging_simple_numbers">
                                                        <nav>
                                                            <ul class="pagination">
                                                                <li class="dt-paging-button page-item disabled">
                                                                    <button class="page-link previous" role="link" type="button" aria-controls="kt_table_customers_payment" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button>
                                                                </li>
                                                                <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_table_customers_payment" aria-current="page" data-dt-idx="0">1</button></li>
                                                                <li class="dt-paging-button page-item"><button class="page-link" role="link" type="button" aria-controls="kt_table_customers_payment" data-dt-idx="1">2</button></li>
                                                                <li class="dt-paging-button page-item">
                                                                    <button class="page-link next" role="link" type="button" aria-controls="kt_table_customers_payment" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Table-->
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Logs</h2>
                                        </div>
                                        <!--end::Card title-->

                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-cloud-download fs-3"><span class="path1"></span><span class="path2"></span></i>
                                                Download Report
                                            </button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->

                                    <!--begin::Card body-->
                                    <div class="card-body py-0">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                                <tbody>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_1466_7694/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">25 Oct 2025, 6:05 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_5432_1336/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Nov 2025, 8:43 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_9146_3855/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">20 Jun 2025, 10:10 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_1466_7694/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Nov 2025, 2:40 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-warning">404 WRN</div>
                                                        </td>
                                                        <td>POST /v1/customer/c_68650b6d56c91/not_found</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Mar 2025, 6:43 am</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_1007_8052/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">22 Sep 2025, 2:40 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_2391_5306/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">20 Dec 2025, 11:05 am</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_5432_1336/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">25 Oct 2025, 5:20 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_5432_1336/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">19 Aug 2025, 2:40 pm</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_1466_7694/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">20 Dec 2025, 6:05 pm</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>

                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end:::Tab pane-->

                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                                <!--begin::Earnings-->
                                <div class="card mb-6 mb-xl-9">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h2>Earnings</h2>
                                        </div>
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Body-->
                                    <div class="card-body py-0">
                                        <div class="fs-5 fw-semibold text-gray-500 mb-4">Last 30 day earnings calculated. Apart from arranging the order of topics.</div>

                                        <!--begin::Left Section-->
                                        <div class="d-flex flex-wrap flex-stack mb-5">
                                            <!--begin::Row-->
                                            <div class="d-flex flex-wrap">

                                                <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                    <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                        <span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$" class="counted" data-kt-initialized="1">$6,840</span>
                                                        <i class="ki-duotone ki-arrow-up fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                    <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Net Earnings</span>
                                                </div>



                                                <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                                    <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                        <span class="counted" data-kt-countup="true" data-kt-countup-value="16" data-kt-initialized="1">16</span>% <i class="ki-duotone ki-arrow-down fs-1 text-danger"><span class="path1"></span><span class="path2"></span></i>
                                                    </span>
                                                    <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Change</span>
                                                </div>



                                                <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                    <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                        <span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$">0</span>
                                                        <span class="text-primary">--</span>
                                                    </span>
                                                    <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Fees</span>
                                                </div>

                                            </div>
                                            <!--end::Row-->

                                            <a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw Earnings</a>
                                        </div>
                                        <!--end::Left Section-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Earnings-->

                                <!--begin::Statements-->
                                <div class="card mb-6 mb-xl-9">
                                    <!--begin::Header-->
                                    <div class="card-header">
                                        <!--begin::Title-->
                                        <div class="card-title">
                                            <h2>Statement</h2>
                                        </div>
                                        <!--end::Title-->

                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Tab nav-->
                                            <ul class="nav nav-stretch fs-5 fw-semibold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_1" aria-selected="true"> This Year </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_2" aria-selected="false" tabindex="-1"> 2020 </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_3" aria-selected="false" tabindex="-1"> 2019 </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_4" aria-selected="false" tabindex="-1"> 2018 </a>
                                                </li>
                                            </ul>
                                            <!--end::Tab nav-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Header-->

                                    <!--begin::Card body-->
                                    <div class="card-body pb-5">
                                        <!--begin::Tab Content-->
                                        <div id="kt_customer_view_statement_tab_content" class="tab-content">
                                            <!--begin::Tab panel-->
                                            <div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active" role="tabpanel">
                                                <!--begin::Table-->
                                                <div id="kt_customer_view_statement_table_1_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                                    <div id="" class="table-responsive">
                                                        <table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4 dataTable" style="width: 100%">
                                                            <colgroup>
                                                                <col data-dt-column="0" style="width: 0px" />
                                                                <col data-dt-column="1" style="width: 0px" />
                                                                <col data-dt-column="2" style="width: 0px" />
                                                                <col data-dt-column="3" style="width: 0px" />
                                                                <col data-dt-column="4" style="width: 0px" />
                                                            </colgroup>
                                                            <thead class="border-bottom border-gray-200">
                                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                                                    <th class="w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Order ID: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Order ID</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-300px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Details: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Details</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px text-end pe-7 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Invoice"><span class="dt-column-title">Invoice</span><span class="dt-column-order"></span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td data-order="2021-01-01T00:00:00+03:00">Nov 01, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                                                    <td>Darknight transparency 36 Icons Pack</td>
                                                                    <td class="text-success dt-type-numeric">$38.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-24T00:00:00+03:00">Oct 24, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-2.60</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-08T00:00:00+03:00">Oct 08, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Cartoon Mobile Emoji Phone Pack</td>
                                                                    <td class="text-success dt-type-numeric">$76.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-15T00:00:00+03:00">Sep 15, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                                    <td class="text-success dt-type-numeric">$5.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-30T00:00:00+03:00">May 30, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">523445943</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-1.30</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-22T00:00:00+03:00">Apr 22, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">231445943</a></td>
                                                                    <td>Parcel Shipping / Delivery Service App</td>
                                                                    <td class="text-success dt-type-numeric">$204.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-09T00:00:00+03:00">Feb 09, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                                                    <td>Visual Design Illustration</td>
                                                                    <td class="text-success dt-type-numeric">$31.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-01T00:00:00+03:00">Nov 01, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">984445943</a></td>
                                                                    <td>Abstract Vusial Pack</td>
                                                                    <td class="text-success dt-type-numeric">$52.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-04T00:00:00+03:00">Jan 04, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">324442313</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-0.80</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2021-01-01T00:00:00+03:00">Nov 01, 2021</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                                                    <td>Darknight transparency 36 Icons Pack</td>
                                                                    <td class="text-success dt-type-numeric">$38.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot></tfoot>
                                                        </table>
                                                    </div>
                                                    <div id="" class="row">
                                                        <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                        <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                            <div class="dt-paging paging_simple_numbers">
                                                                <nav>
                                                                    <ul class="pagination">
                                                                        <li class="dt-paging-button page-item disabled">
                                                                            <button class="page-link previous" role="link" type="button" aria-controls="kt_customer_view_statement_table_1" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button>
                                                                        </li>
                                                                        <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_customer_view_statement_table_1" aria-current="page" data-dt-idx="0">1</button></li>
                                                                        <li class="dt-paging-button page-item">
                                                                            <button class="page-link next" role="link" type="button" aria-controls="kt_customer_view_statement_table_1" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Tab panel-->
                                            <!--begin::Tab panel-->
                                            <div id="kt_customer_view_statement_2" class="py-0 tab-pane fade" role="tabpanel">
                                                <!--begin::Table-->
                                                <div id="kt_customer_view_statement_table_2_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                                    <div id="" class="table-responsive">
                                                        <table id="kt_customer_view_statement_table_2" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4 dataTable" style="width: 100%">
                                                            <colgroup>
                                                                <col data-dt-column="0" style="width: 0px" />
                                                                <col data-dt-column="1" style="width: 0px" />
                                                                <col data-dt-column="2" style="width: 0px" />
                                                                <col data-dt-column="3" style="width: 0px" />
                                                                <col data-dt-column="4" style="width: 0px" />
                                                            </colgroup>
                                                            <thead class="border-bottom border-gray-200">
                                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                                                    <th class="w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Order ID: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Order ID</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-300px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Details: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Details</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px text-end pe-7 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Invoice"><span class="dt-column-title">Invoice</span><span class="dt-column-order"></span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td data-order="2020-01-30T00:00:00+03:00">May 30, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">523445943</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-1.30</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-22T00:00:00+03:00">Apr 22, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">231445943</a></td>
                                                                    <td>Parcel Shipping / Delivery Service App</td>
                                                                    <td class="text-success dt-type-numeric">$204.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-09T00:00:00+03:00">Feb 09, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                                                    <td>Visual Design Illustration</td>
                                                                    <td class="text-success dt-type-numeric">$31.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-01T00:00:00+03:00">Nov 01, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">984445943</a></td>
                                                                    <td>Abstract Vusial Pack</td>
                                                                    <td class="text-success dt-type-numeric">$52.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-04T00:00:00+03:00">Jan 04, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">324442313</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-0.80</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-01T00:00:00+03:00">Nov 01, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                                                    <td>Darknight transparency 36 Icons Pack</td>
                                                                    <td class="text-success dt-type-numeric">$38.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-24T00:00:00+03:00">Oct 24, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-2.60</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-08T00:00:00+03:00">Oct 08, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Cartoon Mobile Emoji Phone Pack</td>
                                                                    <td class="text-success dt-type-numeric">$76.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-15T00:00:00+03:00">Sep 15, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                                    <td class="text-success dt-type-numeric">$5.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2020-01-30T00:00:00+03:00">May 30, 2020</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">523445943</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-1.30</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot></tfoot>
                                                        </table>
                                                    </div>
                                                    <div id="" class="row">
                                                        <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                        <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                            <div class="dt-paging paging_simple_numbers">
                                                                <nav>
                                                                    <ul class="pagination">
                                                                        <li class="dt-paging-button page-item disabled">
                                                                            <button class="page-link previous" role="link" type="button" aria-controls="kt_customer_view_statement_table_2" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button>
                                                                        </li>
                                                                        <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_customer_view_statement_table_2" aria-current="page" data-dt-idx="0">1</button></li>
                                                                        <li class="dt-paging-button page-item">
                                                                            <button class="page-link next" role="link" type="button" aria-controls="kt_customer_view_statement_table_2" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Tab panel-->
                                            <!--begin::Tab panel-->
                                            <div id="kt_customer_view_statement_3" class="py-0 tab-pane fade" role="tabpanel">
                                                <!--begin::Table-->
                                                <div id="kt_customer_view_statement_table_3_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                                    <div id="" class="table-responsive">
                                                        <table id="kt_customer_view_statement_table_3" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4 dataTable" style="width: 100%">
                                                            <colgroup>
                                                                <col data-dt-column="0" style="width: 0px" />
                                                                <col data-dt-column="1" style="width: 0px" />
                                                                <col data-dt-column="2" style="width: 0px" />
                                                                <col data-dt-column="3" style="width: 0px" />
                                                                <col data-dt-column="4" style="width: 0px" />
                                                            </colgroup>
                                                            <thead class="border-bottom border-gray-200">
                                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                                                    <th class="w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Order ID: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Order ID</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-300px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Details: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Details</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px text-end pe-7 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Invoice"><span class="dt-column-title">Invoice</span><span class="dt-column-order"></span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td data-order="2019-01-09T00:00:00+03:00">Feb 09, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                                                    <td>Visual Design Illustration</td>
                                                                    <td class="text-success dt-type-numeric">$31.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-01T00:00:00+03:00">Nov 01, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">984445943</a></td>
                                                                    <td>Abstract Vusial Pack</td>
                                                                    <td class="text-success dt-type-numeric">$52.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-04T00:00:00+03:00">Jan 04, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">324442313</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-0.80</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-15T00:00:00+03:00">Sep 15, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                                    <td class="text-success dt-type-numeric">$5.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-01T00:00:00+03:00">Nov 01, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                                                    <td>Darknight transparency 36 Icons Pack</td>
                                                                    <td class="text-success dt-type-numeric">$38.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-24T00:00:00+03:00">Oct 24, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-2.60</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-08T00:00:00+03:00">Oct 08, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Cartoon Mobile Emoji Phone Pack</td>
                                                                    <td class="text-success dt-type-numeric">$76.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-30T00:00:00+03:00">May 30, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">523445943</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-1.30</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-22T00:00:00+03:00">Apr 22, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">231445943</a></td>
                                                                    <td>Parcel Shipping / Delivery Service App</td>
                                                                    <td class="text-success dt-type-numeric">$204.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-09T00:00:00+03:00">Feb 09, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                                                    <td>Visual Design Illustration</td>
                                                                    <td class="text-success dt-type-numeric">$31.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot></tfoot>
                                                        </table>
                                                    </div>
                                                    <div id="" class="row">
                                                        <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                        <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                            <div class="dt-paging paging_simple_numbers">
                                                                <nav>
                                                                    <ul class="pagination">
                                                                        <li class="dt-paging-button page-item disabled">
                                                                            <button class="page-link previous" role="link" type="button" aria-controls="kt_customer_view_statement_table_3" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button>
                                                                        </li>
                                                                        <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_customer_view_statement_table_3" aria-current="page" data-dt-idx="0">1</button></li>
                                                                        <li class="dt-paging-button page-item">
                                                                            <button class="page-link next" role="link" type="button" aria-controls="kt_customer_view_statement_table_3" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Tab panel-->
                                            <!--begin::Tab panel-->
                                            <div id="kt_customer_view_statement_4" class="py-0 tab-pane fade" role="tabpanel">
                                                <!--begin::Table-->
                                                <div id="kt_customer_view_statement_table_4_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                                                    <div id="" class="table-responsive">
                                                        <table id="kt_customer_view_statement_table_4" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-4 dataTable" style="width: 100%">
                                                            <colgroup>
                                                                <col data-dt-column="0" style="width: 0px" />
                                                                <col data-dt-column="1" style="width: 0px" />
                                                                <col data-dt-column="2" style="width: 0px" />
                                                                <col data-dt-column="3" style="width: 0px" />
                                                                <col data-dt-column="4" style="width: 0px" />
                                                            </colgroup>
                                                            <thead class="border-bottom border-gray-200">
                                                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0" role="row">
                                                                    <th class="w-125px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Date: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Date</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="Order ID: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Order ID</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-300px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Details: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Details</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Amount: Activate to sort" tabindex="0"><span class="dt-column-title" role="button">Amount</span><span class="dt-column-order"></span></th>
                                                                    <th class="w-100px text-end pe-7 dt-orderable-none" data-dt-column="4" rowspan="1" colspan="1" aria-label="Invoice"><span class="dt-column-title">Invoice</span><span class="dt-column-order"></span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td data-order="2018-01-01T00:00:00+03:00">Nov 01, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                                                    <td>Darknight transparency 36 Icons Pack</td>
                                                                    <td class="text-success dt-type-numeric">$38.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-24T00:00:00+03:00">Oct 24, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-2.60</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-01T00:00:00+03:00">Nov 01, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">102445788</a></td>
                                                                    <td>Darknight transparency 36 Icons Pack</td>
                                                                    <td class="text-success dt-type-numeric">$38.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-24T00:00:00+03:00">Oct 24, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">423445721</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-2.60</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-09T00:00:00+03:00">Feb 09, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                                                    <td>Visual Design Illustration</td>
                                                                    <td class="text-success dt-type-numeric">$31.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-01T00:00:00+03:00">Nov 01, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">984445943</a></td>
                                                                    <td>Abstract Vusial Pack</td>
                                                                    <td class="text-success dt-type-numeric">$52.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-04T00:00:00+03:00">Jan 04, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">324442313</a></td>
                                                                    <td>Seller Fee</td>
                                                                    <td class="text-danger dt-type-numeric">$-0.80</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-08T00:00:00+03:00">Oct 08, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Cartoon Mobile Emoji Phone Pack</td>
                                                                    <td class="text-success dt-type-numeric">$76.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2018-01-08T00:00:00+03:00">Oct 08, 2018</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">312445984</a></td>
                                                                    <td>Cartoon Mobile Emoji Phone Pack</td>
                                                                    <td class="text-success dt-type-numeric">$76.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                                <tr>
                                                                    <td data-order="2019-01-09T00:00:00+03:00">Feb 09, 2019</td>
                                                                    <td class="dt-type-numeric"><a href="#" class="text-gray-600 text-hover-primary">426445943</a></td>
                                                                    <td>Visual Design Illustration</td>
                                                                    <td class="text-success dt-type-numeric">$31.00</td>
                                                                    <td class="text-end"><button class="btn btn-sm btn-light btn-active-light-primary">Download</button></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot></tfoot>
                                                        </table>
                                                    </div>
                                                    <div id="" class="row">
                                                        <div id="" class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                        <div id="" class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                                            <div class="dt-paging paging_simple_numbers">
                                                                <nav>
                                                                    <ul class="pagination">
                                                                        <li class="dt-paging-button page-item disabled">
                                                                            <button class="page-link previous" role="link" type="button" aria-controls="kt_customer_view_statement_table_4" aria-disabled="true" aria-label="Previous" data-dt-idx="previous" tabindex="-1"><i class="previous"></i></button>
                                                                        </li>
                                                                        <li class="dt-paging-button page-item active"><button class="page-link" role="link" type="button" aria-controls="kt_customer_view_statement_table_4" aria-current="page" data-dt-idx="0">1</button></li>
                                                                        <li class="dt-paging-button page-item">
                                                                            <button class="page-link next" role="link" type="button" aria-controls="kt_customer_view_statement_table_4" aria-label="Next" data-dt-idx="next"><i class="next"></i></button>
                                                                        </li>
                                                                    </ul>
                                                                </nav>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Tab panel-->
                                        </div>
                                        <!--end::Tab Content-->
                                    </div>

                                </div>
                                <!--end::Statements-->
                            </div>
                            <!--end:::Tab pane-->
                        </div>
                        <!--end:::Tab content-->
                    </div>

                </div>
            </div>
            <!--end::Content container-->
        </div>

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
@endsection @section('page-scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    document.querySelector("#kt_filter_modal form").addEventListener("submit", function (e) {
        const form = e.target;
        [...form.elements].forEach((el) => {
            if ((el.tagName === "INPUT" || el.tagName === "SELECT") && !el.disabled) {
                if (el.type === "checkbox" || el.type === "radio") {
                    if (!el.checked) el.name = ""; // unchecked checkbox/radio gönderilmez
                } else if (!el.value) {
                    el.name = ""; // boş input gönderilmez
                }
            }
        });
    });
</script>
@endsection
