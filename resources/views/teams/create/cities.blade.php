@extends('layouts.team.create')
@section('title', __('messages.create_team'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="flex-row-fluid py-lg-5 px-lg-15">
    <form class="form" method="POST" action="{{ route('teams.create.city.store') }}">
        @csrf
        <div class="w-100">
            <div class="fv-row">
                <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                    <span class="required">{{ __('messages.city') }}</span>
                    <span class="ms-1" data-bs-toggle="tooltip" aria-label="{{ __('messages.select_city') }}">
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                        </i>
                    </span>
                </label>
                <select class="form-select form-select-solid" name="city_id" data-control="select2" data-placeholder="{{ __('messages.select_city') }}">
                    <option></option>
                    @foreach($datas['cities'] as $city)
                        <option value="{{ $city->id }}" {{ $datas['city_id'] == $city->id ? 'selected' : '' }}>
                            {{ $city->title }}
                        </option>
                    @endforeach
                </select>
                @error('city')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex flex-stack pt-10">
            <div class="me-2">
                <a href="{{ route('teams.create.sport-type') }}" class="btn btn-lg btn-light-primary me-3">
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
