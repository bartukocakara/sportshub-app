<div class="modal fade" id="kt_modal_update_match_info" tabindex="-1" aria-labelledby="updateMatchInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('matches.update', $datas['match']->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateMatchInfoLabel">{{ __('messages.edit_match') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
                </div>
                <div class="modal-body">
                    <div class="accordion accordion-icon-toggle" id="matchInfoAccordion">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBasicInfo">
                                <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBasicInfo" aria-expanded="true" aria-controls="collapseBasicInfo">
                                    {{ __('messages.basic_info') }}
                                </button>
                            </h2>
                            <div id="collapseBasicInfo" class="accordion-collapse collapse show" aria-labelledby="headingBasicInfo" data-bs-parent="#matchInfoAccordion">
                                <div class="accordion-body">
                                    <div class="mb-5">
                                        <label for="update_title" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.title') }}</label>
                                        <input type="text" name="title" id="update_title" class="form-control form-control-solid @error('title') is-invalid @enderror" value="{{ old('title', $datas['match']->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="update_price" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.price') }}</label>
                                        <input type="number" name="price" id="update_price" class="form-control form-control-solid @error('price') is-invalid @enderror" value="{{ old('price', $datas['match']->price) }}" required>
                                        @error('price')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="update_description" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.description') }}</label>
                                        <textarea name="description" id="update_description" class="form-control form-control-solid @error('description') is-invalid @enderror" rows="3">{{ old('description', $datas['match']->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5">
                                        <label for="update_match_status" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.status') }}</label>
                                        <select name="match_status" id="update_match_status" class="form-select form-select-solid select2-status" required>
                                            <option value="pending" {{ old('match_status', $datas['match']->match_status) === 'pending' ? 'selected' : '' }} data-html="<span class='badge badge-light-success'>{{ __('messages.pending') }}</span>">{{ __('messages.pending') }}</option>
                                            <option value="confirmed" {{ old('match_status', $datas['match']->match_status) === 'confirmed' ? 'selected' : '' }} data-html="<span class='badge badge-light-warning'>{{ __('messages.confirmed') }}</span>">{{ __('messages.confirmed') }}</option>
                                            <option value="completed" {{ old('match_status', $datas['match']->match_status) === 'completed' ? 'selected' : '' }} data-html="<span class='badge badge-light-danger'>{{ __('messages.completed') }}</span>">{{ __('messages.completed') }}</option>
                                            <option value="canceled" {{ old('match_status', $datas['match']->match_status) === 'canceled' ? 'selected' : '' }} data-html="<span class='badge badge-light-danger'>{{ __('messages.canceled') }}</span>">{{ __('messages.canceled') }}</option>
                                        </select>
                                        @error('match_status')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTypeGender">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTypeGender" aria-expanded="false" aria-controls="collapseTypeGender">
                                    {{ __('messages.match_type_and_gender') }}
                                </button>
                            </h2>
                            <div id="collapseTypeGender" class="accordion-collapse collapse" aria-labelledby="headingTypeGender" data-bs-parent="#matchInfoAccordion">
                                <div class="accordion-body">
                                    <div class="mb-5">
                                        @include('components.filters.sport-type-filter', ['selectedSportTypeId' => old('sport_type_id', $datas['match']->sport_type_id)])
                                        @error('sport_type_id')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-5">
                                        @include('components.filters.gender-filtering', ['selectedGender' => old('gender', $datas['match']->gender)])
                                        @error('gender')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingPlayerLimits">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePlayerLimits" aria-expanded="false" aria-controls="collapsePlayerLimits">
                                    {{ __('messages.player_limits') }}
                                </button>
                            </h2>
                            <div id="collapsePlayerLimits" class="accordion-collapse collapse" aria-labelledby="headingPlayerLimits" data-bs-parent="#matchInfoAccordion">
                                <div class="accordion-body">
                                    <div class="row g-5 mb-5">
                                        <div class="col-lg-6">
                                            <label for="update_min_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.min_players') }}</label>
                                            <input type="number" name="min_player" id="update_min_player" class="form-control form-control-solid @error('min_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_4') }}" value="{{ old('min_player', $datas['match']->min_player) }}" min="2">
                                            @error('min_player')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label for="update_max_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.max_players') }}</label>
                                            <input type="number" name="max_player" id="update_max_player" class="form-control form-control-solid @error('max_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_20') }}" value="{{ old('max_player', $datas['match']->max_player) }}" min="2" max="20">
                                            @error('max_player')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSchedule">
                                <button class="accordion-button fs-4 fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSchedule" aria-expanded="false" aria-controls="collapseSchedule">
                                    {{ __('messages.schedule') }}
                                </button>
                            </h2>
                            <div id="collapseSchedule" class="accordion-collapse collapse" aria-labelledby="headingSchedule" data-bs-parent="#matchInfoAccordion">
                                <div class="accordion-body">
                                    <div class="row g-5 mb-5">
                                        <div class="col-lg-4">
                                            <label for="update_play_date" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.play_date') }}</label>
                                            <input type="date" name="play_date" id="update_play_date" class="form-control form-control-solid @error('play_date') is-invalid @enderror" value="{{ old('play_date', \Carbon\Carbon::parse($datas['match']->play_date)->format('Y-m-d')) }}" required>
                                            @error('play_date')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="update_from_hour" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.from_hour') }}</label>
                                            <input type="time" name="from_hour" id="update_from_hour" class="form-control form-control-solid @error('from_hour') is-invalid @enderror" value="{{ old('from_hour', \Carbon\Carbon::parse($datas['match']->from_hour)->format('H:i')) }}" required>
                                            @error('from_hour')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="update_to_hour" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.to_hour') }}</label>
                                            <input type="time" name="to_hour" id="update_to_hour" class="form-control form-control-solid @error('to_hour') is-invalid @enderror" value="{{ old('to_hour', \Carbon\Carbon::parse($datas['match']->to_hour)->format('H:i')) }}" required>
                                            @error('to_hour')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.save_changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>