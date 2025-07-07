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
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <form method="GET" action="{{ route('admin.courts.index') }}" class="row mb-5 g-3">
                                <div class="col-md-3">
                                    <select name="sport_type_id" class="form-select">
                                        <option value="">{{ __('messages.select_sport_type') }}</option>
                                        @foreach($datas['sport_types'] as $type)
                                            <option value="{{ $type->id }}" @selected(request('sport_type_id') == $type->id)>
                                                {{ $type->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    @include('components.home.filters.location-filtering')
                                </div>
                                <div class="col-md-3">
                                    <select name="district_id" id="district-select" class="form-select">
                                        <option value="">{{ __('messages.select_district') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <input type="text" name="title" class="form-control" placeholder="{{ __('messages.title') }}" value="{{ request('title') }}">
                                </div>

                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.filter') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        @include('components.admin.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-scripts')
<script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>

@endsection
