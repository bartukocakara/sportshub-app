<div class="modal fade" id="kt_modal_update_team_info" tabindex="-1" aria-labelledby="updateTeamInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('teams.update', $datas['team']->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="updateTeamInfoLabel">{{ __('messages.edit_team') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-5">
                        <label for="update_title" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.title') }}</label>
                        <input type="text" name="title" id="update_title" class="form-control form-control-solid @error('title') is-invalid @enderror" value="{{ old('title', $datas['team']->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <label for="update_team_status" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.status') }}</label>
                        <select name="team_status" id="update_team_status" class="form-select form-select-solid select2-status" required>
                            <option value="active" {{ old('team_status', $datas['team']->team_status) === 'active' ? 'selected' : '' }} data-html="<span class='badge badge-light-success'>{{ __('messages.active') }}</span>">{{ __('messages.active') }}</option>
                            <option value="inactive" {{ old('team_status', $datas['team']->team_status) === 'inactive' ? 'selected' : '' }} data-html="<span class='badge badge-light-warning'>{{ __('messages.inactive') }}</span>">{{ __('messages.inactive') }}</option>
                            <option value="banned" {{ old('team_status', $datas['team']->team_status) === 'banned' ? 'selected' : '' }} data-html="<span class='badge badge-light-danger'>{{ __('messages.banned') }}</span>">{{ __('messages.banned') }}</option>
                        </select>
                        @error('team_status')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="update_city_id" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.city') }}</label>
                        <select name="city_id" id="update_city_id" class="form-select form-select-solid @error('city_id') is-invalid @enderror" data-control="select2" data-dropdown-parent="#kt_modal_update_team_info" required>
                            @foreach($datas['cities'] as $city)
                                <option value="{{ $city->id }}" {{ old('city_id', $datas['team']->city_id) === $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="update_sport_type_id" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.sport_type') }}</label>
                        <select name="sport_type_id" id="update_sport_type_id" class="form-select form-select-solid @error('sport_type_id') is-invalid @enderror" data-control="select2" data-dropdown-parent="#kt_modal_update_team_info" required>
                            @foreach($datas['sport_types'] as $type)
                                <option value="{{ $type->id }}" {{ old('sport_type_id', $datas['team']->sport_type_id) === $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                        @error('sport_type_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.gender') }}</label>
                        <div class="d-flex flex-wrap gap-5">
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="male" id="update_gender_male" {{ old('gender', $datas['team']->gender) == 'male' ? 'checked' : '' }}/>
                                <label class="form-check-label" for="update_gender_male">
                                    {{ __('messages.male') }}
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="female" id="update_gender_female" {{ old('gender', $datas['team']->gender) == 'female' ? 'checked' : '' }}/>
                                <label class="form-check-label" for="update_gender_female">
                                    {{ __('messages.female') }}
                                </label>
                            </div>
                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="mixed" id="update_gender_mixed" {{ old('gender', $datas['team']->gender) == 'mixed' ? 'checked' : '' }}/>
                                <label class="form-check-label" for="update_gender_mixed">
                                    {{ __('messages.mixed') }}
                                </label>
                            </div>
                        </div>
                        @error('gender')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-5 mb-5">
                        <div class="col-lg-6">
                            <label for="update_min_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.min_players') }}</label>
                            <input type="number" name="min_player" id="update_min_player" class="form-control form-control-solid @error('min_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_4') }}" value="{{ old('min_player', $datas['team']->min_player) }}" **min="2"**>
                            @error('min_player')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="update_max_player" class="form-label fw-bold fs-6 text-gray-700">{{ __('messages.max_players') }}</label>
                            <input type="number" name="max_player" id="update_max_player" class="form-control form-control-solid @error('max_player') is-invalid @enderror" placeholder="{{ __('messages.e_g_20') }}" value="{{ old('max_player', $datas['team']->max_player) }}" **min="2" max="20"**>
                            @error('max_player')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
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
