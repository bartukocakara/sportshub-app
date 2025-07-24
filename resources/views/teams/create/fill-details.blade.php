@extends('layouts.team.create')
@section('title', __('messages.create_team'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="flex-row-fluid py-lg-5 px-lg-15">
    <form class="form" method="POST" action="{{ route('teams.create.fill-details.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="w-100">
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">{{ __('messages.team_name') }}</label>
                <input type="text" class="form-control form-control-solid" placeholder="{{ __('messages.enter_team_name') }}" name="title" value="{{ old('title', $datas['team_details']['title'] ?? '') }}" />
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="fv-row mb-7">
                <label class="required fs-6 fw-semibold mb-2">{{ __('messages.select_gender') }}</label>
                <select name="gender" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="{{ __('messages.select_gender') }}">
                    <option value="">{{ __('messages.select_gender') }}</option>
                    <option value="male" {{ old('gender', $datas['team_details']['gender'] ?? '') == 'male' ? 'selected' : '' }}>{{ __('messages.male') }}</option>
                    <option value="female" {{ old('gender', $datas['team_details']['gender'] ?? '') == 'female' ? 'selected' : '' }}>{{ __('messages.female') }}</option>
                    <option value="mixed" {{ old('gender', $datas['team_details']['gender'] ?? '') == 'mixed' ? 'selected' : '' }}>{{ __('messages.mixed') }}</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-9 mb-7">
                <div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.min_players') }}</label>
                    <input type="number" class="form-control form-control-solid" placeholder=" {{ __('messages.min_players') }} " name="min_player" min="1" value="{{ old('min_player', $datas['team_details']['min_player'] ?? '') }}" />
                    @error('min_player')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 fv-row">
                    <label class="required fs-6 fw-semibold mb-2">{{ __('messages.max_players') }}</label>
                    <input type="number" class="form-control form-control-solid" placeholder="{{ __('messages.max_players') }}" name="max_player" min="1" value="{{ old('max_player', $datas['team_details']['max_player'] ?? '') }}" />
                    @error('max_player')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="fv-row mb-7">
                <label class="fs-6 fw-semibold mb-2">{{ __('messages.followable_status') }}</label>
                <div class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" name="followable_status" value="1" id="followable_status"
                        {{ old('followable_status', $datas['team_details']['followable_status'] ?? 0) ? 'checked' : '' }} />
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
@endsection
