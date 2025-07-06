@extends('admin.master')
@section('title', __('messages.court_list'))
@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/toaster.css') }}" rel="stylesheet" type="text/css" />
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
                                <a href="/index.html" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>


                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Apps
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                eCommerce
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->

                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.court_list') }}
                        </h1>
                    </div>

                    <a href="{{ route('admin.courts.create') }}" class="btn btn-sm btn-success ms-3 px-4 py-3" >
                        {{ __('messages.create_court') }}
                    </a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-2 position-absolute ms-4"><span class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-ecommerce-order-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Report" />
                            </div>
                            <div id="kt_ecommerce_report_views_export" class="d-none">
                                <div class="dt-buttons btn-group flex-wrap">
                                    <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="kt_ecommerce_report_views_table" type="button"><span>Copy</span></button>
                                    <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="kt_ecommerce_report_views_table" type="button"><span>Excel</span></button>
                                    <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="kt_ecommerce_report_views_table" type="button"><span>CSV</span></button>
                                    <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="kt_ecommerce_report_views_table" type="button"><span>PDF</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <input class="form-control form-control-solid w-100 mw-250px" placeholder="Pick date range" id="kt_ecommerce_report_views_daterangepicker" />
                            <div class="w-150px">
                                <select
                                    class="form-select form-select-solid select2-hidden-accessible"
                                    data-control="select2"
                                    data-hide-search="true"
                                    data-placeholder="Rating"
                                    data-kt-ecommerce-order-filter="rating"
                                    data-select2-id="select2-data-7-qmdm"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    data-kt-initialized="1"
                                >
                                    <option data-select2-id="select2-data-9-dzvk"></option>
                                    <option value="all">All</option>
                                    <option value="rating-5">5 Stars</option>
                                    <option value="rating-4">4 Stars</option>
                                    <option value="rating-3">3 Stars</option>
                                    <option value="rating-2">2 Stars</option>
                                    <option value="rating-1">1 Stars</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-ks43" style="width: 100%;">
                                    <span class="selection">
                                        <span
                                            class="select2-selection select2-selection--single form-select form-select-solid"
                                            role="combobox"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            tabindex="0"
                                            aria-disabled="false"
                                            aria-labelledby="select2-q2hz-container"
                                            aria-controls="select2-q2hz-container"
                                        >
                                            <span class="select2-selection__rendered" id="select2-q2hz-container" role="textbox" aria-readonly="true" title="Rating"><span class="select2-selection__placeholder">Rating</span></span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                            </div>
                            <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span class="path2"></span></i> Export Report
                            </button>
                            <div id="kt_ecommerce_report_views_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3" data-kt-ecommerce-export="copy">
                                        Copy to clipboard
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div id="kt_ecommerce_report_views_table_wrapper" class="dt-container dt-bootstrap5 dt-empty-footer">
                            <div id="" class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_ecommerce_report_views_table" style="width: 100%;">
                                    <colgroup>
                                        <col data-dt-column="0" style="width: 150px;" />
                                        <col data-dt-column="1" style="width: 100px;" />
                                        <col data-dt-column="2" style="width: 100px;" />
                                        <col data-dt-column="3" style="width: 100px;" />
                                        <col data-dt-column="4" style="width: 72.325px;" />
                                        <col data-dt-column="5" style="width: 100px;" />
                                    </colgroup>
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0" role="row">
                                            <th class="min-w-150px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1" colspan="1" aria-label="Product: Activate to sort" tabindex="0">
                                                <span class="dt-column-title" role="button">Product</span><span class="dt-column-order"></span>
                                            </th>
                                            <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="1" rowspan="1" colspan="1" aria-label="SKU: Activate to sort" tabindex="0">
                                                <span class="dt-column-title" role="button">SKU</span><span class="dt-column-order"></span>
                                            </th>
                                            <th class="text-end min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="2" rowspan="1" colspan="1" aria-label="Rating: Activate to sort" tabindex="0">
                                                <span class="dt-column-title" role="button">Rating</span><span class="dt-column-order"></span>
                                            </th>
                                            <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="3" rowspan="1" colspan="1" aria-label="Price: Activate to sort" tabindex="0">
                                                <span class="dt-column-title" role="button">Price</span><span class="dt-column-order"></span>
                                            </th>
                                            <th class="text-end min-w-70px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="4" rowspan="1" colspan="1" aria-label="Viewed: Activate to sort" tabindex="0">
                                                <span class="dt-column-title" role="button">Viewed</span><span class="dt-column-order"></span>
                                            </th>
                                            <th class="text-end min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc" data-dt-column="5" rowspan="1" colspan="1" aria-label="Percent: Activate to sort" tabindex="0">
                                                <span class="dt-column-title" role="button">Percent</span><span class="dt-column-order"></span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($datas['courts']['data'] as $key => $court )
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="{{ route('admin.courts.show', ['court' => $court['id']]) }}" class="symbol symbol-50px">
                                                        <span class="symbol-label" style="background-image: url(/assets/media/stock/ecommerce/23.gif);"></span>
                                                    </a>
                                                <div class="ms-5">
                                                    <a href="{{ route('admin.courts.show', ['court' => $court['id']]) }}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{ $court['title'] }}</a>
                                                </div>
                                            </div>
                                            </td>
                                            <td class="text-end pe-0 dt-type-numeric">
                                                <span class="fw-bold">03920007</span>
                                            </td>
                                            <td class="text-end pe-0" data-order="rating-3" data-filter="rating-3">
                                                <div class="rating justify-content-end">
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
                                                    <div class="rating-label">
                                                        <i class="ki-duotone ki-star fs-6"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-end pe-0 dt-type-numeric">
                                                <span>$77.00</span>
                                            </td>
                                            <td class="text-end pe-0 dt-type-numeric">
                                                <span>234400</span>
                                            </td>
                                            <td class="text-end pe-0 dt-type-numeric">
                                                23.44%
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @include('components.pagination.default', ['data' => $datas['courts']])

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
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
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

@endsection
