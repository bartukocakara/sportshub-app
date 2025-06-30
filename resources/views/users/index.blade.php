@extends('layouts.app') @section('title', __('messages.players')) @section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />

@endsection @section('content')

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
                    <li class="breadcrumb-item text-gray-700">{{ __('messages.players') }}</li>
                </ul>
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.players') }}</h1>
            </div>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="d-flex flex-row">
            <div class="w-100 flex-lg-row-fluid mx-lg-13">
                <div class="row g-6 mb-6 g-xl-9 mb-xl-9">
                    @foreach ($datas['users']['data'] as $key => $user)
                        <div class="col-md-6 col-xxl-4">
                        <div class="card">
                            <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                <div class="symbol symbol-65px symbol-circle mb-5">
                                    <img src="/assets/media//avatars/300-11.jpg" alt="image" />
                                    <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                </div>
                                <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">Patric Watson</a>
                                <div class="fw-semibold text-gray-500 mb-6">Art Director at Novica Co.</div>

                                <!--begin::Info-->
                                <div class="d-flex flex-center flex-wrap mb-5">
                                    <!--begin::Stats-->
                                    <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-6 fw-bold text-gray-700">$14,560</div>
                                        <div class="fw-semibold text-gray-500">Earnings</div>
                                    </div>
                                    <div class="border border-dashed rounded min-w-90px py-3 px-4 mx-2 mb-3">
                                        <div class="fs-6 fw-bold text-gray-700">$236,400</div>
                                        <div class="fw-semibold text-gray-500">Sales</div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-light-primary btn-flex btn-center" data-kt-follow-btn="true">
                                    <i class="ki-duotone ki-check following fs-3"></i>
                                    <i class="ki-duotone ki-plus follow fs-3 d-none"></i>

                                    <span class="indicator-label"> Following</span>

                                    <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="d-none" id="kt_social_feeds_new_post">
                    <div class="card card-flush mb-10">
                        <div class="card-header pt-9">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <img src="/assets/media/avatars/300-3.jpg" class="" alt="" />
                                </div>

                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">Jerry Kane</a>

                                    <span class="text-gray-500 fw-semibold d-block">Yestarday at 5:06 PM</span>
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="m-0">
                                    <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                        <i class="ki-duotone ki-dots-square fs-1"> <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span> </i>
                                    </button>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                        </div>

                                        <div class="separator mb-3 opacity-75"></div>

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

                                        <div class="separator mt-3 opacity-75"></div>

                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="fs-6 fw-normal text-gray-700" data-kt-post-element="content">You can either decide on your final headline before outstanding you write the most of the rest of your creative post</div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="mb-6">
                                <div class="separator separator-solid"></div>

                                <ul class="nav py-3">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible" data-bs-toggle="collapse" href="#kt_social_feeds_comments_2">
                                            <i class="ki-duotone ki-message-text-2 fs-2 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span> </i>
                                            0 Comment
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1">
                                            <i class="ki-duotone ki-heart fs-2 me-1"><span class="path1"></span><span class="path2"></span></i>
                                            0 Like
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
                                            <i class="ki-duotone ki-bookmark fs-2 me-1"><span class="path1"></span><span class="path2"></span></i>
                                            0 Saves
                                        </a>
                                    </li>
                                </ul>

                                <div class="separator separator-solid mb-1"></div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-35px me-3">
                                    <img src="/assets/media/avatars/300-3.jpg" alt="" />
                                </div>

                                <div class="position-relative w-100">
                                    <textarea type="text" class="form-control form-control-solid border ps-5" rows="1" name="search" value="" data-kt-autosize="true" placeholder="Write your comment.." data-kt-initialized="1" style="overflow-x: hidden; overflow-wrap: break-word"> </textarea>

                                    <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-paper-clip fs-2"></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-like fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-badge fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-geolocation fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-center">
                    <a href="#" class="btn btn-primary fw-bold px-6" id="kt_social_feeds_more_posts_btn">
                        <span class="indicator-label"> Show more</span>
                        <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                    </a>
                </div>
            </div>
            <div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px" data-kt-drawer="true" data-kt-drawer-name="end-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '250px': '300px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_social_end_sidebar_toggle">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Suggestions for you</span>

                            <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                        </h3>

                        <div class="card-toolbar">
                            <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                                <i class="ki-duotone ki-dots-square fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                            </button>

                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                                </div>

                                <div class="separator mb-3 opacity-75"></div>

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

                                <div class="separator mt-3 opacity-75"></div>

                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#"> Generate Reports </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="d-flex flex-stack">
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-11.jpg" class="h-50 align-self-center" alt="" />
                            </div>

                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">Jacob Jones </a>

                                    <span class="text-muted fw-semibold d-block fs-7">Barone LLC.</span>
                                </div>
                                <a href="/pages/user-profile/overview.html" class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-4"></div>

                        <div class="d-flex flex-stack">
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-9.jpg" class="h-50 align-self-center" alt="" />
                            </div>

                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <div class="flex-grow-1 me-2">
                                    <a href="/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold"> Kristin Watson </a>

                                    <span class="text-muted fw-semibold d-block fs-7">Biffco Enterprises Ltd.</span>
                                </div>
                                <a href="/pages/user-profile/overview.html" class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('page-scripts') @endsection
