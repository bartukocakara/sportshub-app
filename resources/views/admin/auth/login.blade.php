@extends('auth-layouts.app')

@section('title', 'Giriş')

@section('content')
<div class="d-flex flex-column flex-lg-row-fluid py-10">
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
            <form class="form w-100" novalidate="novalidate" action="{{ route('admin.login.store') }}" method="POST" id="auth">
                @csrf
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Sportshub'a Giriş Yapın</h1>

                </div>

                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Email</label>
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="off" required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bold text-dark fs-6 mb-0">Şifre</label>
                    </div>
                    <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" id="kt_sign_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Devam Et</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('auth-specific-scripts')
    @include('auth-layouts.scripts.login-scripts')
@endsection
