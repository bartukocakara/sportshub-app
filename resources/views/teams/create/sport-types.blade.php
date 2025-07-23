@extends('layouts.no-sidebar')
@section('title', __('messages.create_team'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="app-main flex-column flex-row-fluid">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/" class="text-gray-500 text-hover-primary">
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
                        <h1 class="page-heading text-gray-900 fw-bolder fs-1">{{ __('messages.create_team') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div class="app-container container-fluid">
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid">
                    <div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
                        <div class="stepper-nav ps-lg-10">
                            <!-- Step 1: Sport Type (Current) -->
                            <div class="stepper-item current">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.sport_type') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_sport_type') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <!-- Step 2: City -->
                            <div class="stepper-item">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.city') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_city') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <!-- Step 3: Players -->
                            <div class="stepper-item">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.players') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_players') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <!-- Step 4: Details -->
                            <div class="stepper-item">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.details') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.fill_team_details') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <form class="form" method="POST" action="{{ route('teams.create.sport-type.store') }}">
                            @csrf
                            <div class="w-100">
                                <div class="fv-row">
                                    <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                                        <span class="required">{{ __('messages.sport_type') }}</span>
                                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="{{ __('messages.select_sport_type') }}">
                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>

                                    @foreach($datas['sport_types'] as $sportType)
                                    <div class="fv-row fv-plugins-icon-container">
                                        <label class="d-flex flex-stack mb-5 cursor-pointer">
                                            <span class="d-flex align-items-center me-2">
                                                <span class="symbol symbol-50px me-6">
                                                    <span class="symbol-label bg-light-primary">
                                                        <i class="ki-duotone ki-compass fs-1 text-primary">
                                                            <img src="{{ $sportType->img }}" alt="" class="symbol-img" width="25">
                                                        </i>
                                                    </span>
                                                </span>
                                                <span class="d-flex flex-column">
                                                    <span class="fw-bold fs-6">{{ $sportType->title }}</span>
                                                    <span class="fs-7 text-muted">{{ $sportType->description ?? 'Sport type description' }}</span>
                                                </span>
                                            </span>
                                            <span class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="sport_type_id" value="{{ $sportType->id }}"
                                                    {{ $datas['sport_type_id'] == $sportType->id ? 'checked' : '' }} />
                                            </span>
                                        </label>
                                    </div>
                                    @endforeach

                                    @error('sport_type')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-stack pt-10">
                                <div class="me-2">
                                    <a href="{{ route('teams.index') }}" class="btn btn-lg btn-light-primary me-3">
                                        <i class="ki-duotone ki-arrow-left fs-3 me-1">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i> {{ __('messages.cancel') }}
                                    </a>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        {{ __('messages.continue') }}
                                        <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
