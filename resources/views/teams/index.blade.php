@extends('layouts.app') @section('title', __('messages.teams')) @section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('assets/css/pagination.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/date-select.css') }}" rel="stylesheet" type="text/css" />

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
                                <h3 class="fw-bold my-2">
                                    {{ __('messages.teams') }}
                                </h3>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1"></li>
                        </ul>
                    </div>
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> {{ __('messages.create_team') }} </a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">

                <div class="d-flex flex-wrap flex-stack mb-6">

                    <div class="d-flex flex-wrap my-2">
                        <div class="me-4">
                            <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm form-select-solid w-125px select2-hidden-accessible" data-select2-id="select2-data-7-5t51" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                <option value="Active" selected="" data-select2-id="select2-data-9-oi9w">Active</option>
                                <option value="Approved">In Progress</option>
                                <option value="Declined">To Do</option>
                                <option value="In Progress">Completed</option>
                            </select>
                            <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-6k30" style="width: 100%">
                                <span class="selection"
                                    ><span class="select2-selection select2-selection--single form-select form-select-sm form-select-solid w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-status-wy-container" aria-controls="select2-status-wy-container"
                                        ><span class="select2-selection__rendered" id="select2-status-wy-container" role="textbox" aria-readonly="true" title="Active">Active</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span
                                ><span class="dropdown-wrapper" aria-hidden="true"></span
                            ></span>
                        </div>
                    </div>
                </div>
                @include('components.team.card-list')
                <div class="d-flex flex-stack flex-wrap pt-10">
                    <div class="fs-6 fw-semibold text-gray-700">Showing 1 to 10 of 50 entries</div>

                    <ul class="pagination">
                        <li class="page-item previous">
                            <a href="#" class="page-link"><i class="previous"></i></a>
                        </li>

                        <li class="page-item active">
                            <a href="#" class="page-link">1</a>
                        </li>

                        <li class="page-item">
                            <a href="#" class="page-link">2</a>
                        </li>

                        <li class="page-item">
                            <a href="#" class="page-link">3</a>
                        </li>

                        <li class="page-item">
                            <a href="#" class="page-link">4</a>
                        </li>

                        <li class="page-item">
                            <a href="#" class="page-link">5</a>
                        </li>

                        <li class="page-item">
                            <a href="#" class="page-link">6</a>
                        </li>

                        <li class="page-item next">
                            <a href="#" class="page-link"><i class="next"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
@endsection
