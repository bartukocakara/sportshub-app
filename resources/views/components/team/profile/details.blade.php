<div class="card mb-5 mb-xl-8">
    <div class="card-body pt-15">
        <div class="d-flex flex-center flex-column mb-5">
            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1"> {{ $data['team']->title }} </a>
            <div class="fs-5 fw-semibold mb-6">
                <span class="badge {{ $data['team']->status_badge }}">
                    {{ $data['team']->team_status_text }}
                </span>
            </div>
        </div>
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">
                {{ __('messages.details') }}
                <span class="ms-2 rotate-180"> <i class="ki-duotone ki-down fs-3"></i> </span>
            </div>
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Edit customer details" data-kt-initialized="1">
                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_card_info">
                    {{ __('messages.edit') }}
                </a>

            </span>
        </div>
        <div class="separator separator-dashed my-3"></div>
        <div id="kt_customer_view_details" class="collapse show">
            <div class="py-5 fs-6">
                <div class="fw-bold mt-5">{{ __('messages.city') }}</div>
                <div class="text-gray-600">
                    <a href="#" class="text-gray-600 text-hover-primary">
                    {{ $data['team']->city->title }}
                    </a>
                </div>
                <div class="fw-bold mt-5">{{ __('messages.sport_type') }}</div>
                <div class="d-flex align-items-center gap-2">
                    <div class="symbol symbol-75px symbol-square">
                        <img src="{{ '/storage/'.$data['team']->sportType->img }}" alt="{{ $data['team']->sportType->title }} icon" width="25">
                    </div>
                    <span class="text-gray-600">{{ $data['team']->sportType->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="kt_modal_update_card_info" tabindex="-1" aria-labelledby="updateCardInfoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('teams.update', $data['team']->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="updateCardInfoLabel">{{ __('messages.edit_card_info') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('messages.title') }}</label>
                        <input type="text" name="title" class="form-control" value="{{ $data['team']->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('messages.status') }}</label>
                        <select name="team_status" class="form-select" required>
                            <option value="active" {{ $data['team']->team_status === 'active' ? 'selected' : '' }}>{{ __('messages.active') }}</option>
                            <option value="inactive" {{ $data['team']->team_status === 'inactive' ? 'selected' : '' }}>{{ __('messages.inactive') }}</option>
                            <option value="banned" {{ $data['team']->team_status === 'banned' ? 'selected' : '' }}>{{ __('messages.banned') }}</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('messages.city') }}</label>
                        <select name="city_id" class="form-select" required>
                            @foreach($data['cities'] as $city)
                                <option value="{{ $city->id }}" {{ $data['team']->city_id === $city->id ? 'selected' : '' }}>{{ $city->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">{{ __('messages.sport_type') }}</label>
                        <select name="sport_type_id" class="form-select" required>
                            @foreach($data['sport_types'] as $type)
                                <option value="{{ $type->id }}" {{ $data['team']->sport_type_id === $type->id ? 'selected' : '' }}>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

