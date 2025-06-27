@extends('layouts.app') @section('title', __('messages.announcements')) @section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />

@endsection @section('content')

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

                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Pages</li>

                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>

                    <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Social</li>

                    <li class="breadcrumb-item">
                        <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                    </li>
                    <li class="breadcrumb-item text-gray-700">Feeds</li>
                </ul>

                <!--begin::Title-->
                <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">Social Feeds</h1>
                <!--end::Title-->
            </div>

            <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> Create Project </a>
        </div>
    </div>
</div>

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="d-flex flex-row">
            <div class="w-100 flex-lg-row-fluid mx-lg-13">
                <div class="card card-flush mb-10">
                    <div class="card-header justify-content-start align-items-center pt-4">
                        <div class="symbol symbol-45px me-5">
                            <img src="/assets/media/avatars/300-3.jpg" class="" alt="" />
                        </div>
                        <span class="text-gray-500 fw-semibold fs-6">What’s on your mind, Jerry?</span>
                    </div>
                    <div class="card-body pt-2 pb-0">
                        <textarea
                            class="form-control bg-transparent border-0 px-0"
                            id="kt_social_feeds_post_input"
                            name="message"
                            data-kt-autosize="true"
                            rows="1"
                            placeholder="Type your message..."
                            data-kt-initialized="1"
                            style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 63px"
                        >
                        </textarea>
                    </div>
                    <div class="card-footer d-flex justify-content-end pt-0">
                        <a href="/pages/blog/post.html" class="btn btn-sm btn-primary" id="kt_social_feeds_post_btn">
                            <span class="indicator-label"> Post</span>

                            <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                        </a>
                    </div>
                </div>
                <div class="mb-10" id="kt_social_feeds_posts">
                    <div class="card card-flush mb-10">
                        <div class="card-header pt-9">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <img src="/assets/media/avatars/300-4.jpg" class="" alt="" />
                                </div>

                                <div class="flex-grow-1">
                                    <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">Grace Logan</a>

                                    <span class="text-gray-500 fw-semibold d-block">Yestarday at 5:06 PM</span>
                                </div>
                            </div>

                            <div class="card-toolbar">
                                <div class="m-0">
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4"
                                        data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true"
                                    >
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
                        </div>

                        <div class="card-body">
                            <div class="fs-6 fw-normal text-gray-700 mb-5">
                                There are two main approaches you can take to writing amazing blog post headlines. You can either decide on your final headline before outstanding you write the most of
                                the rest of your creative post
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="mb-6">
                                <div class="separator separator-solid"></div>

                                <ul class="nav py-3">
                                    <li class="nav-item">
                                        <a
                                            class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active"
                                            data-bs-toggle="collapse"
                                            href="#kt_social_feeds_comments_1"
                                        >
                                            <i class="ki-duotone ki-message-text-2 fs-2 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            2 Comments
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1">
                                            <i class="ki-duotone ki-heart fs-2 me-1"><span class="path1"></span><span class="path2"></span></i>
                                            47k Likes
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
                                            <i class="ki-duotone ki-bookmark fs-2 me-1"><span class="path1"></span><span class="path2"></span></i>
                                            900 Saves
                                        </a>
                                    </li>
                                </ul>

                                <div class="separator separator-solid mb-1"></div>

                                <div class="collapse show" id="kt_social_feeds_comments_1">
                                    <div class="d-flex pt-6">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="/assets/media/avatars/300-13.jpg" alt="" />
                                        </div>

                                        <div class="d-flex flex-column flex-row-fluid">
                                            <div class="d-flex align-items-center flex-wrap mb-0">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Mr. Anderson</a>

                                                <span class="text-gray-500 fw-semibold fs-7 me-5">1 Day ago</span>

                                                <a href="#" class="ms-auto text-gray-500 text-hover-primary fw-semibold fs-7">Reply</a>
                                            </div>

                                            <span class="text-gray-800 fs-7 fw-normal pt-1">
                                                Long before you sit dow to put digital pen to paper you need to make sure you have to sit down and write.
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-6">
                                        <div class="symbol symbol-45px me-5">
                                            <img src="/assets/media/avatars/300-2.jpg" alt="" />
                                        </div>

                                        <div class="d-flex flex-column flex-row-fluid">
                                            <div class="d-flex align-items-center flex-wrap mb-0">
                                                <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Mrs. Anderson</a>

                                                <span class="text-gray-500 fw-semibold fs-7 me-5">2 Days ago</span>

                                                <a href="#" class="ms-auto text-gray-500 text-hover-primary fw-semibold fs-7">Reply</a>
                                            </div>

                                            <span class="text-gray-800 fs-7 fw-normal pt-1">Long before you sit dow to put digital pen to paper</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-35px me-3">
                                    <img src="/assets/media/avatars/300-3.jpg" alt="" />
                                </div>

                                <div class="position-relative w-100">
                                    <textarea
                                        type="text"
                                        class="form-control form-control-solid border ps-5"
                                        rows="1"
                                        name="search"
                                        value=""
                                        data-kt-autosize="true"
                                        placeholder="Write your comment.."
                                        data-kt-initialized="1"
                                        style="overflow: hidden; overflow-wrap: break-word; resize: none; text-align: start; height: 44px"
                                    >
                                    </textarea>

                                    <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-paper-clip fs-2"></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-like fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-badge fs-2"
                                                ><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span>
                                            </i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-geolocation fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-none" id="kt_social_feeds_more_posts">
                        <div class="card card-flush mb-10">
                            <div class="card-header pt-9">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-50px me-5">
                                        <img src="/assets/media/avatars/300-11.jpg" class="" alt="" />
                                    </div>

                                    <div class="flex-grow-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">Stive Strong</a>

                                        <span class="text-gray-500 fw-semibold d-block">Yestarday at 3:30 PM</span>
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    <div class="m-0">
                                        <button
                                            class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4"
                                            data-kt-menu-trigger="click"
                                            data-kt-menu-placement="bottom-end"
                                            data-kt-menu-overflow="true"
                                        >
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
                            </div>

                            <div class="card-body">
                                <div class="fs-6 fw-normal text-gray-700 mb-5">You can either decide on your final headline before outstanding.</div>
                                <!--end::Post content-->

                                <!--begin::Post media-->
                                <div class="row g-3 g-lg-6">
                                    <div class="col-md-6 col-lg-4">
                                        <a href="">
                                            <img src="/assets/media/stock/600x600/img-14.jpg" class="rounded w-100" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <a href="">
                                            <img src="/assets/media/stock/600x600/img-10.jpg" class="rounded w-100" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <a href="">
                                            <img src="/assets/media/stock/600x600/img-18.jpg" class="rounded w-100" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <a href="">
                                            <img src="/assets/media/stock/600x600/img-30.jpg" class="rounded w-100" alt="" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <a href="">
                                            <img src="/assets/media/stock/600x600/img-31.jpg" class="rounded w-100" alt="" />
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer pt-0">
                                <div class="mb-6">
                                    <div class="separator separator-solid"></div>

                                    <ul class="nav py-3">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible"
                                                data-bs-toggle="collapse"
                                                href="#kt_social_feeds_comments_5"
                                            >
                                                <i class="ki-duotone ki-message-text-2 fs-2 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                3 Comments
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1">
                                                <i class="ki-duotone ki-heart fs-2 me-1"><span class="path1"></span><span class="path2"></span></i>
                                                15k Likes
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="#" class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
                                                <i class="ki-duotone ki-bookmark fs-2 me-1"><span class="path1"></span><span class="path2"></span></i>
                                                3.8k Saves
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="separator separator-solid mb-1"></div>
                                    <div class="collapse" id="kt_social_feeds_comments_5">
                                        <div class="d-flex pt-6">
                                            <div class="symbol symbol-45px me-5">
                                                <img src="/assets/media/avatars/300-13.jpg" alt="" />
                                            </div>

                                            <div class="d-flex flex-column flex-row-fluid">
                                                <div class="d-flex align-items-center flex-wrap mb-0">
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Mr. Anderson</a>

                                                    <span class="text-gray-500 fw-semibold fs-7 me-5">1 Day ago</span>

                                                    <a href="#" class="ms-auto text-gray-500 text-hover-primary fw-semibold fs-7">Reply</a>
                                                </div>
                                                <span class="text-gray-800 fs-7 fw-normal pt-1"
                                                    >Long before you sit dow to put digital pen to paper you need to make sure you have to sit down and write.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-6">
                                            <div class="symbol symbol-45px me-5">
                                                <img src="/assets/media/avatars/300-2.jpg" alt="" />
                                            </div>

                                            <div class="d-flex flex-column flex-row-fluid">
                                                <div class="d-flex align-items-center flex-wrap mb-0">
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Mrs. Anderson</a>

                                                    <span class="text-gray-500 fw-semibold fs-7 me-5">2 Days ago</span>

                                                    <a href="#" class="ms-auto text-gray-500 text-hover-primary fw-semibold fs-7">Reply</a>
                                                </div>

                                                <span class="text-gray-800 fs-7 fw-normal pt-1">Long before you sit dow to put digital pen to paper</span>
                                            </div>
                                        </div>
                                        <div class="d-flex pt-6">
                                            <div class="symbol symbol-45px me-5">
                                                <img src="/assets/media/avatars/300-20.jpg" alt="" />
                                            </div>

                                            <div class="d-flex flex-column flex-row-fluid">
                                                <div class="d-flex align-items-center flex-wrap mb-0">
                                                    <a href="#" class="text-gray-800 text-hover-primary fw-bold me-6">Alice Danchik</a>

                                                    <span class="text-gray-500 fw-semibold fs-7 me-5">3 Days ago</span>

                                                    <a href="#" class="ms-auto text-gray-500 text-hover-primary fw-semibold fs-7">Reply</a>
                                                </div>

                                                <span class="text-gray-800 fs-7 fw-normal pt-1"
                                                    >Long before you sit dow to put digital pen to paper you need to make sure you have to sit down and write.
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-35px me-3">
                                        <img src="/assets/media/avatars/300-3.jpg" alt="" />
                                    </div>

                                    <div class="position-relative w-100">
                                        <textarea
                                            type="text"
                                            class="form-control form-control-solid border ps-5"
                                            rows="1"
                                            name="search"
                                            value=""
                                            data-kt-autosize="true"
                                            placeholder="Write your comment.."
                                            data-kt-initialized="1"
                                            style="overflow-x: hidden; overflow-wrap: break-word"
                                        >
                                        </textarea>

                                        <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
                                            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                <i class="ki-duotone ki-paper-clip fs-2"></i>
                                            </button>

                                            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                <i class="ki-duotone ki-like fs-2"><span class="path1"></span><span class="path2"></span></i>
                                            </button>

                                            <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                                <i class="ki-duotone ki-badge fs-2"
                                                    ><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span
                                                ></i>
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
                                    <button
                                        class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4"
                                        data-kt-menu-trigger="click"
                                        data-kt-menu-placement="bottom-end"
                                        data-kt-menu-overflow="true"
                                    >
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
                            <div class="fs-6 fw-normal text-gray-700" data-kt-post-element="content">
                                You can either decide on your final headline before outstanding you write the most of the rest of your creative post
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="mb-6">
                                <div class="separator separator-solid"></div>

                                <ul class="nav py-3">
                                    <li class="nav-item">
                                        <a
                                            class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible"
                                            data-bs-toggle="collapse"
                                            href="#kt_social_feeds_comments_2"
                                        >
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
                                    <textarea
                                        type="text"
                                        class="form-control form-control-solid border ps-5"
                                        rows="1"
                                        name="search"
                                        value=""
                                        data-kt-autosize="true"
                                        placeholder="Write your comment.."
                                        data-kt-initialized="1"
                                        style="overflow-x: hidden; overflow-wrap: break-word"
                                    >
                                    </textarea>

                                    <div class="position-absolute top-0 end-0 translate-middle-x mt-1 me-n14">
                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-paper-clip fs-2"></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-like fs-2"><span class="path1"></span><span class="path2"></span></i>
                                        </button>

                                        <button class="btn btn-icon btn-sm btn-color-gray-500 btn-active-color-primary w-25px p-0">
                                            <i class="ki-duotone ki-badge fs-2"
                                                ><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span
                                            ></i>
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
            <div
                class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px"
                data-kt-drawer="true"
                data-kt-drawer-name="end-sidebar"
                data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_social_end_sidebar_toggle"
            >
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Suggestions for you</span>

                            <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                        </h3>

                        <div class="card-toolbar">
                            <button
                                class="btn btn-icon btn-color-gray-500 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true"
                            >
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
@endsection
@section('page-scripts') @endsection
