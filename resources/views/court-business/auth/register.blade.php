@extends('auth-layouts.app')

@section('title', 'Kayıt Ol')

@section('content')
<div class="d-flex flex-column flex-lg-row-fluid py-10">
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="form w-100" novalidate="novalidate" action="{{ route('register') }}" method="POST" id="auth">
                @csrf

                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Sportshub'a Kayıt Olun</h1>
                    <div class="text-gray-400 fw-semibold fs-4">
                        <a href="{{ route('login') }}" class="link-primary fw-bold">Hesaba giriş yap</a>
                    </div>
                </div>

                <!-- First Name -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">İsim</label>
                    <input class="form-control form-control-lg form-control-solid @error('first_name') is-invalid @enderror"
                           type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" autocomplete="off" required />
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Soyisim</label>
                    <input class="form-control form-control-lg form-control-solid @error('last_name') is-invalid @enderror"
                           type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" autocomplete="off" required />
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Birth Date -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Doğum Tarihi</label>
                    <input class="form-control form-control-lg form-control-solid @error('birth_date') is-invalid @enderror"
                           type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" required />
                    @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Email</label>
                    <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                           type="email" name="email" id="email" value="{{ old('email') }}" autocomplete="off" required />
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Şifre</label>
                    <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                           type="password" name="password" id="password" required />
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bold text-dark">Şifreyi Onayla</label>
                    <input class="form-control form-control-lg form-control-solid @error('password_confirmation') is-invalid @enderror"
                           type="password" name="password_confirmation" id="password_confirmation" required />
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
    @include('auth-layouts.scripts.register-scripts')
@endsection
