@extends('admin.master')
@section('title', __('messages.create_court'))

@section('custom-styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/toaster.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/images.css') }}"  rel="stylesheet" type="text/css">
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
                                    <a class="text-gray-500 text-hover-primary" href="{{ route('admin.courts.index') }}">{{ __('messages.court_list') }}</a>
                                </li>
                            </ul>

                            <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                                {{ __('messages.create_court') }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('error') }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('admin.courts.update', ['court' => $datas['court']->id]) }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="form d-flex flex-column flex-lg-row">
                        @csrf
                        @method('PUT')
                        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                            @include('components.admin.court.images', ['images' => $datas['court']->courtImages])
                        </div>

                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ __('messages.general_information') }}</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">{{ __('messages.title') }}</label>
                                        <input type="text" name="title" class="form-control" required value="{{ old('title', $datas['court']->title) }}" />
                                    </div>
                                    @include('components.admin.court.sport-type')
                                    @include('components.admin.court.address')
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.courts.index') }}" class="btn btn-light me-5">
                                    {{ __('messages.cancel') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">{{ __('messages.save_changes') }}</span>
                                    <span class="indicator-progress">
                                        {{ __('messages.please_wait') }}
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @include('components.admin.scripts.location')
    @include('components.admin.scripts.image', ['images' => $datas['court']->courtImages])
@endsection

