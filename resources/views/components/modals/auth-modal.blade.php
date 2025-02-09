<div class="modal fade fixed-height-modal" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Welcome to Our Application!') }}</h5>
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Authentication contents container -->
                <div id="authContainer">
                    <!-- Centered Tabs -->
                    <ul class="nav nav-tabs justify-content-center" id="authTab" role="tablist">
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
                    <div class="tab-content mt-4" id="authTabContent">
                        <!-- Login Tab Content -->
                        <div class="tab-pane fade show active" id="login-pane" role="tabpanel" aria-labelledby="login-tab">
                            <form action="{{ route('login') }}" method="POST" class="auth-form mt-4">
                                @csrf
                                <div class="mb-3">
                                    <label for="loginEmail" class="form-label">{{ __('messages.email') }}</label>
                                    <input type="email" name="email" class="form-control" id="loginEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="loginPassword" class="form-label">{{ __('messages.password') }}</label>
                                    <input type="password" name="password" class="form-control" id="loginPassword" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('messages.login') }}
                                </button>
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
                            <form action="{{ route('register') }}" method="POST" class="auth-form mt-4">
                                @csrf
                                <!-- First Name Field -->
                                <div class="mb-3">
                                    <label for="registerFirstName" class="form-label">{{ __('messages.first_name') }}</label>
                                    <input type="text"
                                        name="first_name"
                                        class="form-control"
                                        id="registerFirstName"
                                        value="{{ old('first_name') }}"
                                        required>
                                </div>
                                <!-- Last Name Field -->
                                <div class="mb-3">
                                    <label for="registerLastName" class="form-label">{{ __('messages.last_name') }}</label>
                                    <input type="text"
                                        name="last_name"
                                        class="form-control"
                                        id="registerLastName"
                                        value="{{ old('last_name') }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="registerEmail" class="form-label">{{ __('messages.email') }}</label>
                                    <input type="email" name="email" class="form-control" id="registerEmail" value="{{ old('email') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="registerBirthDate" class="form-label">{{ __('messages.birth_date') }}</label>
                                    <input type="date" name="birth_date" class="form-control" id="registerBirthDate" value="{{ old('birth_date') }}" required max="{{ \Carbon\Carbon::now()->subYears(18)->toDateString() }}">
                                </div>
                                <div class="mb-3">
                                    <label for="registerPassword" class="form-label">{{ __('messages.password') }}</label>
                                    <input type="password" name="password" class="form-control" id="registerPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="registerPasswordConfirmation" class="form-label">{{ __('messages.confirm_password') }}</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="registerPasswordConfirmation" required>
                                </div>
                                <!-- KVKK Acceptance Section -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="kvkk" id="kvkk" required>
                                    <label class="form-check-label" for="kvkk">
                                        Kişisel verilerimin KVKK kapsamında işlendiğini kabul ediyorum.
                                    </label>
                                    <!-- Instead of opening a new modal, show KVKK text in the same container -->
                                    <button type="button" class="btn btn-link p-0" onclick="showKVKK()">
                                        KVKK Metnini Oku
                                    </button>
                                </div>
                                <!-- Hidden input to send KVKK read status -->
                                <input type="hidden" name="kvkk_read" id="kvkk_read" value="0">
                                <button type="submit" id="registerButton" class="btn btn-primary w-100" disabled>
                                    {{ __('messages.register') }}
                                </button>
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
                    </div>
                </div>
                <!-- KVKK Information Container -->
                <div id="kvkkContainer" class="d-none">
                    <h5>KVKK Bilgilendirme</h5>
                    <p>
                        6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında, kişisel verilerinizin işlenmesi, saklanması ve korunması amacıyla gerekli tüm tedbirler alınmaktadır. Verileriniz, kimlik tespiti, hizmet sunumu, güvenlik, faturalandırma ve yasal yükümlülüklerin yerine getirilmesi kapsamında kullanılmaktadır.
                    </p>
                    <p>
                        Kişisel verileriniz, ilgili mevzuata uygun olarak ve sizin onayınız doğrultusunda işlenecek olup, yetkisiz erişime, ifşaya veya kaybolmaya karşı gerekli güvenlik önlemleri alınmıştır. Gizliliğiniz bizim için önemlidir. Detaylı bilgi için lütfen <a href="https://www.kvkk.gov.tr" target="_blank" rel="noopener">KVKK Resmi Web Sitesi</a>'ni ziyaret ediniz.
                    </p>
                    <button type="button" class="btn btn-secondary" onclick="returnToRegister()">KVKK'ya Geri Dön</button>
                </div>
            </div>
        </div>
    </div>
</div>
