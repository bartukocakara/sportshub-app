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
                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">1</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.sport_type') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_sport_type') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">2</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.city') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_city') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item completed">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <i class="ki-duotone ki-check stepper-check fs-2"></i>
                                        <span class="stepper-number">3</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.players') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.select_players') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>

                            <div class="stepper-item current">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">4</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.details') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.fill_team_details') }}</div>
                                    </div>
                                </div>
                                <div class="stepper-line h-40px"></div>
                            </div>
                            <div class="stepper-item">
                                <div class="stepper-wrapper">
                                    <div class="stepper-icon w-40px h-40px">
                                        <span class="stepper-number">5</span>
                                    </div>
                                    <div class="stepper-label">
                                        <h3 class="stepper-title">{{ __('messages.confirm_details') }}</h3>
                                        <div class="stepper-desc">{{ __('messages.review_and_confirm') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        <form class="form" method="POST" action="{{ route('teams.create.fill-details.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="w-100">
                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.team_name') }}</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="{{ __('messages.enter_team_name') }}" name="title" value="{{ old('title', $teamDetails['title'] ?? '') }}" />
                                    @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold mb-2">{{ __('messages.team_logo') }}</label>
                                    <input type="file" class="form-control form-control-solid" name="logo" />
                                    @error('logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @if(isset($teamDetails['logo_path']) && $teamDetails['logo_path'])
                                        <div class="mt-3">
                                            <p>{{ __('messages.current_logo') }}:</p>
                                            <img src="{{ asset($teamDetails['logo_path']) }}" alt="Current Team Logo" class="img-thumbnail" style="max-width: 100px;" />
                                        </div>
                                    @endif
                                </div> -->

                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.select_gender') }}</label>
                                    <select name="gender" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="{{ __('messages.select_gender') }}">
                                        <option value="">{{ __('messages.select_gender') }}</option>
                                        <option value="male" {{ old('gender', $teamDetails['gender'] ?? '') == 'male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                                        <option value="female" {{ old('gender', $teamDetails['gender'] ?? '') == 'female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                                        <option value="mixed" {{ old('gender', $teamDetails['gender'] ?? '') == 'mixed' ? 'selected' : '' }}>{{ __('messages.mixed') }}</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-9 mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.min_players') }}</label>
                                        <input type="number" class="form-control form-control-solid" placeholder=" {{ __('messages.min_players') }} " name="min_player" min="1" value="{{ old('min_player', $teamDetails['min_player'] ?? '') }}" />
                                        @error('min_player')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required fs-6 fw-semibold mb-2">{{ __('messages.max_players') }}</label>
                                        <input type="number" class="form-control form-control-solid" placeholder="{{ __('messages.max_players') }}" name="max_player" min="1" value="{{ old('max_player', $teamDetails['max_player'] ?? '') }}" />
                                        @error('max_player')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="fs-6 fw-semibold mb-2">{{ __('messages.followable_status') }}</label>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="followable_status" value="1" id="followable_status"
                                            {{ old('followable_status', $teamDetails['followable_status'] ?? 0) ? 'checked' : '' }} />
                                        <label class="form-check-label" for="followable_status">
                                            {{ __('messages.allow_following') }}
                                        </label>
                                    </div>
                                    <div class="form-text text-muted">{{ __('messages.allow_others_to_follow_your_team') }}</div>
                                    @error('followable_status')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex flex-stack pt-10">
                                <div class="me-2">
                                    <a href="{{ route('teams.create.players') }}" class="btn btn-lg btn-light-primary me-3">
                                        <i class="ki-duotone ki-arrow-left fs-3 me-1">
                                            <span class="path1"></span><span class="path2"></span>
                                        </i> {{ __('messages.back') }}
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
