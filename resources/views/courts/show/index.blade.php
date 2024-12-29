@extends('layouts.app')
@section('title', 'Ana Sayfa')
@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
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
                                    <img src="assets/media/avatars/300-3.jpg" alt="image">
                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
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
                                            <a href="#" class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>React Developer</a>
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>SF, Bay Area</a>
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>johnson@kt.com</a>
                                        </div>
                                    </div>
                                    <div class="d-flex my-4">
                                        <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                                            <i class="ki-duotone ki-check fs-2 d-none"></i>
                                            <span class="indicator-label">Follow</span>
                                            <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
                                        <div class="me-0">
                                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="bi bi-three-dots fs-3"></i>
                                            </button>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                                    <span class="ms-2" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
                                                        <i class="ki-duotone ki-information fs-6">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span></a>
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
                                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
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
                                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">$4,500</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Earnings</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-down fs-2 text-danger me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75" data-kt-initialized="1">75</div>
                                                </div>
                                                <div class="fw-semibold fs-6 text-gray-400">Projects</div>
                                            </div>
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-up fs-2 text-success me-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1">%60</div>
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
                                            <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <label class="col-lg-4 fw-semibold text-muted">Contact Phone
                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active" data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span></label>
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
                            <label class="col-lg-4 fw-semibold text-muted">Country
                            <span class="ms-1" data-bs-toggle="tooltip" aria-label="Country of origination" data-bs-original-title="Country of origination" data-kt-initialized="1">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span></label>
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
                                    <div class="fs-6 text-gray-700">Your payment was declined. To start using tools, please
                                    <a class="fw-bold" href="#">Add Payment Method</a>.</div>
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
                                    <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1 text-gray-400 me-n1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                        </i>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                <div id="kt_charts_widget_5" class="min-h-auto" style="min-height: 365px;"><div id="apexchartsdeq4o538" class="apexcharts-canvas apexchartsdeq4o538 apexcharts-theme-light" style="width: 672px; height: 350px;"><svg id="SvgjsSvg1188" width="672" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1190" class="apexcharts-inner apexcharts-graphical" transform="translate(105.642578125, 30)"><defs id="SvgjsDefs1189"><linearGradient id="SvgjsLinearGradient1194" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1195" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop><stop id="SvgjsStop1196" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop><stop id="SvgjsStop1197" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop></linearGradient><clipPath id="gridRectMaskdeq4o538"><rect id="SvgjsRect1199" width="547.3694334030151" height="277.81759814834595" x="-2" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskdeq4o538"></clipPath><clipPath id="nonForecastMaskdeq4o538"></clipPath><clipPath id="gridRectMarkerMaskdeq4o538"><rect id="SvgjsRect1200" width="547.3694334030151" height="281.81759814834595" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><rect id="SvgjsRect1198" width="0" height="277.81759814834595" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke-dasharray="3" fill="url(#SvgjsLinearGradient1194)" class="apexcharts-xcrosshairs" y2="277.81759814834595" filter="none" fill-opacity="0.9"></rect><g id="SvgjsG1236" class="apexcharts-yaxis apexcharts-xaxis-inversed" rel="0"><g id="SvgjsG1237" class="apexcharts-yaxis-texts-g apexcharts-xaxis-inversed-texts-g" transform="translate(-81.50537109375, 0)"><text id="SvgjsText1239" font-family="Helvetica, Arial, sans-serif" x="-15" y="23.648124531039947" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1240">Phones</tspan><title>Phones</title></text><text id="SvgjsText1242" font-family="Helvetica, Arial, sans-serif" x="-15" y="63.336352837946514" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1243">Laptops</tspan><title>Laptops</title></text><text id="SvgjsText1245" font-family="Helvetica, Arial, sans-serif" x="-15" y="103.02458114485307" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1246">Headsets</tspan><title>Headsets</title></text><text id="SvgjsText1248" font-family="Helvetica, Arial, sans-serif" x="-15" y="142.71280945175965" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1249">Games</tspan><title>Games</title></text><text id="SvgjsText1251" font-family="Helvetica, Arial, sans-serif" x="-15" y="182.40103775866623" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1252">Keyboardsy</tspan><title>Keyboardsy</title></text><text id="SvgjsText1254" font-family="Helvetica, Arial, sans-serif" x="-15" y="222.08926606557282" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1255">Monitors</tspan><title>Monitors</title></text><text id="SvgjsText1257" font-family="Helvetica, Arial, sans-serif" x="-15" y="261.7774943724794" text-anchor="start" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#cdcdde" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1258">Speakers</tspan><title>Speakers</title></text></g></g><g id="SvgjsG1219" class="apexcharts-xaxis apexcharts-yaxis-inversed"><g id="SvgjsG1220" class="apexcharts-xaxis-texts-g" transform="translate(0, -9.333333333333334)"><text id="SvgjsText1221" font-family="Helvetica, Arial, sans-serif" x="543.3694334030151" y="307.81759814834595" text-anchor="middle" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#474761" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1223">16K</tspan><title>16K</title></text><text id="SvgjsText1224" font-family="Helvetica, Arial, sans-serif" x="407.42707505226133" y="307.81759814834595" text-anchor="middle" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#474761" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1226">12K</tspan><title>12K</title></text><text id="SvgjsText1227" font-family="Helvetica, Arial, sans-serif" x="271.48471670150764" y="307.81759814834595" text-anchor="middle" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#474761" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1229">8K</tspan><title>8K</title></text><text id="SvgjsText1230" font-family="Helvetica, Arial, sans-serif" x="135.54235835075383" y="307.81759814834595" text-anchor="middle" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#474761" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1232">4K</tspan><title>4K</title></text><text id="SvgjsText1233" font-family="Helvetica, Arial, sans-serif" x="-0.39999999999997726" y="307.81759814834595" text-anchor="middle" dominant-baseline="auto" font-size="14px" font-weight="600" fill="#474761" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1235">0K</tspan><title>0K</title></text></g></g><g id="SvgjsG1259" class="apexcharts-grid"><g id="SvgjsG1260" class="apexcharts-gridlines-horizontal"></g><g id="SvgjsG1261" class="apexcharts-gridlines-vertical"><line id="SvgjsLine1262" x1="0" y1="0" x2="0" y2="277.81759814834595" stroke="#323248" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1264" x1="136.1423583507538" y1="0" x2="136.1423583507538" y2="277.81759814834595" stroke="#323248" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1266" x1="272.2847167015076" y1="0" x2="272.2847167015076" y2="277.81759814834595" stroke="#323248" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1268" x1="408.4270750522614" y1="0" x2="408.4270750522614" y2="277.81759814834595" stroke="#323248" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1270" x1="544.5694334030152" y1="0" x2="544.5694334030152" y2="277.81759814834595" stroke="#323248" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line></g><line id="SvgjsLine1263" x1="0" y1="278.81759814834595" x2="0" y2="284.81759814834595" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1265" x1="136.1423583507538" y1="278.81759814834595" x2="136.1423583507538" y2="284.81759814834595" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1267" x1="272.2847167015076" y1="278.81759814834595" x2="272.2847167015076" y2="284.81759814834595" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1269" x1="408.4270750522614" y1="278.81759814834595" x2="408.4270750522614" y2="284.81759814834595" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1271" x1="544.5694334030152" y1="278.81759814834595" x2="544.5694334030152" y2="284.81759814834595" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1273" x1="0" y1="277.81759814834595" x2="543.3694334030151" y2="277.81759814834595" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1272" x1="0" y1="1" x2="0" y2="277.81759814834595" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1201" class="apexcharts-bar-series apexcharts-plot-series"><g id="SvgjsG1202" class="apexcharts-series" rel="1" seriesName="series-1" data:realIndex="0"><path id="SvgjsPath1206" d="M 0.1 15.279967898159029L 505.50884381532666 15.279967898159029Q 509.50884381532666 15.279967898159029 509.50884381532666 19.27996789815903L 509.50884381532666 20.408260408747537Q 509.50884381532666 24.408260408747537 505.50884381532666 24.408260408747537L 505.50884381532666 24.408260408747537L 0.1 24.408260408747537L 0.1 24.408260408747537z" fill="rgba(62,151,255,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 15.279967898159029L 505.50884381532666 15.279967898159029Q 509.50884381532666 15.279967898159029 509.50884381532666 19.27996789815903L 509.50884381532666 20.408260408747537Q 509.50884381532666 24.408260408747537 505.50884381532666 24.408260408747537L 505.50884381532666 24.408260408747537L 0.1 24.408260408747537L 0.1 24.408260408747537z" pathFrom="M 0.1 15.279967898159029L 0.1 15.279967898159029L 0.1 24.408260408747537L 0.1 24.408260408747537L 0.1 24.408260408747537L 0.1 24.408260408747537L 0.1 24.408260408747537L 0.1 15.279967898159029" cy="54.968196205065595" cx="509.50884381532666" j="0" val="15" barHeight="9.12829251058851" barWidth="509.40884381532663"></path><path id="SvgjsPath1208" d="M 0.1 54.968196205065595L 403.6270750522614 54.968196205065595Q 407.6270750522614 54.968196205065595 407.6270750522614 58.968196205065595L 407.6270750522614 60.096488715654104Q 407.6270750522614 64.0964887156541 403.6270750522614 64.0964887156541L 403.6270750522614 64.0964887156541L 0.1 64.0964887156541L 0.1 64.0964887156541z" fill="rgba(241,65,108,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 54.968196205065595L 403.6270750522614 54.968196205065595Q 407.6270750522614 54.968196205065595 407.6270750522614 58.968196205065595L 407.6270750522614 60.096488715654104Q 407.6270750522614 64.0964887156541 403.6270750522614 64.0964887156541L 403.6270750522614 64.0964887156541L 0.1 64.0964887156541L 0.1 64.0964887156541z" pathFrom="M 0.1 54.968196205065595L 0.1 54.968196205065595L 0.1 64.0964887156541L 0.1 64.0964887156541L 0.1 64.0964887156541L 0.1 64.0964887156541L 0.1 64.0964887156541L 0.1 54.968196205065595" cy="94.65642451197216" cx="407.6270750522614" j="1" val="12" barHeight="9.12829251058851" barWidth="407.52707505226135"></path><path id="SvgjsPath1210" d="M 0.1 94.65642451197216L 335.7058958768845 94.65642451197216Q 339.7058958768845 94.65642451197216 339.7058958768845 98.65642451197216L 339.7058958768845 99.78471702256067Q 339.7058958768845 103.78471702256067 335.7058958768845 103.78471702256067L 335.7058958768845 103.78471702256067L 0.1 103.78471702256067L 0.1 103.78471702256067z" fill="rgba(80,205,137,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 94.65642451197216L 335.7058958768845 94.65642451197216Q 339.7058958768845 94.65642451197216 339.7058958768845 98.65642451197216L 339.7058958768845 99.78471702256067Q 339.7058958768845 103.78471702256067 335.7058958768845 103.78471702256067L 335.7058958768845 103.78471702256067L 0.1 103.78471702256067L 0.1 103.78471702256067z" pathFrom="M 0.1 94.65642451197216L 0.1 94.65642451197216L 0.1 103.78471702256067L 0.1 103.78471702256067L 0.1 103.78471702256067L 0.1 103.78471702256067L 0.1 103.78471702256067L 0.1 94.65642451197216" cy="134.34465281887873" cx="339.7058958768845" j="2" val="10" barHeight="9.12829251058851" barWidth="339.60589587688446"></path><path id="SvgjsPath1212" d="M 0.1 134.34465281887873L 267.7847167015076 134.34465281887873Q 271.7847167015076 134.34465281887873 271.7847167015076 138.34465281887873L 271.7847167015076 139.47294532946725Q 271.7847167015076 143.47294532946725 267.7847167015076 143.47294532946725L 267.7847167015076 143.47294532946725L 0.1 143.47294532946725L 0.1 143.47294532946725z" fill="rgba(255,199,0,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 134.34465281887873L 267.7847167015076 134.34465281887873Q 271.7847167015076 134.34465281887873 271.7847167015076 138.34465281887873L 271.7847167015076 139.47294532946725Q 271.7847167015076 143.47294532946725 267.7847167015076 143.47294532946725L 267.7847167015076 143.47294532946725L 0.1 143.47294532946725L 0.1 143.47294532946725z" pathFrom="M 0.1 134.34465281887873L 0.1 134.34465281887873L 0.1 143.47294532946725L 0.1 143.47294532946725L 0.1 143.47294532946725L 0.1 143.47294532946725L 0.1 143.47294532946725L 0.1 134.34465281887873" cy="174.0328811257853" cx="271.7847167015076" j="3" val="8" barHeight="9.12829251058851" barWidth="271.68471670150757"></path><path id="SvgjsPath1214" d="M 0.1 174.0328811257853L 233.82412711381912 174.0328811257853Q 237.82412711381912 174.0328811257853 237.82412711381912 178.0328811257853L 237.82412711381912 179.16117363637383Q 237.82412711381912 183.16117363637383 233.82412711381912 183.16117363637383L 233.82412711381912 183.16117363637383L 0.1 183.16117363637383L 0.1 183.16117363637383z" fill="rgba(114,57,234,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 174.0328811257853L 233.82412711381912 174.0328811257853Q 237.82412711381912 174.0328811257853 237.82412711381912 178.0328811257853L 237.82412711381912 179.16117363637383Q 237.82412711381912 183.16117363637383 233.82412711381912 183.16117363637383L 233.82412711381912 183.16117363637383L 0.1 183.16117363637383L 0.1 183.16117363637383z" pathFrom="M 0.1 174.0328811257853L 0.1 174.0328811257853L 0.1 183.16117363637383L 0.1 183.16117363637383L 0.1 183.16117363637383L 0.1 183.16117363637383L 0.1 183.16117363637383L 0.1 174.0328811257853" cy="213.7211094326919" cx="237.82412711381912" j="4" val="7" barHeight="9.12829251058851" barWidth="237.72412711381912"></path><path id="SvgjsPath1216" d="M 0.1 213.7211094326919L 131.94235835075378 213.7211094326919Q 135.94235835075378 213.7211094326919 135.94235835075378 217.7211094326919L 135.94235835075378 218.8494019432804Q 135.94235835075378 222.8494019432804 131.94235835075378 222.8494019432804L 131.94235835075378 222.8494019432804L 0.1 222.8494019432804L 0.1 222.8494019432804z" fill="rgba(80,205,205,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 213.7211094326919L 131.94235835075378 213.7211094326919Q 135.94235835075378 213.7211094326919 135.94235835075378 217.7211094326919L 135.94235835075378 218.8494019432804Q 135.94235835075378 222.8494019432804 131.94235835075378 222.8494019432804L 131.94235835075378 222.8494019432804L 0.1 222.8494019432804L 0.1 222.8494019432804z" pathFrom="M 0.1 213.7211094326919L 0.1 213.7211094326919L 0.1 222.8494019432804L 0.1 222.8494019432804L 0.1 222.8494019432804L 0.1 222.8494019432804L 0.1 222.8494019432804L 0.1 213.7211094326919" cy="253.40933773959847" cx="135.94235835075378" j="5" val="4" barHeight="9.12829251058851" barWidth="135.84235835075378"></path><path id="SvgjsPath1218" d="M 0.1 253.40933773959847L 97.98176876306533 253.40933773959847Q 101.98176876306533 253.40933773959847 101.98176876306533 257.40933773959847L 101.98176876306533 258.53763025018696Q 101.98176876306533 262.53763025018696 97.98176876306533 262.53763025018696L 97.98176876306533 262.53763025018696L 0.1 262.53763025018696L 0.1 262.53763025018696z" fill="rgba(63,66,84,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="round" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskdeq4o538)" pathTo="M 0.1 253.40933773959847L 97.98176876306533 253.40933773959847Q 101.98176876306533 253.40933773959847 101.98176876306533 257.40933773959847L 101.98176876306533 258.53763025018696Q 101.98176876306533 262.53763025018696 97.98176876306533 262.53763025018696L 97.98176876306533 262.53763025018696L 0.1 262.53763025018696L 0.1 262.53763025018696z" pathFrom="M 0.1 253.40933773959847L 0.1 253.40933773959847L 0.1 262.53763025018696L 0.1 262.53763025018696L 0.1 262.53763025018696L 0.1 262.53763025018696L 0.1 262.53763025018696L 0.1 253.40933773959847" cy="293.09756604650505" cx="101.98176876306533" j="6" val="3" barHeight="9.12829251058851" barWidth="101.88176876306534"></path><g id="SvgjsG1204" class="apexcharts-bar-goals-markers" style="pointer-events: none"><g id="SvgjsG1205" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1207" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1209" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1211" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1213" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1215" className="apexcharts-bar-goals-groups"></g><g id="SvgjsG1217" className="apexcharts-bar-goals-groups"></g></g></g><g id="SvgjsG1203" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1274" x1="0" y1="0" x2="543.3694334030151" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1275" x1="0" y1="0" x2="543.3694334030151" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1276" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1277" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1278" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1191" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 175px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(62, 151, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-5 mb-xl-10">
                        <div class="card h-md-100" dir="ltr">
                            <div class="card-body d-flex flex-column flex-center">
                                <div class="mb-2">
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">Have you tried
                                    <br>new
                                    <span class="fw-bolder">Mobile Application ?</span></h1>
                                    <div class="py-10 text-center">
                                        <img src="assets/media/svg/illustrations/easy/1.svg" class="theme-light-show w-200px" alt="">
                                        <img src="assets/media/svg/illustrations/easy/1-dark.svg" class="theme-dark-show w-200px" alt="">
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
                                                <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1 me-1" alt="">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            </div>
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                            <span class="text-gray-400 fw-bold">To:
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Jason Bourne</a></span>
                                            <span class="badge badge-light-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1 me-1" alt="">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            </div>
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                            <span class="text-gray-400 fw-bold">To:
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Marie Durant</a></span>
                                            <span class="badge badge-light-primary">Shipping</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/214.gif" class="w-50px ms-n1 me-1" alt="">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            </div>
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                            <span class="text-gray-400 fw-bold">To:
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Dan Wilson</a></span>
                                            <span class="badge badge-light-danger">Confirmed</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/211.gif" class="w-50px ms-n1 me-1" alt="">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Elephant 1802</a>
                                            </div>
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                            <span class="text-gray-400 fw-bold">To:
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Lebron Wayde</a></span>
                                            <span class="badge badge-light-success">Delivered</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3 mb-6">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1 me-1" alt="">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">RiseUP</a>
                                            </div>
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                            <span class="text-gray-400 fw-bold">To:
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Ana Simmons</a></span>
                                            <span class="badge badge-light-primary">Shipping</span>
                                        </div>
                                    </div>
                                    <div class="border border-dashed border-gray-300 rounded px-7 py-3">
                                        <div class="d-flex flex-stack mb-3">
                                            <div class="me-3">
                                                <img src="assets/media/stock/ecommerce/192.gif" class="w-50px ms-n1 me-1" alt="">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold">Yellow Stone</a>
                                            </div>
                                            <div class="m-0">
                                                <button class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                                    <i class="ki-duotone ki-dots-square fs-1">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </button>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
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
                                            <span class="text-gray-400 fw-bold">To:
                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold">Kevin Leonard</a></span>
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
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-select2-id="select2-data-7-1xu5" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option></option>
                                                <option value="Show All" selected="selected" data-select2-id="select2-data-9-uvn1">Show All</option>
                                                <option value="a">Category A</option>
                                                <option value="b">Category B</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-i7ur" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-n8sl-container" aria-controls="select2-n8sl-container"><span class="select2-selection__rendered" id="select2-n8sl-container" role="textbox" aria-readonly="true" title="Show All">Show All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <div class="d-flex align-items-center fw-bold">
                                            <div class="text-muted fs-7 me-2">Status</div>
                                            <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-5="filter_status" data-select2-id="select2-data-10-awgo" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                                <option></option>
                                                <option value="Show All" selected="selected" data-select2-id="select2-data-12-atza">Show All</option>
                                                <option value="In Stock">In Stock</option>
                                                <option value="Out of Stock">Out of Stock</option>
                                                <option value="Low Stock">Low Stock</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-teb6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-mn2x-container" aria-controls="select2-mn2x-container"><span class="select2-selection__rendered" id="select2-mn2x-container" role="textbox" aria-readonly="true" title="Show All">Show All</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <a href="../dist/apps/ecommerce/catalog/products.html" class="btn btn-light btn-sm">View Stock</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="kt_table_widget_5_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="table-responsive"><table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer" id="kt_table_widget_5_table">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0"><th class="min-w-150px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Item: activate to sort column ascending" style="width: 150px;">Item</th><th class="text-end pe-3 min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Product ID" style="width: 100px;">Product ID</th><th class="text-end pe-3 min-w-150px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Date Added: activate to sort column ascending" style="width: 150px;">Date Added</th><th class="text-end pe-3 min-w-100px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 100px;">Price</th><th class="text-end pe-3 min-w-100px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 100px;">Status</th><th class="text-end pe-0 min-w-75px sorting" tabindex="0" aria-controls="kt_table_widget_5_table" rowspan="1" colspan="1" aria-label="Qty: activate to sort column ascending" style="width: 75px;">Qty</th></tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">







                                    <tr class="odd">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Macbook Air M1</a>
                                            </td>
                                            <td class="text-end">#XGY-356</td>
                                            <td class="text-end" data-order="2023-04-20T00:00:00+03:00">02 Apr, 2023</td>
                                            <td class="text-end">$1,230</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="58">
                                                <span class="text-dark fw-bold">58 PCS</span>
                                            </td>
                                        </tr><tr class="even">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Surface Laptop 4</a>
                                            </td>
                                            <td class="text-end">#YHD-047</td>
                                            <td class="text-end" data-order="2023-04-20T00:00:00+03:00">01 Apr, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <td class="text-end" data-order="0">
                                                <span class="text-dark fw-bold">0 PCS</span>
                                            </td>
                                        </tr><tr class="odd">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Logitech MX 250</a>
                                            </td>
                                            <td class="text-end">#SRR-678</td>
                                            <td class="text-end" data-order="2023-03-20T00:00:00+03:00">24 Mar, 2023</td>
                                            <td class="text-end">$64</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="290">
                                                <span class="text-dark fw-bold">290 PCS</span>
                                            </td>
                                        </tr><tr class="even">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">AudioEngine HD3</a>
                                            </td>
                                            <td class="text-end">#PXF-578</td>
                                            <td class="text-end" data-order="2023-03-20T00:00:00+03:00">24 Mar, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-danger">Out of Stock</span>
                                            </td>
                                            <td class="text-end" data-order="46">
                                                <span class="text-dark fw-bold">46 PCS</span>
                                            </td>
                                        </tr><tr class="odd">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">HP Hyper LTR</a>
                                            </td>
                                            <td class="text-end">#PXF-778</td>
                                            <td class="text-end" data-order="2023-01-20T00:00:00+03:00">16 Jan, 2023</td>
                                            <td class="text-end">$4500</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="78">
                                                <span class="text-dark fw-bold">78 PCS</span>
                                            </td>
                                        </tr><tr class="even">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Dell 32 UltraSharp</a>
                                            </td>
                                            <td class="text-end">#XGY-356</td>
                                            <td class="text-end" data-order="2023-12-20T00:00:00+03:00">22 Dec, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-warning">Low Stock</span>
                                            </td>
                                            <td class="text-end" data-order="8">
                                                <span class="text-dark fw-bold">8 PCS</span>
                                            </td>
                                        </tr><tr class="odd">
                                            <td>
                                                <a href="#" class="text-dark text-hover-primary">Google Pixel 6 Pro</a>
                                            </td>
                                            <td class="text-end">#XVR-425</td>
                                            <td class="text-end" data-order="2023-12-20T00:00:00+03:00">27 Dec, 2023</td>
                                            <td class="text-end">$1,060</td>
                                            <td class="text-end">
                                                <span class="badge py-3 px-4 fs-7 badge-light-primary">In Stock</span>
                                            </td>
                                            <td class="text-end" data-order="124">
                                                <span class="text-dark fw-bold">124 PCS</span>
                                            </td>
                                        </tr></tbody>
                                </table></div><div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_app_footer" class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2023©</span>
            <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the map
            const map = L.map('kt_contact_map').setView([37.0, 30.0], 10);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Court data from backend
            const court = @json($court);
            if (court.latitude && court.longitude) {
                const marker = L.marker([court.latitude, court.longitude]).addTo(map)
                // Add popup with court details
                marker.bindPopup(`
                    <strong>${court.title || 'Unnamed Court'}</strong><br>
                    ${court.street_name}, ${court.neighborhood}<br>
                    <a href="/courts/${court.id}">View Details</a>
                `);
            }
        });
    </script>
@endsection
