@extends('layouts.app') @section('title', __('messages.teams')) @section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />

@endsection @section('content')

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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Apps</li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Projects</li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <li class="breadcrumb-item text-gray-700">Activity</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->


                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">Project Activity</h1>
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

            <div id="kt_app_content_container" class="app-container container-fluid">

                <div class="card">

                    <div class="card-header card-header-stretch">

                        <div class="card-title d-flex align-items-center">
                            <i class="ki-duotone ki-calendar-8 fs-1 text-primary me-3 lh-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i>

                            <h3 class="fw-bold m-0 text-gray-800">Jan 23, 2025</h3>
                        </div>
                        <!--end::Title-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar m-0">
                            <!--begin::Tab nav-->
                            <ul class="nav nav-tabs nav-line-tabs nav-stretch fs-6 border-0 fw-bold" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a id="kt_activity_today_tab" class="nav-link justify-content-center text-active-gray-800 active" data-bs-toggle="tab" role="tab" href="#kt_activity_today" aria-selected="true"> Today </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="kt_activity_week_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_week" aria-selected="false" tabindex="-1"> Week </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="kt_activity_month_tab" class="nav-link justify-content-center text-active-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_month" aria-selected="false" tabindex="-1"> Month </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a id="kt_activity_year_tab" class="nav-link justify-content-center text-active-gray-800 text-hover-gray-800" data-bs-toggle="tab" role="tab" href="#kt_activity_year" aria-selected="false" tabindex="-1"> 2025 </a>
                                </li>
                            </ul>
                            <!--end::Tab nav-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Card head-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Tab Content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div id="kt_activity_today" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_activity_today_tab">

                                <div class="timeline timeline-border-dashed">
                                    @foreach ($datas['activities']['data'] as $key => $activity)
                                        <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-message-text-2 fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->

                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">There are 2 new tasks for you in “AirPlus Mobile App” project:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>

                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Nina Nilson" data-bs-original-title="Nina Nilson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-14.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <!--begin::Record-->
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-5">

                                                    <a href="/apps/projects/project.html" class="fs-5 text-gray-900 text-hover-primary fw-semibold w-375px min-w-200px">Meeting with customer</a>
                                                    <!--end::Title-->

                                                    <!--begin::Label-->
                                                    <div class="min-w-175px pe-2">
                                                        <span class="badge badge-light text-muted">Application Design</span>
                                                    </div>
                                                    <!--end::Label-->

                                                    <!--begin::Users-->
                                                    <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px pe-2">

                                                        <div class="symbol symbol-circle symbol-25px">
                                                            <img src="/assets/media/avatars/300-2.jpg" alt="img" />
                                                        </div>



                                                        <div class="symbol symbol-circle symbol-25px">
                                                            <img src="/assets/media/avatars/300-14.jpg" alt="img" />
                                                        </div>



                                                        <div class="symbol symbol-circle symbol-25px">
                                                            <div class="symbol-label fs-8 fw-semibold bg-primary text-inverse-primary">A</div>
                                                        </div>

                                                    </div>
                                                    <!--end::Users-->

                                                    <!--begin::Progress-->
                                                    <div class="min-w-125px pe-2">
                                                        <span class="badge badge-light-primary">In Progress</span>
                                                    </div>
                                                    <!--end::Progress-->

                                                    <!--begin::Action-->
                                                    <a href="/apps/projects/project.html" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Record-->

                                                <!--begin::Record-->
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3 mb-0">

                                                    <a href="/apps/projects/project.html" class="fs-5 text-gray-900 text-hover-primary fw-semibold w-375px min-w-200px">Project Delivery Preparation</a>
                                                    <!--end::Title-->

                                                    <!--begin::Label-->
                                                    <div class="min-w-175px">
                                                        <span class="badge badge-light text-muted">CRM System Development</span>
                                                    </div>
                                                    <!--end::Label-->

                                                    <!--begin::Users-->
                                                    <div class="symbol-group symbol-hover flex-nowrap flex-grow-1 min-w-100px">

                                                        <div class="symbol symbol-circle symbol-25px">
                                                            <img src="/assets/media/avatars/300-20.jpg" alt="img" />
                                                        </div>



                                                        <div class="symbol symbol-circle symbol-25px">
                                                            <div class="symbol-label fs-8 fw-semibold bg-success text-inverse-primary">B</div>
                                                        </div>

                                                    </div>
                                                    <!--end::Users-->

                                                    <!--begin::Progress-->
                                                    <div class="min-w-125px">
                                                        <span class="badge badge-light-success">Completed</span>
                                                    </div>
                                                    <!--end::Progress-->

                                                    <!--begin::Action-->
                                                    <a href="/apps/projects/project.html" class="btn btn-sm btn-light btn-active-light-primary">View</a>
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Record-->
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="kt_activity_week" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_week_tab">
                                <div class="timeline timeline-border-dashed">
                                    <div class="timeline-item">
                                        <div class="timeline-line"></div>
                                        <div class="timeline-icon me-4">
                                            <i class="ki-duotone ki-flag fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>

                                        <div class="timeline-content mb-10 mt-n2">
                                            <div class="overflow-auto pe-3">
                                                <div class="fs-5 fw-semibold mb-2">Invitation for crafting engaging designs that speak human workshop</div>

                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>
                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Alan Nilson" data-bs-original-title="Alan Nilson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-1.jpg" alt="img" />
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-item">
                                        <div class="timeline-line"></div>
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-disconnect fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="mb-5 pe-3">

                                                <a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Jan Hummer" data-bs-original-title="Jan Hummer" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-23.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <!--begin::Icon-->
                                                        <img alt="" class="w-30px me-3" src="/assets/media/svg/files/pdf.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="/apps/projects/project.html" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">1.9mb</div>
                                                            <!--end::Number-->
                                                        </div>

                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <!--begin::Icon-->
                                                        <img alt="/apps/projects/project.html" class="w-30px me-3" src="/assets/media/svg/files/doc.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Client UAT Testing Results</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">18kb</div>
                                                            <!--end::Number-->
                                                        </div>

                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center">
                                                        <!--begin::Icon-->
                                                        <img alt="/apps/projects/project.html" class="w-30px me-3" src="/assets/media/svg/files/css.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Finance Reports</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">20mb</div>
                                                            <!--end::Number-->
                                                        </div>
                                                        <!--end::Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-abstract-26 fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">Task <a href="#" class="text-primary fw-bold me-1">#45890</a> merged with <a href="#" class="text-primary fw-bold me-1">#45890</a> in “Ads Pro Admin Dashboard project:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Nina Nilson" data-bs-original-title="Nina Nilson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-14.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-pencil fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">3 new application design concepts added:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Marcus Dotson" data-bs-original-title="Marcus Dotson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-2.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                                    <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-29.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-31.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="overlay">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-40.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-sms fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">
                                                    New case <a href="#" class="text-primary fw-bold me-1">#67890</a>
                                                    is assigned to you in Multi-platform Database Design project
                                                </div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="overflow-auto pb-5">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex align-items-center mt-1 fs-6">

                                                        <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>



                                                        <a href="#" class="text-primary fw-bold me-1">Alice Tan</a>

                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!--begin::Tab panel-->
                            <div id="kt_activity_month" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_month_tab">

                                <div class="timeline timeline-border-dashed">
                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-pencil fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">3 new application design concepts added:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Marcus Dotson" data-bs-original-title="Marcus Dotson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-2.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                                    <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-29.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-31.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="overlay">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-40.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-sms fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">
                                                    New case <a href="#" class="text-primary fw-bold me-1">#67890</a>
                                                    is assigned to you in Multi-platform Database Design project
                                                </div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="overflow-auto pb-5">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex align-items-center mt-1 fs-6">

                                                        <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>



                                                        <a href="#" class="text-primary fw-bold me-1">Alice Tan</a>

                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-basket fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">
                                                    New order <a href="#" class="text-primary fw-bold me-1">#67890</a>
                                                    is placed for Workshow Planning &amp; Budget Estimation
                                                </div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>



                                                    <a href="#" class="text-primary fw-bold me-1">Jimmy Bold</a>

                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>


                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon me-4">
                                            <i class="ki-duotone ki-flag fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n2">
                                            <!--begin::Timeline heading-->
                                            <div class="overflow-auto pe-3">

                                                <div class="fs-5 fw-semibold mb-2">Invitation for crafting engaging designs that speak human workshop</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Sent at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Alan Nilson" data-bs-original-title="Alan Nilson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-1.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-disconnect fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="mb-5 pe-3">

                                                <a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Jan Hummer" data-bs-original-title="Jan Hummer" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-23.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <!--begin::Icon-->
                                                        <img alt="" class="w-30px me-3" src="/assets/media/svg/files/pdf.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="/apps/projects/project.html" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">1.9mb</div>
                                                            <!--end::Number-->
                                                        </div>

                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <!--begin::Icon-->
                                                        <img alt="/apps/projects/project.html" class="w-30px me-3" src="/assets/media/svg/files/doc.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Client UAT Testing Results</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">18kb</div>
                                                            <!--end::Number-->
                                                        </div>

                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center">
                                                        <!--begin::Icon-->
                                                        <img alt="/apps/projects/project.html" class="w-30px me-3" src="/assets/media/svg/files/css.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Finance Reports</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">20mb</div>
                                                            <!--end::Number-->
                                                        </div>
                                                        <!--end::Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-abstract-26 fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">Task <a href="#" class="text-primary fw-bold me-1">#45890</a> merged with <a href="#" class="text-primary fw-bold me-1">#45890</a> in “Ads Pro Admin Dashboard project:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Nina Nilson" data-bs-original-title="Nina Nilson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-14.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!--begin::Tab panel-->
                            <div id="kt_activity_year" class="card-body p-0 tab-pane fade show" role="tabpanel" aria-labelledby="kt_activity_year_tab">

                                <div class="timeline timeline-border-dashed">
                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-disconnect fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="mb-5 pe-3">

                                                <a href="#" class="fs-5 fw-semibold text-gray-800 text-hover-primary mb-2">3 New Incoming Project Files:</a>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Sent at 10:30 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Jan Hummer" data-bs-original-title="Jan Hummer" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-23.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-5">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <!--begin::Icon-->
                                                        <img alt="" class="w-30px me-3" src="/assets/media/svg/files/pdf.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="/apps/projects/project.html" class="fs-6 text-hover-primary fw-bold">Finance KPI App Guidelines</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">1.9mb</div>
                                                            <!--end::Number-->
                                                        </div>

                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center pe-10 pe-lg-20">
                                                        <!--begin::Icon-->
                                                        <img alt="/apps/projects/project.html" class="w-30px me-3" src="/assets/media/svg/files/doc.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Client UAT Testing Results</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">18kb</div>
                                                            <!--end::Number-->
                                                        </div>

                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-aligns-center">
                                                        <!--begin::Icon-->
                                                        <img alt="/apps/projects/project.html" class="w-30px me-3" src="/assets/media/svg/files/css.svg" />
                                                        <!--end::Icon-->


                                                        <div class="ms-1 fw-semibold">
                                                            <!--begin::Desc-->
                                                            <a href="#" class="fs-6 text-hover-primary fw-bold">Finance Reports</a>
                                                            <!--end::Desc-->

                                                            <!--begin::Number-->
                                                            <div class="text-gray-500">20mb</div>
                                                            <!--end::Number-->
                                                        </div>
                                                        <!--end::Icon-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-abstract-26 fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">Task <a href="#" class="text-primary fw-bold me-1">#45890</a> merged with <a href="#" class="text-primary fw-bold me-1">#45890</a> in “Ads Pro Admin Dashboard project:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Initiated at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Nina Nilson" data-bs-original-title="Nina Nilson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-14.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-pencil fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">3 new application design concepts added:</div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Created at 4:23 PM by</div>



                                                    <div class="symbol symbol-circle symbol-25px" data-bs-toggle="tooltip" data-bs-boundary="window" data-bs-placement="top" aria-label="Marcus Dotson" data-bs-original-title="Marcus Dotson" data-kt-initialized="1">
                                                        <img src="/assets/media/avatars/300-2.jpg" alt="img" />
                                                    </div>

                                                </div>
                                                <!--end::Description-->
                                            </div>


                                            <!--begin::Timeline details-->
                                            <div class="overflow-auto pb-5">
                                                <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-700px p-7">
                                                    <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-29.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="overlay me-10">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-31.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->

                                                    <!--begin::Item-->
                                                    <div class="overlay">
                                                        <!--begin::Image-->
                                                        <div class="overlay-wrapper">
                                                            <img alt="img" class="rounded w-150px" src="/assets/media/stock/600x400/img-40.jpg" />
                                                        </div>
                                                        <!--end::Image-->

                                                        <!--begin::Link-->
                                                        <div class="overlay-layer bg-dark bg-opacity-10 rounded">
                                                            <a href="#" class="btn btn-sm btn-primary btn-shadow">Explore</a>
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                            </div>
                                            <!--end::Timeline details-->
                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-sms fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mb-10 mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">
                                                    New case <a href="#" class="text-primary fw-bold me-1">#67890</a>
                                                    is assigned to you in Multi-platform Database Design project
                                                </div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="overflow-auto pb-5">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex align-items-center mt-1 fs-6">

                                                        <div class="text-muted me-2 fs-7">Added at 4:23 PM by</div>



                                                        <a href="#" class="text-primary fw-bold me-1">Alice Tan</a>

                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Description-->
                                            </div>

                                        </div>

                                    </div>

                                    <!--begin::Timeline item-->
                                    <div class="timeline-item">
                                        <!--begin::Timeline line-->
                                        <div class="timeline-line"></div>
                                        <!--end::Timeline line-->

                                        <!--begin::Timeline icon-->
                                        <div class="timeline-icon">
                                            <i class="ki-duotone ki-basket fs-2 text-gray-500"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                                        </div>
                                        <!--end::Timeline icon-->

                                        <!--begin::Timeline content-->
                                        <div class="timeline-content mt-n1">
                                            <!--begin::Timeline heading-->
                                            <div class="pe-3 mb-5">

                                                <div class="fs-5 fw-semibold mb-2">
                                                    New order <a href="#" class="text-primary fw-bold me-1">#67890</a>
                                                    is placed for Workshow Planning &amp; Budget Estimation
                                                </div>
                                                <!--end::Title-->

                                                <!--begin::Description-->
                                                <div class="d-flex align-items-center mt-1 fs-6">

                                                    <div class="text-muted me-2 fs-7">Placed at 4:23 PM by</div>



                                                    <a href="#" class="text-primary fw-bold me-1">Jimmy Bold</a>

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
        <!--end::Content-->
    </div>
</div>
@endsection @section('page-scripts') @endsection
