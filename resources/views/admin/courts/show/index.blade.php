@extends('admin.master')
@section('title', __('messages.court_details'))
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

                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.court_details') }}
                        </h1>
                    </div>

                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                        Create Project
                    </a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" data-kt-redirect="/apps/ecommerce/catalog/products.html">
                    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>{{ __('messages.court_images') }}</h2>
                                </div>
                            </div>
                            <div class="card-body text-center pt-0">
                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url(/assets/media/stock/ecommerce/78.gif);"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change"
                                        data-bs-toggle="tooltip"
                                        aria-label="Change avatar"
                                        data-bs-original-title="Change avatar"
                                        data-kt-initialized="1"
                                    >
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span class="path2"></span></i>
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel"
                                        data-bs-toggle="tooltip"
                                        aria-label="Cancel avatar"
                                        data-bs-original-title="Cancel avatar"
                                        data-kt-initialized="1"
                                    >
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove"
                                        data-bs-toggle="tooltip"
                                        aria-label="Remove avatar"
                                        data-bs-original-title="Remove avatar"
                                        data-kt-initialized="1"
                                    >
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                                    </span>
                                </div>

                                <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                            </div>
                        </div>
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Status</h2>
                                </div>
                                <div class="card-toolbar">
                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <select
                                    class="form-select mb-2 select2-hidden-accessible"
                                    data-control="select2"
                                    data-hide-search="true"
                                    data-placeholder="Select an option"
                                    id="kt_ecommerce_add_product_status_select"
                                    data-select2-id="select2-data-kt_ecommerce_add_product_status_select"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    data-kt-initialized="1"
                                >
                                    <option></option>
                                    <option value="published" selected="" data-select2-id="select2-data-8-9ag2">Published</option>
                                    <option value="draft">Draft</option>
                                    <option value="scheduled">Scheduled</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-7-tuho" style="width: 100%;">
                                    <span class="selection">
                                        <span
                                            class="select2-selection select2-selection--single form-select mb-2"
                                            role="combobox"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            tabindex="0"
                                            aria-disabled="false"
                                            aria-labelledby="select2-kt_ecommerce_add_product_status_select-container"
                                            aria-controls="select2-kt_ecommerce_add_product_status_select-container"
                                        >
                                            <span class="select2-selection__rendered" id="select2-kt_ecommerce_add_product_status_select-container" role="textbox" aria-readonly="true" title="Published">Published</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>

                                <div class="text-muted fs-7">Set the product status.</div>

                                <div class="d-none mt-10">
                                    <label for="kt_ecommerce_add_product_status_datepicker" class="form-label">Select publishing date and time</label>
                                    <input class="form-control flatpickr-input" id="kt_ecommerce_add_product_status_datepicker" placeholder="Pick date &amp; time" type="text" readonly="readonly" />
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Product Details</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0">

                                <label class="form-label">Categories</label>

                                <select
                                    class="form-select mb-2 select2-hidden-accessible"
                                    data-control="select2"
                                    data-placeholder="Select an option"
                                    data-allow-clear="true"
                                    multiple=""
                                    data-select2-id="select2-data-9-l4u4"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    data-kt-initialized="1"
                                >
                                    <option></option>
                                    <option value="Computers">Computers</option>
                                    <option value="Watches">Watches</option>
                                    <option value="Headphones">Headphones</option>
                                    <option value="Footwear">Footwear</option>
                                    <option value="Cameras">Cameras</option>
                                    <option value="Shirts">Shirts</option>
                                    <option value="Household">Household</option>
                                    <option value="Handbags">Handbags</option>
                                    <option value="Wines">Wines</option>
                                    <option value="Sandals">Sandals</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-10-mm5q" style="width: 100%;">
                                    <span class="selection">
                                        <span class="select2-selection select2-selection--multiple form-select mb-2" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                            <ul class="select2-selection__rendered" id="select2-8q2y-container"></ul>
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
                                                    aria-describedby="select2-8q2y-container"
                                                    placeholder="Select an option"
                                                    style="width: 100%;"
                                                ></textarea>
                                            </span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>

                                <div class="text-muted fs-7 mb-7">Add product to a category.</div>

                                <a href="/apps/ecommerce/catalog/add-category.html" class="btn btn-light-primary btn-sm mb-10"> <i class="ki-duotone ki-plus fs-2"></i> Create new category </a>


                                <label class="form-label d-block">Tags</label>

                                <tags class="tagify form-control mb-2" tabindex="-1">
                                    <tag title="new" contenteditable="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="new">
                                        <x title="" tabindex="-1" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                        <div><span autocapitalize="false" autocorrect="off" spellcheck="false" class="tagify__tag-text">new</span></div>
                                    </tag>
                                    <tag title="trending" contenteditable="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="trending">
                                        <x title="" tabindex="-1" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                        <div><span autocapitalize="false" autocorrect="off" spellcheck="false" class="tagify__tag-text">trending</span></div>
                                    </tag>
                                    <tag title="sale" contenteditable="false" tabindex="-1" class="tagify__tag tagify--noAnim" value="sale">
                                        <x title="" tabindex="-1" class="tagify__tag__removeBtn" role="button" aria-label="remove tag"></x>
                                        <div><span autocapitalize="false" autocorrect="off" spellcheck="false" class="tagify__tag-text">sale</span></div>
                                    </tag>
                                    <span
                                        contenteditable=""
                                        tabindex="0"
                                        data-placeholder="&ZeroWidthSpace;"
                                        aria-placeholder=""
                                        class="tagify__input"
                                        role="textbox"
                                        autocapitalize="false"
                                        autocorrect="off"
                                        spellcheck="false"
                                        aria-autocomplete="both"
                                        aria-multiline="false"
                                    ></span>
                                    &ZeroWidthSpace;
                                </tags>
                                <input id="kt_ecommerce_add_product_tags" name="kt_ecommerce_add_product_tags" class="form-control mb-2" value="new, trending, sale" tabindex="-1" />

                                <div class="text-muted fs-7">Add tags to a product.</div>
                            </div>
                        </div>
                        <div class="card card-flush">
                            <div class="card-header pt-5">
                                <div class="card-title d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">$</span>

                                        <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">2,420</span>

                                        <span class="badge badge-light-success fs-base">
                                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1"><span class="path1"></span><span class="path2"></span></i>
                                            2.6%
                                        </span>
                                    </div>

                                    <span class="text-gray-500 pt-1 fw-semibold fs-6">Average Daily Sales</span>
                                </div>
                            </div>

                            <div class="card-body d-flex align-items-end px-0 pb-0">
                                <div id="kt_card_widget_6_chart" class="w-100" style="height: 80px; min-height: 80px;">
                                    <div id="apexcharts4ak80wm" class="apexcharts-canvas apexcharts4ak80wm apexcharts-theme-" style="width: 233px; height: 80px;">
                                        <svg
                                            id="SvgjsSvg1108"
                                            width="233"
                                            height="80"
                                            xmlns="http://www.w3.org/2000/svg"
                                            version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg"
                                            xmlns:data="ApexChartsNS"
                                            transform="translate(0, 0)"
                                        >
                                            <foreignObject x="0" y="0" width="233" height="80"><div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml" style="max-height: 40px;"></div></foreignObject>
                                            <g id="SvgjsG1114" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                            <g id="SvgjsG1115" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)"></g>
                                            <g id="SvgjsG1155" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g>
                                            <g id="SvgjsG1110" class="apexcharts-inner apexcharts-graphical" transform="translate(29.525, 4.5)">
                                                <defs id="SvgjsDefs1109">
                                                    <clipPath id="gridRectMask4ak80wm">
                                                        <rect id="SvgjsRect1112" width="226" height="84" x="-26.025" y="-6.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMask4ak80wm"></clipPath>
                                                    <clipPath id="nonForecastMask4ak80wm"></clipPath>
                                                    <clipPath id="gridRectMarkerMask4ak80wm">
                                                        <rect id="SvgjsRect1113" width="177.95" height="75" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1135" class="apexcharts-grid">
                                                    <g id="SvgjsG1136" class="apexcharts-gridlines-horizontal" style="display: none;">
                                                        <line id="SvgjsLine1139" x1="-19.525" y1="0" x2="193.475" y2="0" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                        <line id="SvgjsLine1140" x1="-19.525" y1="71" x2="193.475" y2="71" stroke="#363843" stroke-dasharray="4" stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                    </g>
                                                    <g id="SvgjsG1137" class="apexcharts-gridlines-vertical" style="display: none;"></g>
                                                    <line id="SvgjsLine1142" x1="0" y1="71" x2="173.95" y2="71" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                    <line id="SvgjsLine1141" x1="0" y1="1" x2="0" y2="71" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                                </g>
                                                <g id="SvgjsG1138" class="apexcharts-grid-borders" style="display: none;"></g>
                                                <g id="SvgjsG1116" class="apexcharts-bar-series apexcharts-plot-series">
                                                    <g id="SvgjsG1117" class="apexcharts-series" rel="1" seriesName="Sales" data:realIndex="0">
                                                        <path
                                                            id="SvgjsPath1122"
                                                            d="M -3.4727083333333324 60.501000000000005 L -3.4727083333333324 54.876 C -3.4727083333333324 51.876 -0.4727083333333324 48.876 2.5272916666666676 48.876 L 2.5272916666666676 48.876 C 3 48.876 3.4727083333333324 51.876 3.4727083333333324 54.876 L 3.4727083333333324 60.501000000000005 C 3.4727083333333324 63.501000000000005 0.4727083333333324 66.501 -2.5272916666666676 66.501 L -2.5272916666666676 66.501 C -3 66.501 -3.4727083333333324 63.501000000000005 -3.4727083333333324 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M -3.4727083333333324 60.501000000000005 L -3.4727083333333324 54.876 C -3.4727083333333324 51.876 -0.4727083333333324 48.876 2.5272916666666676 48.876 L 2.5272916666666676 48.876 C 3 48.876 3.4727083333333324 51.876 3.4727083333333324 54.876 L 3.4727083333333324 60.501000000000005 C 3.4727083333333324 63.501000000000005 0.4727083333333324 66.501 -2.5272916666666676 66.501 L -2.5272916666666676 66.501 C -3 66.501 -3.4727083333333324 63.501000000000005 -3.4727083333333324 60.501000000000005 Z "
                                                            pathFrom="M -3.4727083333333324 66.501 L -3.4727083333333324 66.501 L 3.4727083333333324 66.501 L 3.4727083333333324 66.501 L 3.4727083333333324 66.501 L 3.4727083333333324 66.501 L 3.4727083333333324 66.501 L -3.4727083333333324 66.501 Z"
                                                            cy="44.375"
                                                            cx="3.4727083333333324"
                                                            j="0"
                                                            val="30"
                                                            barHeight="26.625"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1124"
                                                            d="M 25.51895833333333 60.501000000000005 L 25.51895833333333 28.251 C 25.51895833333333 25.251 28.51895833333333 22.251 31.51895833333333 22.251 L 31.51895833333333 22.251 C 31.991666666666664 22.251 32.464375 25.251 32.464375 28.251 L 32.464375 60.501000000000005 C 32.464375 63.501000000000005 29.464374999999997 66.501 26.464374999999997 66.501 L 26.464374999999997 66.501 C 25.991666666666664 66.501 25.51895833333333 63.501000000000005 25.51895833333333 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M 25.51895833333333 60.501000000000005 L 25.51895833333333 28.251 C 25.51895833333333 25.251 28.51895833333333 22.251 31.51895833333333 22.251 L 31.51895833333333 22.251 C 31.991666666666664 22.251 32.464375 25.251 32.464375 28.251 L 32.464375 60.501000000000005 C 32.464375 63.501000000000005 29.464374999999997 66.501 26.464374999999997 66.501 L 26.464374999999997 66.501 C 25.991666666666664 66.501 25.51895833333333 63.501000000000005 25.51895833333333 60.501000000000005 Z "
                                                            pathFrom="M 25.51895833333333 66.501 L 25.51895833333333 66.501 L 32.464375 66.501 L 32.464375 66.501 L 32.464375 66.501 L 32.464375 66.501 L 32.464375 66.501 L 25.51895833333333 66.501 Z"
                                                            cy="17.75"
                                                            cx="32.464375"
                                                            j="1"
                                                            val="60"
                                                            barHeight="53.25"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1126"
                                                            d="M 54.510625 60.501000000000005 L 54.510625 34.46350000000001 C 54.510625 31.46350000000001 57.510625 28.463500000000007 60.510625 28.463500000000007 L 60.510625 28.463500000000007 C 60.983333333333334 28.463500000000007 61.456041666666664 31.46350000000001 61.456041666666664 34.46350000000001 L 61.456041666666664 60.501000000000005 C 61.456041666666664 63.501000000000005 58.456041666666664 66.501 55.456041666666664 66.501 L 55.456041666666664 66.501 C 54.983333333333334 66.501 54.510625 63.501000000000005 54.510625 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M 54.510625 60.501000000000005 L 54.510625 34.46350000000001 C 54.510625 31.46350000000001 57.510625 28.463500000000007 60.510625 28.463500000000007 L 60.510625 28.463500000000007 C 60.983333333333334 28.463500000000007 61.456041666666664 31.46350000000001 61.456041666666664 34.46350000000001 L 61.456041666666664 60.501000000000005 C 61.456041666666664 63.501000000000005 58.456041666666664 66.501 55.456041666666664 66.501 L 55.456041666666664 66.501 C 54.983333333333334 66.501 54.510625 63.501000000000005 54.510625 60.501000000000005 Z "
                                                            pathFrom="M 54.510625 66.501 L 54.510625 66.501 L 61.456041666666664 66.501 L 61.456041666666664 66.501 L 61.456041666666664 66.501 L 61.456041666666664 66.501 L 61.456041666666664 66.501 L 54.510625 66.501 Z"
                                                            cy="23.962500000000006"
                                                            cx="61.456041666666664"
                                                            j="2"
                                                            val="53"
                                                            barHeight="47.037499999999994"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1128"
                                                            d="M 83.50229166666666 60.501000000000005 L 83.50229166666666 41.5635 C 83.50229166666666 38.5635 86.50229166666666 35.5635 89.50229166666666 35.5635 L 89.50229166666666 35.5635 C 89.975 35.5635 90.44770833333332 38.5635 90.44770833333332 41.5635 L 90.44770833333332 60.501000000000005 C 90.44770833333332 63.501000000000005 87.44770833333332 66.501 84.44770833333332 66.501 L 84.44770833333332 66.501 C 83.975 66.501 83.50229166666666 63.501000000000005 83.50229166666666 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M 83.50229166666666 60.501000000000005 L 83.50229166666666 41.5635 C 83.50229166666666 38.5635 86.50229166666666 35.5635 89.50229166666666 35.5635 L 89.50229166666666 35.5635 C 89.975 35.5635 90.44770833333332 38.5635 90.44770833333332 41.5635 L 90.44770833333332 60.501000000000005 C 90.44770833333332 63.501000000000005 87.44770833333332 66.501 84.44770833333332 66.501 L 84.44770833333332 66.501 C 83.975 66.501 83.50229166666666 63.501000000000005 83.50229166666666 60.501000000000005 Z "
                                                            pathFrom="M 83.50229166666666 66.501 L 83.50229166666666 66.501 L 90.44770833333332 66.501 L 90.44770833333332 66.501 L 90.44770833333332 66.501 L 90.44770833333332 66.501 L 90.44770833333332 66.501 L 83.50229166666666 66.501 Z"
                                                            cy="31.0625"
                                                            cx="90.44770833333332"
                                                            j="3"
                                                            val="45"
                                                            barHeight="39.9375"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1130"
                                                            d="M 112.49395833333332 60.501000000000005 L 112.49395833333332 28.251 C 112.49395833333332 25.251 115.49395833333332 22.251 118.49395833333332 22.251 L 118.49395833333332 22.251 C 118.96666666666665 22.251 119.43937499999998 25.251 119.43937499999998 28.251 L 119.43937499999998 60.501000000000005 C 119.43937499999998 63.501000000000005 116.43937499999998 66.501 113.43937499999998 66.501 L 113.43937499999998 66.501 C 112.96666666666665 66.501 112.49395833333332 63.501000000000005 112.49395833333332 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M 112.49395833333332 60.501000000000005 L 112.49395833333332 28.251 C 112.49395833333332 25.251 115.49395833333332 22.251 118.49395833333332 22.251 L 118.49395833333332 22.251 C 118.96666666666665 22.251 119.43937499999998 25.251 119.43937499999998 28.251 L 119.43937499999998 60.501000000000005 C 119.43937499999998 63.501000000000005 116.43937499999998 66.501 113.43937499999998 66.501 L 113.43937499999998 66.501 C 112.96666666666665 66.501 112.49395833333332 63.501000000000005 112.49395833333332 60.501000000000005 Z "
                                                            pathFrom="M 112.49395833333332 66.501 L 112.49395833333332 66.501 L 119.43937499999998 66.501 L 119.43937499999998 66.501 L 119.43937499999998 66.501 L 119.43937499999998 66.501 L 119.43937499999998 66.501 L 112.49395833333332 66.501 Z"
                                                            cy="17.75"
                                                            cx="119.43937499999998"
                                                            j="4"
                                                            val="60"
                                                            barHeight="53.25"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1132"
                                                            d="M 141.48562499999997 60.501000000000005 L 141.48562499999997 14.938500000000001 C 141.48562499999997 11.938500000000001 144.48562499999997 8.938500000000001 147.48562499999997 8.938500000000001 L 147.48562499999997 8.938500000000001 C 147.95833333333331 8.938500000000001 148.43104166666663 11.938500000000001 148.43104166666663 14.938500000000001 L 148.43104166666663 60.501000000000005 C 148.43104166666663 63.501000000000005 145.43104166666663 66.501 142.43104166666663 66.501 L 142.43104166666663 66.501 C 141.95833333333331 66.501 141.48562499999997 63.501000000000005 141.48562499999997 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M 141.48562499999997 60.501000000000005 L 141.48562499999997 14.938500000000001 C 141.48562499999997 11.938500000000001 144.48562499999997 8.938500000000001 147.48562499999997 8.938500000000001 L 147.48562499999997 8.938500000000001 C 147.95833333333331 8.938500000000001 148.43104166666663 11.938500000000001 148.43104166666663 14.938500000000001 L 148.43104166666663 60.501000000000005 C 148.43104166666663 63.501000000000005 145.43104166666663 66.501 142.43104166666663 66.501 L 142.43104166666663 66.501 C 141.95833333333331 66.501 141.48562499999997 63.501000000000005 141.48562499999997 60.501000000000005 Z "
                                                            pathFrom="M 141.48562499999997 66.501 L 141.48562499999997 66.501 L 148.43104166666663 66.501 L 148.43104166666663 66.501 L 148.43104166666663 66.501 L 148.43104166666663 66.501 L 148.43104166666663 66.501 L 141.48562499999997 66.501 Z"
                                                            cy="4.4375"
                                                            cx="148.43104166666663"
                                                            j="5"
                                                            val="75"
                                                            barHeight="66.5625"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <path
                                                            id="SvgjsPath1134"
                                                            d="M 170.47729166666664 60.501000000000005 L 170.47729166666664 34.46350000000001 C 170.47729166666664 31.46350000000001 173.47729166666664 28.463500000000007 176.47729166666664 28.463500000000007 L 176.47729166666664 28.463500000000007 C 176.95 28.463500000000007 177.4227083333333 31.46350000000001 177.4227083333333 34.46350000000001 L 177.4227083333333 60.501000000000005 C 177.4227083333333 63.501000000000005 174.4227083333333 66.501 171.4227083333333 66.501 L 171.4227083333333 66.501 C 170.95 66.501 170.47729166666664 63.501000000000005 170.47729166666664 60.501000000000005 Z "
                                                            fill="rgba(0,106,230,0.85)"
                                                            fill-opacity="1"
                                                            stroke="transparent"
                                                            stroke-opacity="1"
                                                            stroke-linecap="round"
                                                            stroke-width="9"
                                                            stroke-dasharray="0"
                                                            class="apexcharts-bar-area"
                                                            index="0"
                                                            clip-path="url(#gridRectMask4ak80wm)"
                                                            pathTo="M 170.47729166666664 60.501000000000005 L 170.47729166666664 34.46350000000001 C 170.47729166666664 31.46350000000001 173.47729166666664 28.463500000000007 176.47729166666664 28.463500000000007 L 176.47729166666664 28.463500000000007 C 176.95 28.463500000000007 177.4227083333333 31.46350000000001 177.4227083333333 34.46350000000001 L 177.4227083333333 60.501000000000005 C 177.4227083333333 63.501000000000005 174.4227083333333 66.501 171.4227083333333 66.501 L 171.4227083333333 66.501 C 170.95 66.501 170.47729166666664 63.501000000000005 170.47729166666664 60.501000000000005 Z "
                                                            pathFrom="M 170.47729166666664 66.501 L 170.47729166666664 66.501 L 177.4227083333333 66.501 L 177.4227083333333 66.501 L 177.4227083333333 66.501 L 177.4227083333333 66.501 L 177.4227083333333 66.501 L 170.47729166666664 66.501 Z"
                                                            cy="23.962500000000006"
                                                            cx="177.4227083333333"
                                                            j="6"
                                                            val="53"
                                                            barHeight="47.037499999999994"
                                                            barWidth="15.945416666666665"
                                                        ></path>
                                                        <g id="SvgjsG1119" class="apexcharts-bar-goals-markers">
                                                            <g id="SvgjsG1121" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                            <g id="SvgjsG1123" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                            <g id="SvgjsG1125" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                            <g id="SvgjsG1127" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                            <g id="SvgjsG1129" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                            <g id="SvgjsG1131" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                            <g id="SvgjsG1133" className="apexcharts-bar-goals-groups" class="apexcharts-hidden-element-shown" clip-path="url(#gridRectMarkerMask4ak80wm)"></g>
                                                        </g>
                                                        <g id="SvgjsG1120" class="apexcharts-bar-shadows apexcharts-hidden-element-shown"></g>
                                                    </g>
                                                    <g id="SvgjsG1118" class="apexcharts-datalabels apexcharts-hidden-element-shown" data:realIndex="0"></g>
                                                </g>
                                                <line id="SvgjsLine1143" x1="-19.525" y1="0" x2="193.475" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1144" x1="-19.525" y1="0" x2="193.475" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                                <g id="SvgjsG1145" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1146" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g>
                                                <g id="SvgjsG1156" class="apexcharts-yaxis-annotations"></g>
                                                <g id="SvgjsG1157" class="apexcharts-xaxis-annotations"></g>
                                                <g id="SvgjsG1158" class="apexcharts-point-annotations"></g>
                                            </g>
                                        </svg>
                                        <div class="apexcharts-tooltip apexcharts-theme-light">
                                            <div class="apexcharts-tooltip-title" style="font-family: inherit; font-size: 12px;"></div>
                                            <div class="apexcharts-tooltip-series-group" style="order: 1;">
                                                <span class="apexcharts-tooltip-marker" style="background-color: rgb(0, 106, 230);"></span>
                                                <div class="apexcharts-tooltip-text" style="font-family: inherit; font-size: 12px;">
                                                    <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div>
                                                    <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                                    <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div>
                                    </div>
                                </div>
                                <!--end::Chart-->
                            </div>
                        </div>
                        <!--end::Card widget 6-->
                        <!--begin::Template settings-->
                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Product Template</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0">
                                <!--begin::Select store template-->
                                <label for="kt_ecommerce_add_product_store_template" class="form-label">Select a product template</label>
                                <!--end::Select store template-->

                                <select
                                    class="form-select mb-2 select2-hidden-accessible"
                                    data-control="select2"
                                    data-hide-search="true"
                                    data-placeholder="Select an option"
                                    id="kt_ecommerce_add_product_store_template"
                                    data-select2-id="select2-data-kt_ecommerce_add_product_store_template"
                                    tabindex="-1"
                                    aria-hidden="true"
                                    data-kt-initialized="1"
                                >
                                    <option></option>
                                    <option value="default" selected="" data-select2-id="select2-data-12-3ggc">Default template</option>
                                    <option value="electronics">Electronics</option>
                                    <option value="office">Office stationary</option>
                                    <option value="fashion">Fashion</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-rytd" style="width: 100%;">
                                    <span class="selection">
                                        <span
                                            class="select2-selection select2-selection--single form-select mb-2"
                                            role="combobox"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                            tabindex="0"
                                            aria-disabled="false"
                                            aria-labelledby="select2-kt_ecommerce_add_product_store_template-container"
                                            aria-controls="select2-kt_ecommerce_add_product_store_template-container"
                                        >
                                            <span class="select2-selection__rendered" id="select2-kt_ecommerce_add_product_store_template-container" role="textbox" aria-readonly="true" title="Default template">Default template</span>
                                            <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                        </span>
                                    </span>
                                    <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>

                                <div class="text-muted fs-7">Assign a template from your current theme to define how a single product is displayed.</div>
                            </div>
                        </div>
                        <!--end::Template settings-->
                    </div>
                    <!--end::Aside column-->

                    <!--begin::Main column-->
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <!--begin:::Tabs-->
                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-n2" role="tablist">
                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_ecommerce_add_product_general" aria-selected="true" role="tab">General</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_advanced" aria-selected="false" tabindex="-1" role="tab">Advanced</a>
                            </li>
                            <!--end:::Tab item-->

                            <!--begin:::Tab item-->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_ecommerce_add_product_reviews" aria-selected="false" tabindex="-1" role="tab">Reviews</a>
                            </li>
                            <!--end:::Tab item-->
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::General options-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>General</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-10 fv-row fv-plugins-icon-container">

                                                <label class="required form-label">Product Name</label>

                                                <input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="Sample product" />

                                                <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>

                                            <div>

                                                <label class="form-label">Description</label>

                                                <!--begin::Editor-->
                                                <div role="toolbar" class="ql-toolbar ql-snow">
                                                    <span class="ql-formats">
                                                        <span class="ql-header ql-picker">
                                                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-0">
                                                                <svg viewBox="0 0 18 18">
                                                                    <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                                                    <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                                                </svg>
                                                            </span>
                                                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-0">
                                                                <span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span>
                                                                <span tabindex="0" role="button" class="ql-picker-item ql-selected"></span>
                                                            </span>
                                                        </span>
                                                        <select class="ql-header" style="display: none;">
                                                            <option value="1"></option>
                                                            <option value="2"></option>
                                                            <option selected="selected"></option>
                                                        </select>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button type="button" class="ql-bold" aria-pressed="false" aria-label="bold">
                                                            <svg viewBox="0 0 18 18">
                                                                <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path>
                                                                <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ql-italic" aria-pressed="false" aria-label="italic">
                                                            <svg viewBox="0 0 18 18">
                                                                <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                                                <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                                                <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ql-underline" aria-pressed="false" aria-label="underline">
                                                            <svg viewBox="0 0 18 18">
                                                                <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                                                <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button type="button" class="ql-image" aria-pressed="false" aria-label="image">
                                                            <svg viewBox="0 0 18 18">
                                                                <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                                                                <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                                                <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ql-code-block" aria-pressed="false" aria-label="code-block">
                                                            <svg viewBox="0 0 18 18">
                                                                <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
                                                                <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
                                                                <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2 ql-container ql-snow">
                                                    <div class="ql-editor ql-blank" contenteditable="true" data-placeholder="Type your text here...">
                                                        <p><br /></p>
                                                    </div>
                                                    <div class="ql-tooltip ql-hidden">
                                                        <a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>
                                                        <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL" /><a class="ql-action"></a><a class="ql-remove"></a>
                                                    </div>
                                                </div>
                                                <!--end::Editor-->

                                                <div class="text-muted fs-7">Set a description to the product for better visibility.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::General options-->
                                    <!--begin::Media-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Media</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="fv-row mb-2">
                                                <!--begin::Dropzone-->
                                                <div class="dropzone dz-clickable" id="kt_ecommerce_add_product_media">
                                                    <!--begin::Message-->
                                                    <div class="dz-message needsclick">
                                                        <!--begin::Icon-->
                                                        <i class="ki-duotone ki-file-up text-primary fs-3x"><span class="path1"></span><span class="path2"></span></i>
                                                        <!--end::Icon-->
                                                        <div class="ms-4">
                                                            <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload.</h3>
                                                            <span class="fs-7 fw-semibold text-gray-500">Upload up to 10 files</span>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                </div>
                                                <!--end::Dropzone-->
                                            </div>

                                            <div class="text-muted fs-7">Set the product media gallery.</div>
                                        </div>
                                    </div>
                                    <!--end::Media-->

                                    <!--begin::Pricing-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Pricing</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-10 fv-row fv-plugins-icon-container">

                                                <label class="required form-label">Base Price</label>

                                                <input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="199.99" />

                                                <div class="text-muted fs-7">Set the product price.</div>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>

                                            <div class="fv-row mb-10">

                                                <label class="fs-6 fw-semibold mb-2">
                                                    Discount Type

                                                    <span
                                                        class="ms-1"
                                                        data-bs-toggle="tooltip"
                                                        aria-label="Select a discount type that will be applied to this product"
                                                        data-bs-original-title="Select a discount type that will be applied to this product"
                                                        data-kt-initialized="1"
                                                    >
                                                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                                    </span>
                                                </label>
                                                <!--End::Label-->

                                                <!--begin::Row-->
                                                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']" data-kt-initialized="1">
                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio" name="discount_option" value="1" />
                                                            </span>
                                                            <!--end::Radio-->

                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">No Discount</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio" name="discount_option" value="2" checked="checked" />
                                                            </span>
                                                            <!--end::Radio-->

                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">Percentage %</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->

                                                    <!--begin::Col-->
                                                    <div class="col">
                                                        <!--begin::Option-->
                                                        <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                                            <!--begin::Radio-->
                                                            <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                                                <input class="form-check-input" type="radio" name="discount_option" value="3" />
                                                            </span>
                                                            <!--end::Radio-->

                                                            <span class="ms-5">
                                                                <span class="fs-4 fw-bold text-gray-800 d-block">Fixed Price</span>
                                                            </span>
                                                            <!--end::Info-->
                                                        </label>
                                                        <!--end::Option-->
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>

                                            <div class="mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">

                                                <label class="form-label">Set Discount Percentage</label>

                                                <!--begin::Slider-->
                                                <div class="d-flex flex-column text-center mb-5">
                                                    <div class="d-flex align-items-start justify-content-center mb-7">
                                                        <span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">10</span>
                                                        <span class="fw-bold fs-4 mt-1 ms-2">%</span>
                                                    </div>
                                                    <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr">
                                                        <div class="noUi-base">
                                                            <div class="noUi-connects"></div>
                                                            <div class="noUi-origin" style="transform: translate(-90.9091%, 0px); z-index: 4;">
                                                                <div
                                                                    class="noUi-handle noUi-handle-lower"
                                                                    data-handle="0"
                                                                    tabindex="0"
                                                                    role="slider"
                                                                    aria-orientation="horizontal"
                                                                    aria-valuemin="1.0"
                                                                    aria-valuemax="100.0"
                                                                    aria-valuenow="10.0"
                                                                    aria-valuetext="10.00"
                                                                >
                                                                    <div class="noUi-touch-area"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Slider-->

                                                <div class="text-muted fs-7">Set a percentage discount to be applied on this product.</div>
                                            </div>

                                            <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">

                                                <label class="form-label">Fixed Discounted Price</label>

                                                <input type="text" name="dicsounted_price" class="form-control mb-2" placeholder="Discounted price" />

                                                <div class="text-muted fs-7">Set the discounted product price. The product will be reduced at the determined fixed price</div>
                                            </div>

                                            <!--begin::Tax-->
                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">

                                                    <label class="required form-label">Tax Class</label>

                                                    <select
                                                        class="form-select mb-2 select2-hidden-accessible"
                                                        name="tax"
                                                        data-control="select2"
                                                        data-hide-search="true"
                                                        data-placeholder="Select an option"
                                                        data-select2-id="select2-data-13-mzyb"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1"
                                                    >
                                                        <option></option>
                                                        <option value="0">Tax Free</option>
                                                        <option value="1" selected="" data-select2-id="select2-data-15-re8f">Taxable Goods</option>
                                                        <option value="2">Downloadable Product</option>
                                                    </select>
                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-3cmp" style="width: 100%;">
                                                        <span class="selection">
                                                            <span
                                                                class="select2-selection select2-selection--single form-select mb-2"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-tax-l0-container"
                                                                aria-controls="select2-tax-l0-container"
                                                            >
                                                                <span class="select2-selection__rendered" id="select2-tax-l0-container" role="textbox" aria-readonly="true" title="Taxable Goods">Taxable Goods</span>
                                                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                                            </span>
                                                        </span>
                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                    </span>

                                                    <div class="text-muted fs-7">Set the product tax class.</div>
                                                    <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">

                                                    <label class="form-label">VAT Amount (%)</label>

                                                    <input type="text" class="form-control mb-2" value="35" />

                                                    <div class="text-muted fs-7">Set the product VAT about.</div>
                                                </div>
                                            </div>
                                            <!--end:Tax-->
                                        </div>
                                    </div>
                                    <!--end::Pricing-->
                                </div>
                            </div>
                            <!--end::Tab pane-->

                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_add_product_advanced" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Inventory-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Inventory</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-10 fv-row fv-plugins-icon-container">

                                                <label class="required form-label">SKU</label>

                                                <input type="text" name="sku" class="form-control mb-2" placeholder="SKU Number" value="011985001" />

                                                <div class="text-muted fs-7">Enter the product SKU.</div>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>

                                            <div class="mb-10 fv-row fv-plugins-icon-container">

                                                <label class="required form-label">Barcode</label>

                                                <input type="text" name="barcode" class="form-control mb-2" placeholder="Barcode Number" value="45874521458" />

                                                <div class="text-muted fs-7">Enter the product barcode number.</div>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>

                                            <div class="mb-10 fv-row fv-plugins-icon-container">

                                                <label class="required form-label">Quantity</label>

                                                <div class="d-flex gap-3">
                                                    <input type="number" name="shelf" class="form-control mb-2" placeholder="On shelf" value="24" />
                                                    <input type="number" name="warehouse" class="form-control mb-2" placeholder="In warehouse" />
                                                </div>

                                                <div class="text-muted fs-7">Enter the product quantity.</div>
                                                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                            </div>

                                            <div class="fv-row">

                                                <label class="form-label">Allow Backorders</label>

                                                <div class="form-check form-check-custom form-check-solid mb-2">
                                                    <input class="form-check-input" type="checkbox" value="" />
                                                    <label class="form-check-label">
                                                        Yes
                                                    </label>
                                                </div>

                                                <div class="text-muted fs-7">Allow customers to purchase products that are out of stock.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Inventory-->

                                    <!--begin::Variations-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Variations</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="" data-kt-ecommerce-catalog-add-product="auto-options">

                                                <label class="form-label">Add Product Variations</label>

                                                <!--begin::Repeater-->
                                                <div id="kt_ecommerce_add_product_options">
                                                    <!--begin::Form group-->
                                                    <div class="form-group">
                                                        <div data-repeater-list="kt_ecommerce_add_product_options" class="d-flex flex-column gap-3">
                                                            <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                                                <div class="w-100 w-md-200px">
                                                                    <select
                                                                        class="form-select select2-hidden-accessible"
                                                                        name="kt_ecommerce_add_product_options[0][product_option]"
                                                                        data-placeholder="Select a variation"
                                                                        data-kt-ecommerce-catalog-add-product="product_option"
                                                                        data-select2-id="select2-data-133-su11"
                                                                        tabindex="-1"
                                                                        aria-hidden="true"
                                                                    >
                                                                        <option data-select2-id="select2-data-135-r812"></option>
                                                                        <option value="color">Color</option>
                                                                        <option value="size">Size</option>
                                                                        <option value="material">Material</option>
                                                                        <option value="style">Style</option>
                                                                    </select>
                                                                    <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-134-pzg4" style="width: 100%;">
                                                                        <span class="selection">
                                                                            <span
                                                                                class="select2-selection select2-selection--single form-select"
                                                                                role="combobox"
                                                                                aria-haspopup="true"
                                                                                aria-expanded="false"
                                                                                tabindex="0"
                                                                                aria-disabled="false"
                                                                                aria-labelledby="select2-kt_ecommerce_add_product_options0product_option-m6-container"
                                                                                aria-controls="select2-kt_ecommerce_add_product_options0product_option-m6-container"
                                                                            >
                                                                                <span
                                                                                    class="select2-selection__rendered"
                                                                                    id="select2-kt_ecommerce_add_product_options0product_option-m6-container"
                                                                                    role="textbox"
                                                                                    aria-readonly="true"
                                                                                    title="Select a variation"
                                                                                >
                                                                                    <span class="select2-selection__placeholder">Select a variation</span>
                                                                                </span>
                                                                                <span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span>
                                                                            </span>
                                                                        </span>
                                                                        <span class="dropdown-wrapper" aria-hidden="true"></span>
                                                                    </span>
                                                                </div>

                                                                <input type="text" class="form-control mw-100 w-200px" name="kt_ecommerce_add_product_options[0][product_option_value]" placeholder="Variation" />

                                                                <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger">
                                                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Form group-->

                                                    <!--begin::Form group-->
                                                    <div class="form-group mt-5">
                                                        <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary"><i class="ki-duotone ki-plus fs-2"></i> Add another variation</button>
                                                    </div>
                                                    <!--end::Form group-->
                                                </div>
                                                <!--end::Repeater-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Variations-->

                                    <!--begin::Shipping-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Shipping</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="fv-row">
                                                <div class="form-check form-check-custom form-check-solid mb-2">
                                                    <input class="form-check-input" type="checkbox" id="kt_ecommerce_add_product_shipping_checkbox" value="1" checked="" />
                                                    <label class="form-check-label">
                                                        This is a physical product
                                                    </label>
                                                </div>

                                                <div class="text-muted fs-7">Set if the product is a physical or digital item. Physical products may require shipping.</div>
                                            </div>

                                            <!--begin::Shipping form-->
                                            <div id="kt_ecommerce_add_product_shipping" class="mt-10">
                                                <div class="mb-10 fv-row">

                                                    <label class="form-label">Weight</label>

                                                    <!--begin::Editor-->
                                                    <input type="text" name="weight" class="form-control mb-2" placeholder="Product weight" value="4.3" />
                                                    <!--end::Editor-->

                                                    <div class="text-muted fs-7">Set a product weight in kilograms (kg).</div>
                                                </div>

                                                <div class="fv-row">

                                                    <label class="form-label">Dimension</label>

                                                    <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                                        <input type="number" name="width" class="form-control mb-2" placeholder="Width (w)" value="12" />
                                                        <input type="number" name="height" class="form-control mb-2" placeholder="Height (h)" value="4" />
                                                        <input type="number" name="length" class="form-control mb-2" placeholder="Lengtn (l)" value="8.5" />
                                                    </div>

                                                    <div class="text-muted fs-7">Enter the product dimensions in centimeters (cm).</div>
                                                </div>
                                            </div>
                                            <!--end::Shipping form-->
                                        </div>
                                    </div>
                                    <!--end::Shipping-->
                                    <!--begin::Meta options-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Meta Options</h2>
                                            </div>
                                        </div>

                                        <div class="card-body pt-0">
                                            <div class="mb-10">

                                                <label class="form-label">Meta Tag Title</label>

                                                <input type="text" class="form-control mb-2" name="meta_title" placeholder="Meta tag name" />

                                                <div class="text-muted fs-7">Set a meta tag title. Recommended to be simple and precise keywords.</div>
                                            </div>

                                            <div class="mb-10">

                                                <label class="form-label">Meta Tag Description</label>

                                                <!--begin::Editor-->
                                                <div role="toolbar" class="ql-toolbar ql-snow">
                                                    <span class="ql-formats">
                                                        <span class="ql-header ql-picker">
                                                            <span class="ql-picker-label" tabindex="0" role="button" aria-expanded="false" aria-controls="ql-picker-options-1">
                                                                <svg viewBox="0 0 18 18">
                                                                    <polygon class="ql-stroke" points="7 11 9 13 11 11 7 11"></polygon>
                                                                    <polygon class="ql-stroke" points="7 7 9 5 11 7 7 7"></polygon>
                                                                </svg>
                                                            </span>
                                                            <span class="ql-picker-options" aria-hidden="true" tabindex="-1" id="ql-picker-options-1">
                                                                <span tabindex="0" role="button" class="ql-picker-item" data-value="1"></span><span tabindex="0" role="button" class="ql-picker-item" data-value="2"></span>
                                                                <span tabindex="0" role="button" class="ql-picker-item ql-selected"></span>
                                                            </span>
                                                        </span>
                                                        <select class="ql-header" style="display: none;">
                                                            <option value="1"></option>
                                                            <option value="2"></option>
                                                            <option selected="selected"></option>
                                                        </select>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button type="button" class="ql-bold" aria-pressed="false" aria-label="bold">
                                                            <svg viewBox="0 0 18 18">
                                                                <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path>
                                                                <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ql-italic" aria-pressed="false" aria-label="italic">
                                                            <svg viewBox="0 0 18 18">
                                                                <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line>
                                                                <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line>
                                                                <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ql-underline" aria-pressed="false" aria-label="underline">
                                                            <svg viewBox="0 0 18 18">
                                                                <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path>
                                                                <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <span class="ql-formats">
                                                        <button type="button" class="ql-image" aria-pressed="false" aria-label="image">
                                                            <svg viewBox="0 0 18 18">
                                                                <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect>
                                                                <circle class="ql-fill" cx="6" cy="7" r="1"></circle>
                                                                <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline>
                                                            </svg>
                                                        </button>
                                                        <button type="button" class="ql-code-block" aria-pressed="false" aria-label="code-block">
                                                            <svg viewBox="0 0 18 18">
                                                                <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline>
                                                                <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline>
                                                                <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2 ql-container ql-snow">
                                                    <div class="ql-editor ql-blank" contenteditable="true" data-placeholder="Type your text here...">
                                                        <p><br /></p>
                                                    </div>
                                                    <div class="ql-tooltip ql-hidden">
                                                        <a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>
                                                        <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL" /><a class="ql-action"></a><a class="ql-remove"></a>
                                                    </div>
                                                </div>
                                                <!--end::Editor-->

                                                <div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div>
                                            </div>

                                            <div>

                                                <label class="form-label">Meta Tag Keywords</label>

                                                <!--begin::Editor-->
                                                <input id="kt_ecommerce_add_product_meta_keywords" name="kt_ecommerce_add_product_meta_keywords" class="form-control mb-2" />
                                                <!--end::Editor-->

                                                <div class="text-muted fs-7">Set a list of keywords that the product is related to. Separate the keywords by adding a comma <code>,</code> between each keyword.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Meta options-->
                                </div>
                            </div>
                            <!--end::Tab pane-->

                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_ecommerce_add_product_reviews" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <!--begin::Reviews-->
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Customer Reviews</h2>
                                            </div>

                                            <!--begin::Card toolbar-->
                                            <div class="card-toolbar">
                                                <!--begin::Rating label-->
                                                <span class="fw-bold me-5">Overall Rating: </span>
                                                <!--end::Rating label-->

                                                <!--begin::Overall rating-->
                                                <div class="rating">
                                                    <div class="rating-label checked">
                                                        <i class="ki-duotone ki-star fs-2"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="ki-duotone ki-star fs-2"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="ki-duotone ki-star fs-2"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="ki-duotone ki-star fs-2"></i>
                                                    </div>
                                                    <div class="rating-label">
                                                        <i class="ki-duotone ki-star fs-2"></i>
                                                    </div>
                                                </div>
                                                <!--end::Overall rating-->
                                            </div>
                                            <!--end::Card toolbar-->
                                        </div>

                                        <div class="card-body pt-0">
                                            <!--begin::Table-->
                                            <table class="table table-row-dashed fs-6 gy-5 my-0" id="kt_ecommerce_add_product_reviews">
                                                <thead>
                                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                                        <th class="w-10px pe-2">
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_add_product_reviews .form-check-input" value="1" />
                                                            </div>
                                                        </th>
                                                        <th class="min-w-125px">Rating</th>
                                                        <th class="min-w-175px">Customer</th>
                                                        <th class="min-w-175px">Comment</th>
                                                        <th class="min-w-100px text-end fs-7">Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <div class="symbol-label bg-light-danger">
                                                                        <span class="text-danger">M</span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Melody Macy</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            I like this design
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">Today</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-1.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Max Smith</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Good product for outdoors or indoors
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">day ago</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-4">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-5.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Sean Bean</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Awesome quality with great materials used, but could be more comfortable
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">11:20 PM</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-25.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Brian Cox</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            This is the best product I've ever used.
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">2 days ago</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-3">
                                                            <!--begin::Rating-->
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
                                                                <div class="rating-label">
                                                                    <i class="ki-duotone ki-star fs-6"></i>
                                                                </div>
                                                                <div class="rating-label">
                                                                    <i class="ki-duotone ki-star fs-6"></i>
                                                                </div>
                                                            </div>
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <div class="symbol-label bg-light-warning">
                                                                        <span class="text-warning">C</span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Mikaela Collins</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            I thought it was just average, I prefer other brands
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">July 25</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-9.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Francis Mitcham</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Beautifully crafted. Worth every penny.
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">July 24</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-4">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <div class="symbol-label bg-light-danger">
                                                                        <span class="text-danger">O</span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Olivia Wild</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Awesome value for money. Shipping could be faster tho.
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">July 13</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <div class="symbol-label bg-light-primary">
                                                                        <span class="text-primary">N</span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Neil Owen</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Excellent quality, I got it for my son's birthday and he loved it!
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">May 25</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-23.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Dan Wilson</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            I got this for Christmas last year, and it's still the best product I've ever used!
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">April 15</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <div class="symbol-label bg-light-danger">
                                                                        <span class="text-danger">E</span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Emma Bold</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Was skeptical at first, but after using it for 3 months, I'm hooked! Will definately buy another!
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">April 3</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-4">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-12.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Ana Crown</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Great product, too bad I missed out on the sale.
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">March 17</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <div class="symbol-label bg-light-info">
                                                                        <span class="text-info">A</span>
                                                                    </div>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">Robert Doe</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Got this on sale! Best decision ever!
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">March 12</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <!--begin::Checkbox-->
                                                            <div class="form-check form-check-sm form-check-custom form-check-solid mt-1">
                                                                <input class="form-check-input" type="checkbox" value="1" />
                                                            </div>
                                                            <!--end::Checkbox-->
                                                        </td>
                                                        <td data-order="rating-5">
                                                            <!--begin::Rating-->
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
                                                            <!--end::Rating-->
                                                        </td>
                                                        <td>
                                                            <a href="/apps/inbox/reply.html" class="d-flex text-gray-900 text-gray-800 text-hover-primary">
                                                                <!--begin::Avatar-->
                                                                <div class="symbol symbol-circle symbol-25px me-3">
                                                                    <span class="symbol-label" style="background-image: url(/assets/media/avatars/300-13.jpg);"></span>
                                                                </div>
                                                                <!--end::Avatar-->

                                                                <!--begin::Name-->
                                                                <span class="fw-bold">John Miller</span>
                                                                <!--end::Name-->
                                                            </a>
                                                        </td>
                                                        <td class="text-gray-600 fw-bold">
                                                            Firesale is on! Buy now! Totally worth it!
                                                        </td>
                                                        <td class="text-end">
                                                            <span class="fw-semibold text-muted">March 11</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                    </div>
                                    <!--end::Reviews-->
                                </div>
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tab content-->

                        <div class="d-flex justify-content-end">
                            <a href="/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                                Cancel
                            </a>

                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    Save Changes
                                </span>
                                <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span> </span>
                            </button>
                        </div>
                    </div>
                    <!--end::Main column-->
                </form>
                <!--end::Form-->
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
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

@endsection
