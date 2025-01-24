@extends('layouts.no-sidebar')
@section('title', __('messages.reservation_details'))

@section('content')

@section('custom-styles')
    <link href="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="../dist/index.html" class="text-gray-500">
                                    <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Pages</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Account</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">Overview</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Account Overview</h1>
                    </div>
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create Project</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                            <div class="me-7 mb-4">
                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                    <img src="assets/media/avatars/300-3.jpg" alt="image" />
                                    <div
                                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"
                                    ></div>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Johnson</a>
                                            <a href="#">
                                                <i class="ki-duotone ki-verify fs-1 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_upgrade_plan"
                                                >Upgrade to Pro</a
                                            >
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span> </i
                                                >React Developer</a
                                            >
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span> </i
                                                >SF, Bay Area</a
                                            >
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <i class="ki-duotone ki-sms fs-4 me-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span> </i
                                                >johnson@kt.com</a
                                            >
                                        </div>
                                    </div>
                                    <div class="d-flex my-4">
                                        <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                            <i class="ki-duotone ki-check fs-2 d-none"></i>
                                            <span class="indicator-label">Follow</span>
                                            <span class="indicator-progress"
                                                >Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span
                                            ></span>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
                                        <div class="me-0">
                                            <button
                                                class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end"
                                            >
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <div
                                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                data-kt-menu="true"
                                            >
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3"
                                                        >Create Payment
                                                        <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                            <i class="ki-duotone ki-information fs-6">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                            </i> </span
                                                    ></a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                                </div>
                                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                                    <a href="#" class="menu-link px-3">
                                                        <span class="menu-title">Subscription</span>
                                                        <span class="menu-arrow"></span>
                                                    </a>
                                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Plans</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Billing</a>
                                                        </div>
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">Statements</a>
                                                        </div>
                                                        <div class="separator my-2"></div>
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3">
                                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                                    <input
                                                                        class="form-check-input w-30px h-20px"
                                                                        type="checkbox"
                                                                        value="1"
                                                                        checked="checked"
                                                                        name="notifications"
                                                                    />
                                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="menu-item px-3 my-1">
                                                    <a href="#" class="menu-link px-3">Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <div class="d-flex flex-wrap">
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-up fs-2 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Earnings</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-down fs-2 text-danger me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Projects</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-up fs-2 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Success Rate</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                            <span class="fw-bold fs-6">50%</span>
                                        </div>
                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                            <div
                                                class="bg-success rounded h-5px"
                                                role="progressbar"
                                                style="width: 50%"
                                                aria-valuenow="50"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                            ></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="../dist/account/overview.html">Overview</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="../dist/account/settings.html">Settings</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Security</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Activity</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Billing</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Statements</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Referrals</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">API Keys</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Logs</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <div class="card-header cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                        <a href="../dist/account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
                    </div>
                    <div class="card-body p-9">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">Max Smith</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Company</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">Keenthemes</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted"
                                >Contact Phone
                                <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                    <i class="ki-duotone ki-information fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i> </span
                            ></label>
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">044 3276 454 935</span>
                                <span class="badge badge-success">Verified</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Company Site</label>
                            <div class="col-lg-8">
                                <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">keenthemes.com</a>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted"
                                >Country
                                <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                    <i class="ki-duotone ki-information fs-7">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i> </span
                            ></label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">Germany</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Communication</label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">Email, Phone</span>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
                            <div class="col-lg-8">
                                <span class="fw-semibold fs-6 text-gray-800">Yes</span>
                            </div>
                        </div>
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                            <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                            <div class="d-flex flex-stack flex-grow-1">
                                <div class="fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                    <div class="fs-6 text-gray-700">
                                        Your payment was declined. To start using tools, please
                                        <a class="fw-bold" href="#">Add Payment Method</a>.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-8 mb-xl-10">
                        <div class="card card-flush h-lg-100">
                            <div class="card-header flex-nowrap pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Top Selling Categories</span>
                                    <span class="text-gray-400 pt-2 fw-semibold fs-6">8k social visitors</span>
                                </h3>
                                <div class="card-toolbar">
                                    <button
                                        class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                        data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true"
                                    >
                                        <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                        data-kt-menu="true"
                                    >
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                        </div>
                                        <div class="separator mb-3 opacity-75"></div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Ticket</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Customer</a>
                                        </div>
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Admin Group</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Staff Group</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Member Group</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Contact</a>
                                        </div>
                                        <div class="separator mt-3 opacity-75"></div>
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-5 ps-6">
                                <div id="kt_charts_widget_5" class="min-h-auto"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-5 mb-xl-10">
                        <div class="card h-md-100" dir="ltr">
                            <div class="card-body d-flex flex-column flex-center">
                                <div class="mb-2">
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">
                                        Have you tried <br />new
                                        <span class="fw-bolder">Mobile Application ?</span>
                                    </h1>
                                    <div class="py-10 text-center">
                                        <img src="assets/media/svg/illustrations/easy/1.svg" class="theme-light-show w-200px" alt="" />
                                        <img src="assets/media/svg/illustrations/easy/1-dark.svg" class="theme-dark-show w-200px" alt="" />
                                    </div>
                                </div>
                                <div class="text-center mb-1">
                                    <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_create_app" data-bs-toggle="modal">Try now</a>
                                    <a class="btn btn-sm btn-light" href="../dist/apps/invoices/view/invoice-1.html">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-4">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header pt-7">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Product Delivery</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">1M Products Shipped so far</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">Order Details</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="hover-scroll-overlay-y pe-6 me-n6" style="height: 415px">
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            </div>
                                            <div class="m-0">
                                                <button
                                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true"
                                                >
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                    data-kt-menu="true"
                                                >
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                    </div>
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Customer</a>
                                                    </div>
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">New Group</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Member Group</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Contact</a>
                                                    </div>
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-stack">
                                            <span class="text-gray-400 fw-bold">To: <a href="#" class="text-gray-800 text-hover-primary fw-bold">Jason Bourne</a></span>
                                            <span class="badge badge-light-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            </div>
                                            <div class="m-0">
                                                <button
                                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true"
                                                >
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                    data-kt-menu="true"
                                                >
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                    </div>
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Customer</a>
                                                    </div>
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">New Group</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Member Group</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Contact</a>
                                                    </div>
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-stack">
                                            <span class="text-gray-400 fw-bold">To: <a href="#" class="text-gray-800 text-hover-primary fw-bold">Marie Durant</a></span>
                                            <span class="badge badge-light-primary">Shipping</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/214.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            </div>
                                            <div class="m-0">
                                                <button
                                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true"
                                                >
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                    data-kt-menu="true"
                                                >
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                    </div>
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Customer</a>
                                                    </div>
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">New Group</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Member Group</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Contact</a>
                                                    </div>
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-stack">
                                            <span class="text-gray-400 fw-bold">To: <a href="#" class="text-gray-800 text-hover-primary fw-bold">Dan Wilson</a></span>
                                            <span class="badge badge-light-danger">Confirmed</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/211.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            </div>
                                            <div class="m-0">
                                                <button
                                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true"
                                                >
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                    data-kt-menu="true"
                                                >
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                    </div>
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Customer</a>
                                                    </div>
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">New Group</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Member Group</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Contact</a>
                                                    </div>
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-stack">
                                            <span class="text-gray-400 fw-bold">To: <a href="#" class="text-gray-800 text-hover-primary fw-bold">Lebron Wayde</a></span>
                                            <span class="badge badge-light-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            </div>
                                            <div class="m-0">
                                                <button
                                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true"
                                                >
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                    data-kt-menu="true"
                                                >
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                    </div>
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Customer</a>
                                                    </div>
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">New Group</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Member Group</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Contact</a>
                                                    </div>
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-stack">
                                            <span class="text-gray-400 fw-bold">To: <a href="#" class="text-gray-800 text-hover-primary fw-bold">Ana Simmons</a></span>
                                            <span class="badge badge-light-primary">Shipping</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/192.gif" class="w-50px ms-n1 me-1" alt="" />
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            </div>
                                            <div class="m-0">
                                                <button
                                                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                                    data-kt-menu-trigger="click"
                                                    data-kt-menu-placement="bottom-end"
                                                    data-kt-menu-overflow="true"
                                                >
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div
                                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                    data-kt-menu="true"
                                                >
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                                    </div>
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Ticket</a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Customer</a>
                                                    </div>
                                                    <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
                                                        <a href="#" class="menu-link px-3">
                                                            <span class="menu-title">New Group</span>
                                                            <span class="menu-arrow"></span>
                                                        </a>
                                                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Admin Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Staff Group</a>
                                                            </div>
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">Member Group</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#" class="menu-link px-3">New Contact</a>
                                                    </div>
                                                    <div class="separator mt-3 opacity-75"></div>
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content px-3 py-3">
                                                            <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-stack">
                                            <span class="text-gray-400 fw-bold">To: <a href="#" class="text-gray-800 text-hover-primary fw-bold">Kevin Leonard</a></span>
                                            <span class="badge badge-light-danger">Confirmed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card card-flush h-xl-100">
                            <div class="card-header pt-7">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Stock Report</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 2,356 Items in the Stock</span>
                                </h3>
                                <div class="card-toolbar">
                                    <div class="d-flex flex-stack flex-wrap gap-4">
                                        <div class="d-flex align-items-center fw-bold">
                                            <div class="text-muted fs-7 me-2">Cateogry</div>
                                            <select
                                                class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                data-control="select2"
                                                data-hide-search="true"
                                                data-dropdown-css-class="w-150px"
                                                data-placeholder="Select an option"
                                            >
                                                <option></option>
                                                <option value="Show All" selected="selected">Show All</option>
                                                <option value="a">Category A</option>
                                                <option value="b">Category B</option>
                                            </select>
                                        </div>
                                        <div class="d-flex align-items-center fw-bold">
                                            <div class="text-muted fs-7 me-2">Status</div>
                                            <select
                                                class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                data-control="select2"
                                                data-hide-search="true"
                                                data-dropdown-css-class="w-150px"
                                                data-placeholder="Select an option"
                                                data-kt-table-widget-5="filter_status"
                                            >
                                                <option></option>
                                                <option value="Show All" selected="selected">Show All</option>
                                                <option value="In Stock">In Stock</option>
                                                <option value="Out of Stock">Out of Stock</option>
                                                <option value="Low Stock">Low Stock</option>
                                            </select>
                                        </div>
                                        <a href="../dist/apps/ecommerce/catalog/products.html" class="btn btn-light btn-sm">View Stock</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-150px">Item</th>
                                            <th class="text-end pe-3 min-w-100px">Product ID</th>
                                            <th class="text-end pe-3 min-w-150px">Date Added</th>
                                            <th class="text-end pe-3 min-w-100px">Price</th>
                                            <th class="text-end pe-3 min-w-100px">Status</th>
                                            <th class="text-end pe-0 min-w-75px">Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Macbook Air M1</a>
                                            </td>
                                            <td class="text-end">#XGY-356</td>
                                            <td class="text-end">02 Apr, 2023</td>
                                            <td class="text-end">$1,230</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="58">
                                                <span class="text-dark fw-bold">58 PCS</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Surface Laptop 4</a>
                                            </td>
                                            <td class="text-end">#YHD-047</td>
                                            <td class="text-end">01 Apr, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <td class="text-end" data-order="0">
                                                <span class="text-dark fw-bold">0 PCS</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Logitech MX 250</a>
                                            </td>
                                            <td class="text-end">#SRR-678</td>
                                            <td class="text-end">24 Mar, 2023</td>
                                            <td class="text-end">$64</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="290">
                                                <span class="text-dark fw-bold">290 PCS</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">AudioEngine HD3</a>
                                            </td>
                                            <td class="text-end">#PXF-578</td>
                                            <td class="text-end">24 Mar, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <td class="text-end" data-order="46">
                                                <span class="text-dark fw-bold">46 PCS</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">HP Hyper LTR</a>
                                            </td>
                                            <td class="text-end">#PXF-778</td>
                                            <td class="text-end">16 Jan, 2023</td>
                                            <td class="text-end">$4500</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="78">
                                                <span class="text-dark fw-bold">78 PCS</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Dell 32 UltraSharp</a>
                                            </td>
                                            <td class="text-end">#XGY-356</td>
                                            <td class="text-end">22 Dec, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
                                            </td>
                                            <td class="text-end" data-order="8">
                                                <span class="text-dark fw-bold">8 PCS</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
                                            </td>
                                            <td class="text-end">#XVR-425</td>
                                            <td class="text-end">27 Dec, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="124">
                                                <span class="text-dark fw-bold">124 PCS</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <script src="{{ asset('assets/plugins/custom/leaflet/leaflet.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
	<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
@endsection
