@extends('layouts.team.create')
@section('title', __('messages.create_team'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
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
@endsection
