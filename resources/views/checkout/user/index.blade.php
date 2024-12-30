@extends('layouts.app')
@section('title', {{ __('messages.user_checkout') }})

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container"
                class="app-container container-fluid d-flex align-items-stretch">
                <div
                    class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li
                                class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a
                                    href="/saul-html-pro/index.html"
                                    class="text-gray-500 text-hover-primary">
                                    <i
                                        class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item">
                                <i
                                    class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>

                            <li
                                class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Apps
                            </li>

                            <li class="breadcrumb-item">
                                <i
                                    class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>

                            <li
                                class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                Subscription
                            </li>

                            <li class="breadcrumb-item">
                                <i
                                    class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>

                            <li class="breadcrumb-item text-gray-700">
                                Add Subscription
                            </li>
                        </ul>

                        <h1
                            class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            Subscription Details
                        </h1>
                    </div>

                    <a
                        href="#"
                        class="btn btn-sm btn-success ms-3 px-4 py-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_create_app">
                        Create Project
                    </a>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div
                id="kt_app_content_container"
                class="app-container container-fluid">
                <div class="d-flex flex-column flex-lg-row">
                    <div
                        class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                        <form
                            class="form"
                            action="#"
                            id="kt_subscriptions_create_new">
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">Customer</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div
                                        class="text-gray-500 fw-semibold fs-5 mb-5">
                                        Select or add a customer to a
                                        subscription:
                                    </div>

                                    <div
                                        class="d-flex align-items-center p-3 mb-2">
                                        <div
                                            class="symbol symbol-60px symbol-circle me-3">
                                            <img
                                                alt="Pic"
                                                src="/saul-html-pro/assets/media/avatars/300-5.jpg"
                                            />
                                        </div>

                                        <div class="d-flex flex-column">
                                            <a
                                                href="#"
                                                class="fs-4 fw-bold text-gray-900 text-hover-primary me-2">Sean Bean</a>

                                            <a
                                                href="#"
                                                class="fw-semibold text-gray-600 text-hover-primary">sean@dellito.com</a>
                                        </div>
                                    </div>

                                    <div class="mb-7 d-none">
                                        <a
                                            href="#"
                                            class="btn btn-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_customer_search">Select Customer</a>

                                        <span class="fw-bold text-gray-500 mx-2">or</span>

                                        <a
                                            href="/saul-html-pro/apps/customers/list.html"
                                            class="btn btn-light-primary">Add New Customer</a>
                                    </div>

                                    <div class="mb-10">
                                        <a
                                            href="#"
                                            class="btn btn-light-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_customer_search">Change Customer</a>
                                    </div>

                                    <div
                                        class="notice d-flex bg-light-primary rounded border-primary border border-dashed rounded-3 p-6">
                                        <div
                                            class="d-flex flex-stack flex-grow-1">
                                            <div class="fw-semibold">
                                                <h4
                                                    class="text-gray-900 fw-bold">
                                                    This is a very important
                                                    privacy notice!
                                                </h4>

                                                <div class="fs-6 text-gray-700">
                                                    Writing headlines for blog
                                                    posts is much science and
                                                    probably cool audience.
                                                    <a href="#" class="fw-bold">Learn more</a>.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">Products</h2>
                                    </div>

                                    <div class="card-toolbar">
                                        <button
                                            type="button"
                                            class="btn btn-light-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_add_product">
                                            Add Product
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="table-responsive">
                                        <div
                                            id="kt_subscription_products_table_wrapper"
                                            class="dt-container dt-bootstrap5 dt-empty-footer">
                                            <div id="" class="table-responsive">
                                                <table
                                                    class="table align-middle table-row-dashed fs-6 fw-semibold gy-4 dataTable"
                                                    id="kt_subscription_products_table"
                                                    style="width: 100%">
                                                    <colgroup>
                                                        <col
                                                            data-dt-column="0"
                                                            style="
                                                                width: 345.961px;
                                                            "
                                                        />
                                                        <col
                                                            data-dt-column="1"
                                                            style="
                                                                width: 115.32px;
                                                            "
                                                        />
                                                        <col
                                                            data-dt-column="2"
                                                            style="
                                                                width: 172.977px;
                                                            "
                                                        />
                                                        <col
                                                            data-dt-column="3"
                                                            style="
                                                                width: 80.7422px;
                                                            "
                                                        />
                                                    </colgroup>
                                                    <thead>
                                                        <tr
                                                            class="text-start text-muted fw-bold fs-7 text-uppercase gs-0"
                                                            role="row">
                                                            <th
                                                                class="min-w-300px dt-orderable-none"
                                                                data-dt-column="0"
                                                                rowspan="1"
                                                                colspan="1">
                                                                <span
                                                                    class="dt-column-title">Product</span><span
                                                                    class="dt-column-order"></span>
                                                            </th>
                                                            <th
                                                                class="min-w-100px dt-orderable-none dt-type-numeric"
                                                                data-dt-column="1"
                                                                rowspan="1"
                                                                colspan="1">
                                                                <span
                                                                    class="dt-column-title">Qty</span><span
                                                                    class="dt-column-order"></span>
                                                            </th>
                                                            <th
                                                                class="min-w-150px dt-orderable-none"
                                                                data-dt-column="2"
                                                                rowspan="1"
                                                                colspan="1">
                                                                <span
                                                                    class="dt-column-title">Total</span><span
                                                                    class="dt-column-order"></span>
                                                            </th>
                                                            <th
                                                                class="min-w-70px text-end dt-orderable-none"
                                                                data-dt-column="3"
                                                                rowspan="1"
                                                                colspan="1">
                                                                <span
                                                                    class="dt-column-title">Remove</span><span
                                                                    class="dt-column-order"></span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody
                                                        class="text-gray-600">
                                                        <tr>
                                                            <td>
                                                                Beginner Plan
                                                            </td>
                                                            <td
                                                                class="dt-type-numeric">
                                                                1
                                                            </td>
                                                            <td>
                                                                149.99 / Month
                                                            </td>
                                                            <td
                                                                class="text-end">
                                                                <a
                                                                    href="#"
                                                                    class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                    data-bs-toggle="tooltip"
                                                                    data-kt-action="product_remove"
                                                                    aria-label="Delete"
                                                                    data-bs-original-title="Delete"
                                                                    data-kt-initialized="1">
                                                                    <i
                                                                        class="ki-duotone ki-trash fs-3"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span><span
                                                                            class="path4"></span><span
                                                                            class="path5"></span></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Pro Plan</td>
                                                            <td
                                                                class="dt-type-numeric">
                                                                1
                                                            </td>
                                                            <td>
                                                                499.99 / Month
                                                            </td>
                                                            <td
                                                                class="text-end">
                                                                <a
                                                                    href="#"
                                                                    class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                    data-bs-toggle="tooltip"
                                                                    data-kt-action="product_remove"
                                                                    aria-label="Delete"
                                                                    data-bs-original-title="Delete"
                                                                    data-kt-initialized="1">
                                                                    <i
                                                                        class="ki-duotone ki-trash fs-3"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span><span
                                                                            class="path4"></span><span
                                                                            class="path5"></span></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Team Plan</td>
                                                            <td
                                                                class="dt-type-numeric">
                                                                1
                                                            </td>
                                                            <td>
                                                                999.99 / Month
                                                            </td>
                                                            <td
                                                                class="text-end">
                                                                <a
                                                                    href="#"
                                                                    class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                    data-bs-toggle="tooltip"
                                                                    data-kt-action="product_remove"
                                                                    aria-label="Delete"
                                                                    data-bs-original-title="Delete"
                                                                    data-kt-initialized="1">
                                                                    <i
                                                                        class="ki-duotone ki-trash fs-3"><span
                                                                            class="path1"></span><span
                                                                            class="path2"></span><span
                                                                            class="path3"></span><span
                                                                            class="path4"></span><span
                                                                            class="path5"></span></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot></tfoot>
                                                </table>
                                            </div>
                                            <div id="" class="row">
                                                <div
                                                    id=""
                                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                <div
                                                    id=""
                                                    class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="card card-flush pt-3 mb-5 mb-lg-10"
                                data-kt-subscriptions-form="pricing">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">Payment Method</h2>
                                    </div>

                                    <div class="card-toolbar">
                                        <a
                                            href="#"
                                            class="btn btn-light-primary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_new_card">
                                            New Method
                                        </a>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div id="kt_create_new_payment_method">
                                        <div class="py-1">
                                            <div
                                                class="py-3 d-flex flex-stack flex-wrap">
                                                <div
                                                    class="d-flex align-items-center collapsible toggle"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#kt_create_new_payment_method_1">
                                                    <div
                                                        class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span></i>
                                                        <i
                                                            class="ki-duotone ki-plus-square toggle-off fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span
                                                                class="path3"></span></i>
                                                    </div>

                                                    <img
                                                        src="/saul-html-pro/assets/media/svg/card-logos/mastercard.svg"
                                                        class="w-40px me-3"
                                                        alt=""
                                                    />

                                                    <div class="me-3">
                                                        <div
                                                            class="d-flex align-items-center fw-bold">
                                                            Mastercard
                                                            <div
                                                                class="badge badge-light-primary ms-5">
                                                                Primary
                                                            </div>
                                                        </div>
                                                        <div class="text-muted">
                                                            Expires Dec 2024
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex my-3 ms-9">
                                                    <label
                                                        class="form-check form-check-custom form-check-solid me-5">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="payment_method"
                                                            checked="checked"
                                                        />
                                                    </label>
                                                </div>
                                            </div>

                                            <div
                                                id="kt_create_new_payment_method_1"
                                                class="collapse show fs-6 ps-10">
                                                <div
                                                    class="d-flex flex-wrap py-5">
                                                    <div
                                                        class="flex-equal me-5">
                                                        <table
                                                            class="table table-flush fw-semibold gy-1">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Name
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Emma
                                                                        Smith
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Number
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        ****
                                                                        1183
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Expires
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        12/2024
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Type
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Mastercard
                                                                        credit
                                                                        card
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Issuer
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        VICBANK
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        ID
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        id_4325df90sdf8
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="flex-equal">
                                                        <table
                                                            class="table table-flush fw-semibold gy-1">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Billing
                                                                        address
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        AU
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Phone
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        No phone
                                                                        provided
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Email
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        <a
                                                                            href="#"
                                                                            class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Origin
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Australia
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="/saul-html-pro/assets/media/flags/australia.svg"
                                                                            />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        CVC
                                                                        check
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Passed
                                                                        <i
                                                                            class="ki-duotone ki-check-circle fs-2 text-success"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="separator separator-dashed"></div>
                                        <div class="py-1">
                                            <div
                                                class="py-3 d-flex flex-stack flex-wrap">
                                                <div
                                                    class="d-flex align-items-center collapsible toggle collapsed"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#kt_create_new_payment_method_2">
                                                    <div
                                                        class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span></i>
                                                        <i
                                                            class="ki-duotone ki-plus-square toggle-off fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span
                                                                class="path3"></span></i>
                                                    </div>

                                                    <img
                                                        src="/saul-html-pro/assets/media/svg/card-logos/visa.svg"
                                                        class="w-40px me-3"
                                                        alt=""
                                                    />

                                                    <div class="me-3">
                                                        <div
                                                            class="d-flex align-items-center fw-bold">
                                                            Visa
                                                        </div>
                                                        <div class="text-muted">
                                                            Expires Feb 2022
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex my-3 ms-9">
                                                    <label
                                                        class="form-check form-check-custom form-check-solid me-5">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="payment_method"
                                                        />
                                                    </label>
                                                </div>
                                            </div>

                                            <div
                                                id="kt_create_new_payment_method_2"
                                                class="collapse fs-6 ps-10">
                                                <div
                                                    class="d-flex flex-wrap py-5">
                                                    <div
                                                        class="flex-equal me-5">
                                                        <table
                                                            class="table table-flush fw-semibold gy-1">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Name
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Melody
                                                                        Macy
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Number
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        ****
                                                                        2523
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Expires
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        02/2022
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Type
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Visa
                                                                        credit
                                                                        card
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Issuer
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        ENBANK
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        ID
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        id_w2r84jdy723
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="flex-equal">
                                                        <table
                                                            class="table table-flush fw-semibold gy-1">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Billing
                                                                        address
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        UK
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Phone
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        No phone
                                                                        provided
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Email
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        <a
                                                                            href="#"
                                                                            class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Origin
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        United
                                                                        Kingdom
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="/saul-html-pro/assets/media/flags/united-kingdom.svg"
                                                                            />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        CVC
                                                                        check
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Passed
                                                                        <i
                                                                            class="ki-duotone ki-check fs-2 text-success"></i>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="separator separator-dashed"></div>
                                        <div class="py-1">
                                            <div
                                                class="py-3 d-flex flex-stack flex-wrap">
                                                <div
                                                    class="d-flex align-items-center collapsible toggle collapsed"
                                                    data-bs-toggle="collapse"
                                                    data-bs-target="#kt_create_new_payment_method_3">
                                                    <div
                                                        class="btn btn-sm btn-icon btn-active-color-primary ms-n3 me-2">
                                                        <i
                                                            class="ki-duotone ki-minus-square toggle-on text-primary fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span></i>
                                                        <i
                                                            class="ki-duotone ki-plus-square toggle-off fs-2"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span
                                                                class="path3"></span></i>
                                                    </div>

                                                    <img
                                                        src="/saul-html-pro/assets/media/svg/card-logos/american-express.svg"
                                                        class="w-40px me-3"
                                                        alt=""
                                                    />

                                                    <div class="me-3">
                                                        <div
                                                            class="d-flex align-items-center fw-bold">
                                                            American Express
                                                            <div
                                                                class="badge badge-light-danger ms-5">
                                                                Expired
                                                            </div>
                                                        </div>
                                                        <div class="text-muted">
                                                            Expires Aug 2021
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex my-3 ms-9">
                                                    <label
                                                        class="form-check form-check-custom form-check-solid me-5">
                                                        <input
                                                            class="form-check-input"
                                                            type="radio"
                                                            name="payment_method"
                                                        />
                                                    </label>
                                                </div>
                                            </div>

                                            <div
                                                id="kt_create_new_payment_method_3"
                                                class="collapse fs-6 ps-10">
                                                <div
                                                    class="d-flex flex-wrap py-5">
                                                    <div
                                                        class="flex-equal me-5">
                                                        <table
                                                            class="table table-flush fw-semibold gy-1">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Name
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Max
                                                                        Smith
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Number
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        ****
                                                                        8323
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Expires
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        08/2021
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Type
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        American
                                                                        express
                                                                        credit
                                                                        card
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Issuer
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        USABANK
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        ID
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        id_89457jcje63
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="flex-equal">
                                                        <table
                                                            class="table table-flush fw-semibold gy-1">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Billing
                                                                        address
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        US
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Phone
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        No phone
                                                                        provided
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Email
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        <a
                                                                            href="#"
                                                                            class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        Origin
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        United
                                                                        States
                                                                        of
                                                                        America
                                                                        <div
                                                                            class="symbol symbol-20px symbol-circle ms-2">
                                                                            <img
                                                                                src="/saul-html-pro/assets/media/flags/united-states.svg"
                                                                            />
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="text-muted min-w-125px w-125px">
                                                                        CVC
                                                                        check
                                                                    </td>
                                                                    <td
                                                                        class="text-gray-800">
                                                                        Failed
                                                                        <i
                                                                            class="ki-duotone ki-cross fs-2 text-danger"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span></i>
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
                            <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2 class="fw-bold">
                                            Advanced Options
                                        </h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div
                                        class="d-flex flex-column mb-15 fv-row">
                                        <div
                                            class="fs-5 fw-bold form-label mb-3">
                                            Custom fields

                                            <span
                                                class="ms-2 cursor-pointer"
                                                data-bs-toggle="popover"
                                                data-bs-trigger="hover"
                                                data-bs-html="true"
                                                data-bs-content="Add custom fields to the billing invoice."
                                                data-kt-initialized="1">
                                                <i
                                                    class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </div>

                                        <div class="table-responsive">
                                            <div
                                                id="kt_create_new_custom_fields_wrapper"
                                                class="dt-container dt-bootstrap5 dt-empty-footer">
                                                <div
                                                    id=""
                                                    class="table-responsive">
                                                    <table
                                                        id="kt_create_new_custom_fields"
                                                        class="table align-middle table-row-dashed fw-semibold fs-6 gy-5 dataTable"
                                                        style="width: 100%">
                                                        <colgroup>
                                                            <col
                                                                data-dt-column="0"
                                                                style="
                                                                    width: 304.453px;
                                                                "
                                                            />
                                                            <col
                                                                data-dt-column="1"
                                                                style="
                                                                    width: 318.836px;
                                                                "
                                                            />
                                                            <col
                                                                data-dt-column="2"
                                                                style="
                                                                    width: 91.7109px;
                                                                "
                                                            />
                                                        </colgroup>
                                                        <thead>
                                                            <tr
                                                                class="text-start text-muted fw-bold fs-7 text-uppercase gs-0"
                                                                role="row">
                                                                <th
                                                                    class="pt-0 dt-orderable-none"
                                                                    data-dt-column="0"
                                                                    rowspan="1"
                                                                    colspan="1">
                                                                    <span
                                                                        class="dt-column-title">Field
                                                                        Name</span><span
                                                                        class="dt-column-order"></span>
                                                                </th>
                                                                <th
                                                                    class="pt-0 dt-orderable-none"
                                                                    data-dt-column="1"
                                                                    rowspan="1"
                                                                    colspan="1">
                                                                    <span
                                                                        class="dt-column-title">Field
                                                                        Value</span><span
                                                                        class="dt-column-order"></span>
                                                                </th>
                                                                <th
                                                                    class="pt-0 text-end dt-orderable-none"
                                                                    data-dt-column="2"
                                                                    rowspan="1"
                                                                    colspan="1">
                                                                    <span
                                                                        class="dt-column-title">Remove</span><span
                                                                        class="dt-column-order"></span>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-solid"
                                                                        name="null-0"
                                                                        value=""
                                                                    />
                                                                </td>
                                                                <td>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control form-control-solid"
                                                                        name="null-0"
                                                                        value=""
                                                                    />
                                                                </td>
                                                                <td
                                                                    class="text-end">
                                                                    <button
                                                                        type="button"
                                                                        class="btn btn-icon btn-flex btn-active-light-primary w-30px h-30px me-3"
                                                                        data-kt-action="field_remove">
                                                                        <i
                                                                            class="ki-duotone ki-trash fs-3"><span
                                                                                class="path1"></span><span
                                                                                class="path2"></span><span
                                                                                class="path3"></span><span
                                                                                class="path4"></span><span
                                                                                class="path5"></span></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tfoot></tfoot>
                                                    </table>
                                                </div>
                                                <div id="" class="row">
                                                    <div
                                                        id=""
                                                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar"></div>
                                                    <div
                                                        id=""
                                                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <button
                                            type="button"
                                            class="btn btn-light-primary me-auto"
                                            id="kt_create_new_custom_fields_add">
                                            Add custom field
                                        </button>
                                    </div>

                                    <div
                                        class="d-flex flex-column mb-10 fv-row">
                                        <div
                                            class="fs-5 fw-bold form-label mb-3">
                                            Invoice footer

                                            <span
                                                class="ms-2 cursor-pointer"
                                                data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-html="true"
                                                data-bs-content="Add an addition invoice footer note."
                                                data-kt-initialized="1">
                                                <i
                                                    class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </div>

                                        <textarea
                                            class="form-control form-control-solid rounded-3"
                                            rows="4"></textarea>
                                    </div>

                                    <div
                                        class="d-flex flex-column mb-5 fv-row rounded-3 p-7 border border-dashed border-gray-300">
                                        <div
                                            class="fs-5 fw-bold form-label mb-3">
                                            Usage treshold

                                            <span
                                                class="ms-2 cursor-pointer"
                                                data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-html="true"
                                                data-bs-delay-hide="1000"
                                                data-bs-content="Thresholds help manage risk by limiting the unpaid usage balance a customer can accrue. Thresholds only measure and bill for metered usage (including discounts but excluding tax). <a href='#'>Learn more</a>."
                                                data-kt-initialized="1">
                                                <i
                                                    class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </div>

                                        <label
                                            class="form-check form-check-custom form-check-solid">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                checked=""
                                                value="1"
                                            />
                                            <span
                                                class="form-check-label text-gray-600">
                                                Bill immediately if usage
                                                treshold reaches 80%.
                                            </span>
                                        </label>
                                    </div>

                                    <div
                                        class="d-flex flex-column fv-row rounded-3 p-7 border border-dashed border-gray-300">
                                        <div
                                            class="fs-5 fw-bold form-label mb-3">
                                            Pro-rate billing

                                            <span
                                                class="ms-2 cursor-pointer"
                                                data-bs-toggle="popover"
                                                data-bs-trigger="hover focus"
                                                data-bs-html="true"
                                                data-bs-delay-hide="1000"
                                                data-bs-content="Pro-rated billing dynamically calculates the remainder amount leftover per billing cycle that is owed. <a href='#'>Learn more</a>."
                                                data-kt-initialized="1">
                                                <i
                                                    class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        </div>

                                        <label
                                            class="form-check form-check-custom form-check-solid">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                value="1"
                                            />
                                            <span
                                                class="form-check-label text-gray-600">
                                                Allow pro-rated billing when
                                                treshold usage is paid before
                                                end of billing cycle.
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div
                        class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
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
                            style="">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Summary</h2>
                                </div>
                            </div>

                            <div class="card-body pt-0 fs-6">
                                <div class="mb-7">
                                    <h5 class="mb-3">Customer details</h5>

                                    <div class="d-flex align-items-center mb-1">
                                        <a
                                            href="/saul-html-pro/apps/customers/view.html"
                                            class="fw-bold text-gray-800 text-hover-primary me-2">
                                            Sean Bean
                                        </a>

                                        <span class="badge badge-light-success">Active</span>
                                    </div>

                                    <a
                                        href="#"
                                        class="fw-semibold text-gray-600 text-hover-primary">sean@dellito.com</a>
                                </div>

                                <div
                                    class="separator separator-dashed mb-7"></div>

                                <div class="mb-7">
                                    <h5 class="mb-3">Product details</h5>

                                    <div class="mb-0">
                                        <span
                                            class="badge badge-light-info me-2">Basic Bundle</span>

                                        <span class="fw-semibold text-gray-600">$149.99 / Year</span>
                                    </div>
                                </div>

                                <div
                                    class="separator separator-dashed mb-7"></div>

                                <div class="mb-10">
                                    <h5 class="mb-3">Payment Details</h5>

                                    <div class="mb-0">
                                        <div
                                            class="fw-semibold text-gray-600 d-flex align-items-center">
                                            Mastercard

                                            <img
                                                src="/saul-html-pro/assets/media/svg/card-logos/mastercard.svg"
                                                class="w-35px ms-2"
                                                alt=""
                                            />
                                        </div>

                                        <div class="fw-semibold text-gray-600">
                                            Expires Dec 2024
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                        id="kt_subscriptions_create_button">
                                        <span class="indicator-label">
                                            Create Subscription</span>

                                        <span class="indicator-progress">
                                            Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="modal fade"
                    id="kt_modal_customer_search"
                    tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                            <div
                                class="modal-header pb-0 border-0 justify-content-end">
                                <div
                                    class="btn btn-icon btn-sm btn-active-icon-primary"
                                    data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                            </div>

                            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15" >
                                <div class="text-center mb-12">
                                    <h1 class="fw-bold mb-3">
                                        Search Customers
                                    </h1>
                                    <div class="text-gray-500 fw-semibold fs-5">
                                        Add a customer to a subscription
                                    </div>
                                </div>

                                <div
                                    id="kt_modal_customer_search_handler"
                                    data-kt-search-keypress="true"
                                    data-kt-search-min-length="2"
                                    data-kt-search-enter="enter"
                                    data-kt-search-layout="inline"
                                    data-kt-search="true">
                                    <form
                                        data-kt-search-element="form"
                                        class="w-100 position-relative mb-5"
                                        autocomplete="off">
                                        <input type="hidden" />

                                        <i
                                            class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span class="path1"></span><span class="path2"></span></i>

                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-solid px-15"
                                            name="search"
                                            value=""
                                            placeholder="Search by username, full name or email..."
                                            data-kt-search-element="input"
                                        />

                                        <span
                                            class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                            data-kt-search-element="spinner">
                                            <span
                                                class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
                                        </span>

                                        <span
                                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                            data-kt-search-element="clear">
                                            <i
                                                class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span class="path1"></span><span class="path2"></span></i>
                                        </span>
                                    </form>

                                    <div class="py-5">
                                        <div
                                            data-kt-search-element="suggestions">
                                            <div class="text-center px-4 pt-10">
                                                <img
                                                    src="/saul-html-pro/assets/media/illustrations/sketchy-1/4.png"
                                                    alt=""
                                                    class="mw-100 mh-200px"
                                                />
                                            </div>
                                        </div>

                                        <div
                                            data-kt-search-element="results"
                                            class="d-none">
                                            <div
                                                class="mh-300px scroll-y me-n5 pe-5">
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <img
                                                            alt="Pic"
                                                            src="/saul-html-pro/assets/media/avatars/300-6.jpg"
                                                        />
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                                        <span
                                                            class="badge badge-light">Art Director</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <span
                                                            class="symbol-label bg-light-danger text-danger fw-semibold">
                                                            M
                                                        </span>
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                                        <span
                                                            class="badge badge-light">Marketing
                                                            Analytic</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <img
                                                            alt="Pic"
                                                            src="/saul-html-pro/assets/media/avatars/300-1.jpg"
                                                        />
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Max Smith</span>
                                                        <span
                                                            class="badge badge-light">Software
                                                            Enginer</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <img
                                                            alt="Pic"
                                                            src="/saul-html-pro/assets/media/avatars/300-5.jpg"
                                                        />
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                                        <span
                                                            class="badge badge-light">Web Developer</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <img
                                                            alt="Pic"
                                                            src="/saul-html-pro/assets/media/avatars/300-25.jpg"
                                                        />
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                                        <span
                                                            class="badge badge-light">UI/UX
                                                            Designer</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <span
                                                            class="symbol-label bg-light-warning text-warning fw-semibold">
                                                            C
                                                        </span>
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Mikaela
                                                            Collins</span>
                                                        <span
                                                            class="badge badge-light">Head Of
                                                            Marketing</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <img
                                                            alt="Pic"
                                                            src="/saul-html-pro/assets/media/avatars/300-9.jpg"
                                                        />
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Francis
                                                            Mitcham</span>
                                                        <span
                                                            class="badge badge-light">Software
                                                            Arcitect</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <span
                                                            class="symbol-label bg-light-danger text-danger fw-semibold">
                                                            O
                                                        </span>
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Olivia Wild</span>
                                                        <span
                                                            class="badge badge-light">System Admin</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <span
                                                            class="symbol-label bg-light-primary text-primary fw-semibold">
                                                            N
                                                        </span>
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Neil Owen</span>
                                                        <span
                                                            class="badge badge-light">Account
                                                            Manager</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-center p-3 rounded-3 border-hover border border-dashed border-gray-300 cursor-pointer mb-1"
                                                    data-kt-search-element="customer">
                                                    <div
                                                        class="symbol symbol-35px symbol-circle me-5">
                                                        <img
                                                            alt="Pic"
                                                            src="/saul-html-pro/assets/media/avatars/300-23.jpg"
                                                        />
                                                    </div>

                                                    <div class="fw-semibold">
                                                        <span
                                                            class="fs-6 text-gray-800 me-2">Dan Wilson</span>
                                                        <span
                                                            class="badge badge-light">Web Desinger</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            data-kt-search-element="empty"
                                            class="text-center d-none">
                                            <div class="fw-semibold py-0 mb-10">
                                                <div
                                                    class="text-gray-600 fs-3 mb-2">
                                                    No users found
                                                </div>

                                                <div class="text-gray-500 fs-6">
                                                    Try to search by username,
                                                    full name or email...
                                                </div>
                                            </div>

                                            <div class="text-center px-4">
                                                <img
                                                    src="/saul-html-pro/assets/media/illustrations/sketchy-1/9.png"
                                                    alt="user"
                                                    class="mw-100 mh-200px"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="modal fade"
                    id="kt_modal_add_product"
                    tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                            <form
                                class="form"
                                action="#"
                                id="kt_modal_add_product_form">
                                <div class="modal-header">
                                    <h2 class="fw-bold">Add a Product</h2>

                                    <div
                                        class="btn btn-icon btn-sm btn-active-icon-primary"
                                        data-bs-dismiss="modal">
                                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                    </div>
                                </div>

                                <div class="modal-body py-10 px-lg-17">
                                    <h3 class="mb-7">
                                        <span class="fw-bold required">Select Subscription</span>

                                        <span
                                            class="ms-1"
                                            data-bs-toggle="tooltip"
                                            aria-label="Please select a subscription"
                                            data-bs-original-title="Please select a subscription"
                                            data-kt-initialized="1">
                                            <i
                                                class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        </span>
                                    </h3>

                                    <div class="scroll-y mh-300px me-n7 pe-7">
                                        <div class="fv-row">
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        checked="checked"
                                                        data-kt-product-name="Basic"
                                                        data-kt-product-price="15.99"
                                                        data-kt-product-frequency="Month"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Basic</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Basic
                                                        subscription</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $15.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Month</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Basic Bundle"
                                                        data-kt-product-price="149.99"
                                                        data-kt-product-frequency="Year"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Basic Bundle</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Basic yearly
                                                        bundle</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $149.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Year</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Teams"
                                                        data-kt-product-price="20.99"
                                                        data-kt-product-frequency="Month"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Teams</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Teams
                                                        subscription</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $20.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Month</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Teams Bundle"
                                                        data-kt-product-price="199.99"
                                                        data-kt-product-frequency="Year"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Teams Bundle</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Teams yearly
                                                        bundle</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $199.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Year</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Corporate"
                                                        data-kt-product-price="224.99"
                                                        data-kt-product-frequency="Month"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Corporate</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Corporate
                                                        subscription</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $224.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Month</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Corporate Bundle"
                                                        data-kt-product-price="1249.99"
                                                        data-kt-product-frequency="Year"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Corporate Bundle</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Corporate yearly
                                                        bundle</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $1249.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Year</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Enterprise"
                                                        data-kt-product-price="224.99"
                                                        data-kt-product-frequency="Month"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Enterprise</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Enterprise
                                                        subscription</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $224.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Month</span>
                                                </span>
                                            </label>
                                            <label
                                                class="d-flex align-items-center mb-5">
                                                <span
                                                    class="form-check form-check-custom form-check-solid me-5">
                                                    <input
                                                        class="form-check-input"
                                                        type="radio"
                                                        name="product"
                                                        data-kt-product-name="Enterprise Bundle"
                                                        data-kt-product-price="2249.99"
                                                        data-kt-product-frequency="Year"
                                                    />
                                                </span>

                                                <span
                                                    class="d-flex flex-column me-3">
                                                    <span class="fw-bold">Enterprise Bundle</span>
                                                    <span
                                                        class="text-gray-500 fw-semibold fs-6">Enterprise yearly
                                                        bundle</span>
                                                </span>

                                                <span class="fw-bold ms-auto">
                                                    $2249.99 /<span
                                                        class="text-gray-500 fs-6 fw-semibold">Year</span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer flex-center">
                                    <button
                                        type="reset"
                                        id="kt_modal_add_product_cancel"
                                        class="btn btn-light me-3">
                                        Discard
                                    </button>

                                    <button
                                        type="button"
                                        id="kt_modal_add_product_submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div
                    class="modal fade"
                    id="kt_modal_new_card"
                    tabindex="-1"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Add New Card</h2>

                                <div
                                    class="btn btn-sm btn-icon btn-active-color-primary"
                                    data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </div>
                            </div>

                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <form
                                    id="kt_modal_new_card_form"
                                    class="form fv-plugins-bootstrap5 fv-plugins-framework"
                                    action="#">
                                    <div
                                        class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label
                                            class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Name On Card</span>

                                            <span
                                                class="ms-1"
                                                data-bs-toggle="tooltip"
                                                aria-label="Specify a card holder's name"
                                                data-bs-original-title="Specify a card holder's name"
                                                data-kt-initialized="1">
                                                <i
                                                    class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i></span>
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control form-control-solid"
                                            placeholder=""
                                            name="card_name"
                                            value="Max Doe"
                                        />
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>

                                    <div
                                        class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                                        <label
                                            class="required fs-6 fw-semibold form-label mb-2">Card Number</label>

                                        <div class="position-relative">
                                            <input
                                                type="text"
                                                class="form-control form-control-solid"
                                                placeholder="Enter card number"
                                                name="card_number"
                                                value="4111 1111 1111 1111"
                                            />

                                            <div
                                                class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                <img
                                                    src="/saul-html-pro/assets/media/svg/card-logos/visa.svg"
                                                    alt=""
                                                    class="h-25px"
                                                />
                                                <img
                                                    src="/saul-html-pro/assets/media/svg/card-logos/mastercard.svg"
                                                    alt=""
                                                    class="h-25px"
                                                />
                                                <img
                                                    src="/saul-html-pro/assets/media/svg/card-logos/american-express.svg"
                                                    alt=""
                                                    class="h-25px"
                                                />
                                            </div>
                                        </div>
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                    </div>

                                    <div class="row mb-10">
                                        <div class="col-md-8 fv-row">
                                            <label
                                                class="required fs-6 fw-semibold form-label mb-2">Expiration Date</label>

                                            <div
                                                class="row fv-row fv-plugins-icon-container">
                                                <div class="col-6">
                                                    <select
                                                        name="card_expiry_month"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-hide-search="true"
                                                        data-placeholder="Month"
                                                        data-select2-id="select2-data-7-8tkr"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1">
                                                        <option
                                                            data-select2-id="select2-data-9-45um"></option>
                                                        <option value="1">
                                                            1
                                                        </option>
                                                        <option value="2">
                                                            2
                                                        </option>
                                                        <option value="3">
                                                            3
                                                        </option>
                                                        <option value="4">
                                                            4
                                                        </option>
                                                        <option value="5">
                                                            5
                                                        </option>
                                                        <option value="6">
                                                            6
                                                        </option>
                                                        <option value="7">
                                                            7
                                                        </option>
                                                        <option value="8">
                                                            8
                                                        </option>
                                                        <option value="9">
                                                            9
                                                        </option>
                                                        <option value="10">
                                                            10
                                                        </option>
                                                        <option value="11">
                                                            11
                                                        </option>
                                                        <option value="12">
                                                            12
                                                        </option></select><span
                                                        class="select2 select2-container select2-container--bootstrap5"
                                                        dir="ltr"
                                                        data-select2-id="select2-data-8-et3l"
                                                        style="width: 100%"><span class="selection"><span
                                                                class="select2-selection select2-selection--single form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-card_expiry_month-3u-container"
                                                                aria-controls="select2-card_expiry_month-3u-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-card_expiry_month-3u-container"
                                                                    role="textbox"
                                                                    aria-readonly="true"
                                                                    title="Month"><span
                                                                        class="select2-selection__placeholder">Month</span></span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>

                                                <div class="col-6">
                                                    <select
                                                        name="card_expiry_year"
                                                        class="form-select form-select-solid select2-hidden-accessible"
                                                        data-control="select2"
                                                        data-hide-search="true"
                                                        data-placeholder="Year"
                                                        data-select2-id="select2-data-10-ejhq"
                                                        tabindex="-1"
                                                        aria-hidden="true"
                                                        data-kt-initialized="1">
                                                        <option
                                                            data-select2-id="select2-data-12-zxwx"></option>
                                                        <option value="2024">
                                                            2024
                                                        </option>
                                                        <option value="2025">
                                                            2025
                                                        </option>
                                                        <option value="2026">
                                                            2026
                                                        </option>
                                                        <option value="2027">
                                                            2027
                                                        </option>
                                                        <option value="2028">
                                                            2028
                                                        </option>
                                                        <option value="2029">
                                                            2029
                                                        </option>
                                                        <option value="2030">
                                                            2030
                                                        </option>
                                                        <option value="2031">
                                                            2031
                                                        </option>
                                                        <option value="2032">
                                                            2032
                                                        </option>
                                                        <option value="2033">
                                                            2033
                                                        </option>
                                                        <option value="2034">
                                                            2034
                                                        </option></select><span
                                                        class="select2 select2-container select2-container--bootstrap5"
                                                        dir="ltr"
                                                        data-select2-id="select2-data-11-fnqf"
                                                        style="width: 100%"><span class="selection"><span
                                                                class="select2-selection select2-selection--single form-select form-select-solid"
                                                                role="combobox"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                tabindex="0"
                                                                aria-disabled="false"
                                                                aria-labelledby="select2-card_expiry_year-0d-container"
                                                                aria-controls="select2-card_expiry_year-0d-container"><span
                                                                    class="select2-selection__rendered"
                                                                    id="select2-card_expiry_year-0d-container"
                                                                    role="textbox"
                                                                    aria-readonly="true"
                                                                    title="Year"><span
                                                                        class="select2-selection__placeholder">Year</span></span><span
                                                                    class="select2-selection__arrow"
                                                                    role="presentation"><b
                                                                        role="presentation"></b></span></span></span><span
                                                            class="dropdown-wrapper"
                                                            aria-hidden="true"></span></span>
                                                    <div
                                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="col-md-4 fv-row fv-plugins-icon-container">
                                            <label
                                                class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">CVV</span>

                                                <span
                                                    class="ms-1"
                                                    data-bs-toggle="tooltip"
                                                    aria-label="Enter a card CVV code"
                                                    data-bs-original-title="Enter a card CVV code"
                                                    data-kt-initialized="1">
                                                    <i
                                                        class="ki-duotone ki-information-5 text-gray-500 fs-6"><span
                                                            class="path1"></span><span
                                                            class="path2"></span><span
                                                            class="path3"></span></i></span>
                                            </label>

                                            <div class="position-relative">
                                                <input
                                                    type="text"
                                                    class="form-control form-control-solid"
                                                    minlength="3"
                                                    maxlength="4"
                                                    placeholder="CVV"
                                                    name="card_cvv"
                                                />

                                                <div
                                                    class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                    <i
                                                        class="ki-duotone ki-credit-cart fs-2hx"><span
                                                            class="path1"></span><span
                                                            class="path2"></span></i>
                                                </div>
                                            </div>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-stack">
                                        <div class="me-5">
                                            <label
                                                class="fs-6 fw-semibold form-label">Save Card for further
                                                billing?</label>
                                            <div
                                                class="fs-7 fw-semibold text-muted">
                                                If you need more info, please
                                                check budget planning
                                            </div>
                                        </div>

                                        <label
                                            class="form-check form-switch form-check-custom form-check-solid">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                value="1"
                                                checked="checked"
                                            />
                                            <span
                                                class="form-check-label fw-semibold text-muted">
                                                Save Card
                                            </span>
                                        </label>
                                    </div>

                                    <div class="text-center pt-15">
                                        <button
                                            type="reset"
                                            id="kt_modal_new_card_cancel"
                                            class="btn btn-light me-3">
                                            Discard
                                        </button>

                                        <button
                                            type="submit"
                                            id="kt_modal_new_card_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">
                                                Submit
                                            </span>
                                            <span class="indicator-progress">
                                                Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        id="kt_app_footer"
        class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3"
    >
        <div class="text-gray-900 order-2 order-md-1">
            <span class="text-muted fw-semibold me-1">2024©</span>
            <a
                href="https://keenthemes.com"
                target="_blank"
                class="text-gray-800 text-hover-primary">Keenthemes</a>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('assets/js/custom/advanced.js') }}"></script>
@endsection
