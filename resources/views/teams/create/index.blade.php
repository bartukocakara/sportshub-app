@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section( 'content')
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

                            <li class="breadcrumb-item text-gray-700">{{ __('messages.create_team') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                        <div class="card card-flush pt-3 mb-5 mb-lg-10">
                            <div class="card-body p-lg-15">
                                <div class="d-flex flex-column flex-lg-row">
                                    <div class="flex-lg-row-fluid">
                                        <div class="mb-13">
                                            <div class="mb-15">
                                                <h4 class="fs-2x text-gray-800 w-bolder mb-6">{{ __('messages.create_team') }}</h4>
                                                <p class="fw-semibold fs-4 text-gray-600 mb-2">First, a disclaimer - the entire process of writing a blog post often</p>

                                            </div>

                                            <div class="mb-15">

                                                <h3 class="text-gray-800 w-bolder mb-4">Buying Product</h3>

                                                <div class="m-0">
                                                    <div class="d-flex align-items-center collapsible py-3 toggle mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_1">
                                                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                            <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        </div>


                                                        <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">{{ __('messages.profile') }}</h4>
                                                    </div>

                                                    <div id="kt_job_8_1" class="collapse show fs-6 ms-1">
                                                        <div class="row gx-10 mb-5">
                                                            <div class="col-12">
                                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Bill From</label>
                                                                <div class="mb-5">
                                                                    <input type="text" class="form-control form-control-solid" placeholder="Name">
                                                                </div>
                                                                <div class="mb-5">
                                                                    <input type="text" class="form-control form-control-solid" placeholder="Email">
                                                                </div>
                                                                <div class="mb-5">
                                                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Who is this invoice from?"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="separator separator-dashed"></div>

                                                </div>


                                                <div class="m-0">
                                                    <div class="d-flex align-items-center collapsible py-3 toggle collapsed mb-0" data-bs-toggle="collapse" data-bs-target="#kt_job_8_2">
                                                        <div class="btn btn-sm btn-icon mw-20px btn-active-color-primary me-5">
                                                            <i class="ki-duotone ki-minus-square toggle-on text-primary fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                            <i class="ki-duotone ki-plus-square toggle-off fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                        </div>


                                                        <h4 class="text-gray-700 fw-bold cursor-pointer mb-0">{{ __('messages.players') }}</h4>
                                                    </div>
                                                    <div id="kt_job_8_2" class="collapse fs-6 ms-1">

                                                        <div class="mb-4 text-gray-600 fw-semibold fs-6 ps-10">First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.</div>

                                                    </div>

                                                    <div class="separator separator-dashed"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">

                                        <div
                                            class="card card-flush pt-3 mb-0"
                                            data-kt-sticky="true"
                                            data-kt-sticky-name="subscription-summary"
                                            data-kt-sticky-offset="{default: false, lg: '200px'}"
                                            data-kt-sticky-width="{lg: '250px', xl: '300px'}"
                                            data-kt-sticky-left="auto"
                                            data-kt-sticky-top="150px"
                                            data-kt-sticky-animation="false"
                                            data-kt-sticky-zindex="95"
                                            style=""
                                        >
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>Summary</h2>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 fs-6">
                                                <div class="mb-7">
                                                    <h5 class="mb-3">Customer details</h5>

                                                    <div class="d-flex align-items-center mb-1">
                                                        <a href="/apps/customers/view.html" class="fw-bold text-gray-800 text-hover-primary me-2"> Sean Bean </a>
                                                        <span class="badge badge-light-success">Active</span>
                                                    </div>

                                                    <a href="#" class="fw-semibold text-gray-600 text-hover-primary">sean@dellito.com</a>
                                                </div>
                                                <div class="separator separator-dashed mb-7"></div>
                                                <div class="mb-7">
                                                    <h5 class="mb-3">Product details</h5>
                                                    <div class="mb-0">
                                                        <span class="badge badge-light-info me-2">Basic Bundle</span>

                                                        <span class="fw-semibold text-gray-600">$149.99 / Year</span>
                                                    </div>
                                                </div>
                                                <div class="separator separator-dashed mb-7"></div>
                                                <div class="mb-10">
                                                    <h5 class="mb-3">Payment Details</h5>
                                                    <div class="mb-0">
                                                        <div class="fw-semibold text-gray-600 d-flex align-items-center">
                                                            Mastercard
                                                            <img src="/assets/media/svg/card-logos/mastercard.svg" class="w-35px ms-2" alt="" />
                                                        </div>
                                                        <div class="fw-semibold text-gray-600">Expires Dec 2024</div>
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <button type="submit" class="btn btn-primary" id="kt_subscriptions_create_button">
                                                        <span class="indicator-label"> Create Subscription</span>

                                                        <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                                                    </button>
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
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@endsection
