@extends('layouts.no-sidebar')
@section('title', __('messages.team_create'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
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
                                Projects
                            </li>
                        </ul>

                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.court_list') }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-6 mb-xl-9">
                    <div class="card-body pt-9 pb-0">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6 active" href="/apps/projects/project.html"> {{ __('messages.court_list') }} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/targets.html"> {{ __('messages.teams') }} </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-active-primary py-5 me-6" href="/apps/projects/settings.html"> {{ __('messages.details') }} </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row gx-6 gx-xl-9">
                    <div class="col-lg-6">
                        <div class="card card-flush h-lg-100">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        @include('components.pagination.default', ['data' => $datas['courts']])
                        <div class="col-md-6 pe-lg-10" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                            @include('components.home.card-list')
                        </div>
                        <div class="col-md-6 ps-lg-10">
                            @include('components.home.map')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-scripts')
@include('components.scripts.pagination-scripts')

@endsection
