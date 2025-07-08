@extends('admin.master')
@section('title', __('messages.court_list'))
@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/carousel.css') }}" rel="stylesheet" type="text/css" />
<style>
    #image-upload-container {
        max-height: 350px;
        overflow-y: auto;
        padding-right: 15px; /* Adjust as needed */
    }
</style>
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
                                {{ __('messages.court_list') }}
                            </li>
                        </ul>

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
                 <x-filter-buttons :datas="$datas" />
                <div class="card card-flush">
                    <div class="card-body pt-0">
                        <x-admin.table
                            :items="$datas['courts']"
                            :imageKey="'images.0.file_path'"
                            :columns="[
                                'title' => 'messages.title',
                                'court_address.city.title' => 'messages.city',
                                'court_address.district.title' => 'messages.district',
                                'created_at' => 'messages.created_at',
                            ]"
                            :actions="[
                                ['label' => 'messages.view', 'url' => fn($item) => route('admin.courts.show', ['court' => $item['id']])],
                                ['label' => 'messages.edit', 'url' => fn($item) => route('admin.courts.edit', ['court' => $item['id']])],
                                ['label' => 'messages.delete', 'url' => fn($item) => route('admin.courts.destroy', ['court' => $item['id']]), 'method' => 'DELETE'],
                            ]"
                        />

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.admin.modals.delete-confirmation-modal')
@include('components.admin.court.modals.filter-modal')
@include('components.modals.court-images-modal')
@endsection

@section('page-scripts')

@include('components.admin.scripts.delete-item-scripts')
@include('components.admin.scripts.modal-slider-scripts')
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
@include('components.scripts.filter-modal-scripts')
@endsection
