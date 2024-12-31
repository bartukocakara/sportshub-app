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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">User Profile</li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">Overview</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Overview</h1>
                    </div>
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">Create Project</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->
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
                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max Smith</a>
                                            <a href="#">
                                                <i class="ki-duotone ki-verify fs-1 text-primary">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>Developer</a>
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-geolocation fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>SF, Bay Area</a>
                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                            <i class="ki-duotone ki-sms fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>max@kt.com</a>
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
                                                    <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="80" data-kt-initialized="1">80</div>
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
                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="../dist/pages/user-profile/overview.html">Overview</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Projects</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Campaigns</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Documents</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Followers</a>
                            </li>
                            <li class="nav-item mt-2">
                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Activity</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row g-5 g-xxl-8">
                    <div class="col-xl-6">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Recommended for you</span>
                                    <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">All Courses</a>
                                </div>
                            </div>
                            <div class="card-body pt-6">
                                <div class="d-flex flex-stack">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-danger text-inverse-danger">M</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../dist/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">UI/UX Design</a>
                                            <span class="text-muted fw-semibold d-block fs-7">40+ Courses</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="d-flex flex-stack">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-success text-inverse-success">Q</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../dist/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">QA Analysis</a>
                                            <span class="text-muted fw-semibold d-block fs-7">18 Courses</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="d-flex flex-stack">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-info text-inverse-info">W</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../dist/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">Web Development</a>
                                            <span class="text-muted fw-semibold d-block fs-7">120+ Courses</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="d-flex flex-stack">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-primary text-inverse-primary">M</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../dist/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">Marketing</a>
                                            <span class="text-muted fw-semibold d-block fs-7">50+ Courses.</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="d-flex flex-stack">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-warning text-inverse-warning">P</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../dist/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">Philosophy</a>
                                            <span class="text-muted fw-semibold d-block fs-7">24+ Courses</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-4"></div>
                                <div class="d-flex flex-stack">
                                    <div class="symbol symbol-40px me-4">
                                        <div class="symbol-label fs-2 fw-semibold bg-dark text-inverse-dark">M</div>
                                    </div>
                                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                        <!--begin:Author-->
                                        <div class="flex-grow-1 me-2">
                                            <a href="../dist/pages/user-profile/overview.html" class="text-gray-800 text-hover-primary fs-6 fw-bold">Mathematics</a>
                                            <span class="text-muted fw-semibold d-block fs-7">24+ Courses</span>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-30px h-30px">
                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush mb-5 mb-xl-8">
                            <div class="card-header pt-7">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Lading Teams</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">8k social visitors</span>
                                </h3>
                                <div class="card-toolbar"></div>
                            </div>
                            <div class="card-body pt-5">
                                <div class="">
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-5">
                                            <img src="assets/media/svg/brand-logos/atica.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <div class="me-5">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Community</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">579</span>
                                            <div class="m-0">
                                                <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>2.6%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-5">
                                            <img src="assets/media/svg/brand-logos/telegram-2.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <div class="me-5">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Binford Ltd.</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Media</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">2,588</span>
                                            <div class="m-0">
                                                <span class="badge badge-light-danger fs-base">
                                                <i class="ki-duotone ki-arrow-down fs-5 text-danger ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>0.4%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-5">
                                            <img src="assets/media/svg/brand-logos/balloon.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <div class="me-5">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Barone LLC.</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Messanger</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">794</span>
                                            <div class="m-0">
                                                <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>0.2%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-5">
                                            <img src="assets/media/svg/brand-logos/kickstarter.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <div class="me-5">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Abstergo Ltd.</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Video Channel</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">1,578</span>
                                            <div class="m-0">
                                                <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>4.1%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-5">
                                            <img src="assets/media/svg/brand-logos/vimeo.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <div class="me-5">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Biffco Enterprises</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">3,458</span>
                                            <div class="m-0">
                                                <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>8.3%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-3"></div>
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex align-items-center me-5">
                                            <img src="assets/media/svg/brand-logos/plurk.svg" class="me-4 w-30px" style="border-radius: 4px" alt="">
                                            <div class="me-5">
                                                <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Big Kahuna Burger</a>
                                                <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Social Network</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="text-gray-800 fw-bold fs-4 me-3">2,047</span>
                                            <div class="m-0">
                                                <span class="badge badge-light-success fs-base">
                                                <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>1.9%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush mb-5 mb-xl-8">
                            <div class="card-header pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Top Referral Sources</span>
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Counted in Millions</span>
                                </h3>
                                <div class="card-toolbar">
                                    <a href="#" class="btn btn-sm btn-light">PDF Report</a>
                                </div>
                            </div>
                            <div class="card-body py-3">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-4">
                                        <thead>
                                            <tr class="fs-7 fw-bold border-0 text-gray-400">
                                                <th class="min-w-150px" colspan="2">CAMPAIGN</th>
                                                <th class="min-w-150px text-end pe-0" colspan="2">SESSIONS</th>
                                                <th class="text-end min-w-150px" colspan="2">CONVERSION RATE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="" colspan="2">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Google</a>
                                                </td>
                                                <td class="pe-0" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">1,256</span>
                                                        <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">-935</span>
                                                    </div>
                                                </td>
                                                <td class="" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-dark fw-bold fs-6 me-3">23.63%</span>
                                                        <span class="text-danger min-w-60px d-block text-end fw-bold fs-6">-9.35%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" colspan="2">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Facebook</a>
                                                </td>
                                                <td class="pe-0" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">446</span>
                                                        <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">-576</span>
                                                    </div>
                                                </td>
                                                <td class="" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-dark fw-bold fs-6 me-3">12.45%</span>
                                                        <span class="text-danger min-w-60px d-block text-end fw-bold fs-6">-57.02%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" colspan="2">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Bol.com</a>
                                                </td>
                                                <td class="pe-0" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">67</span>
                                                        <span class="text-success min-w-50px d-block text-end fw-bold fs-6">+24</span>
                                                    </div>
                                                </td>
                                                <td class="" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-dark fw-bold fs-6 me-3">73.63%</span>
                                                        <span class="text-success min-w-60px d-block text-end fw-bold fs-6">+28.73%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" colspan="2">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Dutchnews.nl</a>
                                                </td>
                                                <td class="pe-0" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">2,136</span>
                                                        <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">-1,229</span>
                                                    </div>
                                                </td>
                                                <td class="" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-dark fw-bold fs-6 me-3">3.67%</span>
                                                        <span class="text-danger min-w-60px d-block text-end fw-bold fs-6">-12.29%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" colspan="2">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Stackoverflow</a>
                                                </td>
                                                <td class="pe-0" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">945</span>
                                                        <span class="text-danger min-w-50px d-block text-end fw-bold fs-6">-634</span>
                                                    </div>
                                                </td>
                                                <td class="" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-dark fw-bold fs-6 me-3">25.03%</span>
                                                        <span class="text-danger min-w-60px d-block text-end fw-bold fs-6">-9.35%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="" colspan="2">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Themeforest</a>
                                                </td>
                                                <td class="pe-0" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-gray-800 fw-bold fs-6 me-1">237</span>
                                                        <span class="text-success min-w-50px d-block text-end fw-bold fs-6">106</span>
                                                    </div>
                                                </td>
                                                <td class="" colspan="2">
                                                    <div class="d-flex justify-content-end">
                                                        <span class="text-dark fw-bold fs-6 me-3">36.52%</span>
                                                        <span class="text-success min-w-60px d-block text-end fw-bold fs-6">+3.06%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card mb-5 mb-xl-8">
                            <div class="card-header align-items-center border-0">
                                <h3 class="fw-bold text-gray-900 m-0">Recent Orders</h3>
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
                            <div class="card-body pt-2">
                                <ul class="nav nav-pills nav-pills-custom mb-3" role="tablist">
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden active w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_1" aria-selected="true" role="tab">
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/t-shirt.svg" class="">
                                            </div>
                                            <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">T-shirt</span>
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_2" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/gaming.svg" class="">
                                            </div>
                                            <span class="nav-text text-gray-700 fw-bold fs-6 lh-1">Gaming</span>
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_3" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/watch.svg" class="">
                                            </div>
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Watch</span>
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6" role="presentation">
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_4" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/gloves.svg" class="nav-icon">
                                            </div>
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Gloves</span>
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3" role="presentation">
                                        <a class="nav-link d-flex justify-content-between flex-column flex-center overflow-hidden w-80px h-85px py-4" data-bs-toggle="pill" href="#kt_stats_widget_2_tab_5" aria-selected="false" tabindex="-1" role="tab">
                                            <div class="nav-icon">
                                                <img alt="" src="assets/media/svg/products-categories/shoes.svg" class="nav-icon">
                                            </div>
                                            <span class="nav-text text-gray-600 fw-bold fs-6 lh-1">Shoes</span>
                                            <span class="bullet-custom position-absolute bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_stats_widget_2_tab_1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                        <th class="ps-0 w-50px">ITEM</th>
                                                        <th class="min-w-125px"></th>
                                                        <th class="text-end min-w-100px">QTY</th>
                                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/210.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2347</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$72.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$126.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/215.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1321</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$45.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/209.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$84.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$168.00</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_2" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                        <th class="ps-0 w-50px">ITEM</th>
                                                        <th class="min-w-125px"></th>
                                                        <th class="text-end min-w-100px">QTY</th>
                                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/197.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1802</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4312</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$32.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$312.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/178.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-3122</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$62.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/22.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1142</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$74.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$139.00</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_3" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                        <th class="ps-0 w-50px">ITEM</th>
                                                        <th class="min-w-125px"></th>
                                                        <th class="text-end min-w-100px">QTY</th>
                                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/1.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 1324</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$43.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$231.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/24.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-5314</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$71.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$53.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/71.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-4222</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$23.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$213.00</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_4" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                        <th class="ps-0 w-50px">ITEM</th>
                                                        <th class="min-w-125px"></th>
                                                        <th class="text-end min-w-100px">QTY</th>
                                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/41.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Elephant 2635</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1523</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$65.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$163.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/63.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Red Laga</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2745</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$73.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/59.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">RiseUP</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-5173</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$54.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$173.00</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_2_tab_5" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                        <th class="ps-0 w-50px">ITEM</th>
                                                        <th class="min-w-125px"></th>
                                                        <th class="text-end min-w-100px">QTY</th>
                                                        <th class="pe-0 text-end min-w-100px">PRICE</th>
                                                        <th class="pe-0 text-end min-w-100px">TOTAL PRICE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/10.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Nike</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2163</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x1</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$64.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$287.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/96.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Adidas</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-2162</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x2</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$76.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$51.00</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <img src="assets/media/stock/ecommerce/13.gif" class="w-50px ms-n1" alt="">
                                                        </td>
                                                        <td class="ps-0">
                                                            <a href="#" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">Puma</a>
                                                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">Item: #XDG-1537</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end">x3</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$27.00</span>
                                                        </td>
                                                        <td class="text-end pe-0">
                                                            <span class="text-gray-800 fw-bold d-block fs-6">$167.00</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-flush mb-5 mb-xl-8">
                            <div class="card-header pt-7">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Most Popular Sellers</span>
                                    <span class="text-gray-400 mt-1 fw-semibold fs-6">Total 424,567 deliveries</span>
                                </h3>
                                <div class="card-toolbar">
                                    <div data-kt-daterangepicker="true" data-kt-daterangepicker-opens="left" class="btn btn-sm btn-light d-flex align-items-center px-4" data-kt-initialized="1">
                                        <div class="text-gray-600 fw-bold">19 Nov 2024 - 18 Dec 2024</div>
                                        <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                        </i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-3 pb-4">
                                <div class="table-responsive">
                                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                                                <th class="p-0 min-w-200px"></th>
                                                <th class="p-0 min-w-150px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 min-w-125px"></th>
                                                <th class="p-0 w-100px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol- symbol-40px me-3">
                                                            <img src="assets/media/avatars/300-1.jpg" class="" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="../dist/account/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Brooklyn Simmons</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Zuid Area</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">1,240</span>
                                                    <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">$5,400</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                                </td>
                                                <td class="float-end text-end border-0">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol- symbol-40px me-3">
                                                            <img src="assets/media/avatars/300-2.jpg" class="" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="../dist/account/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Annette Black</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Zuid Area</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">6,074</span>
                                                    <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">$174,074</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                                </td>
                                                <td class="float-end text-end border-0">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol- symbol-40px me-3">
                                                            <img src="assets/media/avatars/300-12.jpg" class="" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="../dist/account/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Esther Howard</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Zuid Area</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">357</span>
                                                    <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">$2,737</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                                </td>
                                                <td class="float-end text-end border-0">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol- symbol-40px me-3">
                                                            <img src="assets/media/avatars/300-11.jpg" class="" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="../dist/account/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Guy Hawkins</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Zuid Area</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">2,954</span>
                                                    <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">$59,634</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                                </td>
                                                <td class="float-end text-end border-0">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="symbol symbol- symbol-40px me-3">
                                                            <img src="assets/media/avatars/300-3.jpg" class="" alt="">
                                                        </div>
                                                        <div class="d-flex justify-content-start flex-column">
                                                            <a href="../dist/account/overview.html" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">Marvin McKinney</a>
                                                            <span class="text-gray-400 fw-semibold d-block fs-7">Zuid Area</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bold d-block mb-1 fs-6">822</span>
                                                    <span class="fw-semibold text-gray-400 d-block">Deliveries</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-800 fw-bold text-hover-primary d-block mb-1 fs-6">$19,842</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">Earnings</span>
                                                </td>
                                                <td class="float-end text-end border-0">
                                                    <div class="rating">
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                        <div class="rating-label checked">
                                                            <i class="ki-duotone ki-star fs-6"></i>
                                                        </div>
                                                    </div>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7 mt-1">Rating</span>
                                                </td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary w-25px h-25px">
                                                        <i class="ki-duotone ki-black-right fs-2 text-gray-500"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-5 mb-xl-8" id="kt_timeline_widget_2_card">
                            <div class="card-header position-relative py-0 border-bottom-2">
                                <ul class="nav nav-stretch nav-pills nav-pills-custom d-flex mt-3" role="tablist">
                                    <li class="nav-item p-0 ms-0 me-8" role="presentation">
                                        <a class="nav-link btn btn-color-muted active px-0" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_1" aria-selected="true" role="tab">
                                            <span class="nav-text fw-semibold fs-4 mb-3">Today Homeworks</span>
                                            <span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0 me-8" role="presentation">
                                        <a class="nav-link btn btn-color-muted px-0" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_2" aria-selected="false" tabindex="-1" role="tab">
                                            <span class="nav-text fw-semibold fs-4 mb-3">Recent</span>
                                            <span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item p-0 ms-0" role="presentation">
                                        <a class="nav-link btn btn-color-muted px-0" data-bs-toggle="pill" href="#kt_timeline_widget_2_tab_3" aria-selected="false" tabindex="-1" role="tab">
                                            <span class="nav-text fw-semibold fs-4 mb-3">Future</span>
                                            <span class="bullet-custom position-absolute z-index-2 w-100 h-2px top-100 bottom-n100 bg-primary rounded"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="kt_timeline_widget_2_tab_1" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle gs-0 gy-4">
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 w-10px"></th>
                                                        <th class="p-0 w-25px"></th>
                                                        <th class="p-0 min-w-400px"></th>
                                                        <th class="p-0 min-w-100px"></th>
                                                        <th class="p-0 min-w-125px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-success form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" checked="checked" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Book p. 77-85, read &amp; complete tasks 1-6 on p. 85</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Physics</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Workbook p. 17, tasks 1-6</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Mathematics</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-success form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" checked="checked" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Learn paragraph p. 99, Exercise 1,2,3Scoping &amp; Estimations</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Chemistry</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Write essay 1000 words “WW2 results”</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">History</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Internal conflicts in Philip Larkin poems, read p 380-515</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">English Language</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_2_tab_2" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle gs-0 gy-4">
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 w-10px"></th>
                                                        <th class="p-0 w-25px"></th>
                                                        <th class="p-0 min-w-400px"></th>
                                                        <th class="p-0 min-w-100px"></th>
                                                        <th class="p-0 min-w-125px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-success form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" checked="checked" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Book p. 77-85, read &amp; complete tasks 1-6 on p. 85</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Physics</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Workbook p. 17, tasks 1-6</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Mathematics</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-success form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" checked="checked" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Learn paragraph p. 99, Exercise 1,2,3Scoping &amp; Estimations</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Chemistry</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Write essay 1000 words “WW2 results”</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">History</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_timeline_widget_2_tab_3" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table align-middle gs-0 gy-4">
                                                <thead>
                                                    <tr>
                                                        <th class="p-0 w-10px"></th>
                                                        <th class="p-0 w-25px"></th>
                                                        <th class="p-0 min-w-400px"></th>
                                                        <th class="p-0 min-w-100px"></th>
                                                        <th class="p-0 min-w-125px"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Workbook p. 17, tasks 1-6</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Mathematics</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-success"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-success form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" checked="checked" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Learn paragraph p. 99, Exercise 1,2,3Scoping &amp; Estimations</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">Chemistry</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-success">Done</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Write essay 1000 words “WW2 results”</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">History</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <span data-kt-element="bullet" class="bullet bullet-vertical d-flex align-items-center h-40px bg-primary"></span>
                                                        </td>
                                                        <td class="ps-0">
                                                            <div class="form-check form-check-custom form-check-solid">
                                                                <input class="form-check-input" type="checkbox" value="" data-kt-element="checkbox">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="text-gray-800 text-hover-primary fw-bold fs-6">Internal conflicts in Philip Larkin poems, read p 380-515</a>
                                                            <span class="text-gray-400 fw-bold fs-7 d-block">English Language</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <span data-kt-element="status" class="badge badge-light-primary">In Process</span>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-flex justify-content-end flex-shrink-0">
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-printer fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                        <span class="path3"></span>
                                                                        <span class="path4"></span>
                                                                        <span class="path5"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm me-3">
                                                                    <i class="ki-duotone ki-sms fs-3">
                                                                        <span class="path1"></span>
                                                                        <span class="path2"></span>
                                                                    </i>
                                                                </a>
                                                                <a href="#" class="btn btn-icon btn-color-muted btn-bg-light btn-active-color-primary btn-sm">
                                                                    <i class="ki-duotone ki-paper-clip fs-3"></i>
                                                                </a>
                                                            </div>
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
        </div>
    </div>
</div>
