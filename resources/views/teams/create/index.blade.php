@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section( 'content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main" data-select2-id="select2-data-kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/saul-html-pro/index.html" class="text-gray-500 text-hover-primary">
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
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.create_team') }}</h1>
                    </div>
                    <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app"> Create Project </a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid" data-select2-id="select2-data-kt_app_content">
            <div id="kt_app_content_container" class="app-container container-fluid" data-select2-id="select2-data-kt_app_content_container">
                <div class="d-flex flex-column flex-lg-row" data-select2-id="select2-data-129-bxdx">
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                        <div class="card">
                            <div class="card-body p-12">
                                <form action="" id="kt_invoice_form">
                                    <div class="mb-0">
                                        <div class="table-responsive mb-10">
                                            <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700" data-kt-element="items">
                                                <thead>
                                                    <tr class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                                        <th class="min-w-300px w-475px">Item</th>
                                                        <th class="min-w-100px w-100px">QTY</th>
                                                        <th class="min-w-150px w-150px">Price</th>
                                                        <th class="min-w-100px w-150px text-end">Total</th>
                                                        <th class="min-w-75px w-75px text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                        <td class="pe-7">
                                                            <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" />

                                                            <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" />
                                                        </td>

                                                        <td class="ps-0">
                                                            <input type="text" class="form-control form-control-solid" min="1" name="quantity[]" placeholder="1" value="1" data-kt-element="quantity" />
                                                        </td>

                                                        <td>
                                                            <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" value="0.00" data-kt-element="price" />
                                                        </td>

                                                        <td class="pt-8 text-end text-nowrap">$<span data-kt-element="total">0.00</span></td>

                                                        <td class="pt-5 text-end">
                                                            <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                                <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr class="border-top border-top-dashed align-top fs-6 fw-bold text-gray-700">
                                                        <th class="text-primary">
                                                            <button class="btn btn-link py-1" data-kt-element="add-item">Add item</button>
                                                        </th>

                                                        <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                                            <div class="d-flex flex-column align-items-start">
                                                                <div class="fs-5">Subtotal</div>

                                                                <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Coming soon" data-kt-initialized="1">Add tax</button>

                                                                <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Coming soon" data-kt-initialized="1">Add discount</button>
                                                            </div>
                                                        </th>

                                                        <th colspan="2" class="border-bottom border-bottom-dashed text-end">$<span data-kt-element="sub-total">0.00</span></th>
                                                    </tr>

                                                    <tr class="align-top fw-bold text-gray-700">
                                                        <th></th>

                                                        <th colspan="2" class="fs-4 ps-0">Total</th>

                                                        <th colspan="2" class="text-end fs-4 text-nowrap">$<span data-kt-element="grand-total">0.00</span></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <table class="table d-none" data-kt-element="item-template">
                                            <tbody>
                                                <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                    <td class="pe-7">
                                                        <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name" />

                                                        <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description" />
                                                    </td>

                                                    <td class="ps-0">
                                                        <input type="text" class="form-control form-control-solid" min="1" name="quantity[]" placeholder="1" data-kt-element="quantity" />
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" data-kt-element="price" />
                                                    </td>

                                                    <td class="pt-8 text-end">$<span data-kt-element="total">0.00</span></td>

                                                    <td class="pt-5 text-end">
                                                        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                            <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table class="table d-none" data-kt-element="empty-template">
                                            <tbody>
                                                <tr data-kt-element="empty">
                                                    <th colspan="5" class="text-muted text-center py-10">No items</th>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="mb-0">
                                            <label class="form-label fs-6 fw-bold text-gray-700">Notes</label>

                                            <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Thanks for your business"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="flex-lg-auto min-w-lg-300px" data-select2-id="select2-data-128-kom0">
                        <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95" style="">
                            <div class="card-body p-10">
                                <div class="mb-10">
                            <label class="form-label fw-bold fs-6 text-gray-700">Currency</label>

                            <select name="currency" id="currency-select" class="form-select form-select-solid w-100">
                                <option value="">Select currency</option>
                                <option value="USD"><b>USD</b> - USA dollar</option>
                                <option value="GBP"><b>GBP</b> - British pound</option>
                                <option value="AUD"><b>AUD</b> - Australian dollar</option>
                                <option value="JPY"><b>JPY</b> - Japanese yen</option>
                            </select>
                        </div>
                                <div class="separator separator-dashed mb-8"></div>

                                <div class="mb-8">
                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                        <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700"> Payment method </span>
                                        <input class="form-check-input" type="checkbox" checked="checked" value="" />
                                    </label>

                                    <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                        <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700"> Late fees </span>

                                        <input class="form-check-input" type="checkbox" value="" />
                                    </label>
                                </div>
                                <div class="separator separator-dashed mb-8"></div>
                                <div class="mb-0">
                                    <div class="row mb-5">
                                        <div class="col">
                                            <a href="#" class="btn btn-light btn-active-light-primary w-100">Preview</a>
                                        </div>
                                        <div class="col">
                                            <a href="#" class="btn btn-light btn-active-light-primary w-100">Download</a>
                                        </div>
                                    </div>
                                    <button type="submit" href="#" class="btn btn-primary w-100" id="kt_invoice_submit_button">
                                        <i class="ki-duotone ki-triangle fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Send Invoice
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

@endsection
@section('page-scripts')

@endsection
