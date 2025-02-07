<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            </div>
            <div class="modal-body py-lg-10 px-lg-10">
                <ul class="nav nav-tabs" id="authTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-pane" type="button" role="tab" aria-controls="login-pane" aria-selected="true">
                            {{ __('messages.login') }}
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register-pane" type="button" role="tab" aria-controls="register-pane" aria-selected="false">
                            {{ __('messages.register') }}
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="authTabContent">
                    <!-- Login Tab Content -->
                    <div class="tab-pane fade show active" id="login-pane" role="tabpanel" aria-labelledby="login-tab">
                        <form action="{{ route('login') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">{{ __('messages.email') }}</label>
                                <input type="email" name="email" class="form-control" id="loginEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">{{ __('messages.password') }}</label>
                                <input type="password" name="password" class="form-control" id="loginPassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('messages.login') }}</button>
                        </form>
                        <div class="text-center my-3">
                            <span>{{ __('messages.or') }}</span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('auth.google', ['type' => 'login']) }}" class="btn btn-outline-danger">
                                <i class="fab fa-google me-2"></i> {{ __('messages.login_with_google') }}
                            </a>
                        </div>
                    </div>
                    <!-- Register Tab Content -->
                    <div class="tab-pane fade" id="register-pane" role="tabpanel" aria-labelledby="register-tab">
                        <form action="{{ route('register') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-3">
                                <label for="registerEmail" class="form-label">{{ __('messages.email') }}</label>
                                <input type="email" name="email" class="form-control" id="registerEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerBirthDate" class="form-label">{{ __('messages.birth_date') }}</label>
                                <input type="date" name="birth_date" class="form-control" id="registerBirthDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">{{ __('messages.password') }}</label>
                                <input type="password" name="password" class="form-control" id="registerPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerPasswordConfirmation" class="form-label">{{ __('messages.confirm_password') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" id="registerPasswordConfirmation" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">{{ __('messages.register') }}</button>
                        </form>
                        <div class="text-center my-3">
                            <span>{{ __('messages.or') }}</span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="{{ route('auth.google', ['type' => 'register']) }}" class="btn btn-outline-danger">
                                <i class="fab fa-google me-2"></i> {{ __('messages.register_with_google') }}
                            </a>
                        </div>
                    </div>
                </div> <!-- End of tab-content -->
            </div>
        </div>
    </div>
</div>
