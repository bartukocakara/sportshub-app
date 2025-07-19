<div class="card mb-5 mb-xl-8">
    <div class="card-body pt-15">
        <div class="d-flex flex-column align-items-center text-center mb-4">
            <h2 class="fs-4 fs-md-3 text-primary fw-bold mb-2">
                {{ $data['team']->title }}
            </h2>

            <span class="badge {{ $data['team']->status_badge }} fs-6 fw-semibold">
                {{ $data['team']->team_status_text }}
            </span>
        </div>


        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_team_view_details" role="button" aria-expanded="true" aria-controls="kt_team_view_details">
                {{ __('messages.details') }}
                <span class="ms-2 rotate-180"> <i class="ki-duotone ki-down fs-3"></i> </span>
            </div>
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.edit_team_details') }}" data-kt-initialized="1">
                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_team_info">
                    {{ __('messages.edit') }}
                </a>
            </span>
        </div>
        <div class="separator separator-dashed my-3"></div>

        <div id="kt_team_view_details" class="collapse show">
            <div class="py-5 fs-6">
                <div class="mb-7">
                    <div class="fw-bold text-gray-700">{{ __('messages.city') }}</div>
                    <div class="text-gray-600">
                        <a href="#" class="text-gray-600 text-hover-primary">
                            {{ $data['team']->city->title }}
                        </a>
                    </div>
                </div>

                <div class="mb-7">
                    <div class="fw-bold text-gray-700">{{ __('messages.sport_type') }}</div>
                    <div class="d-flex align-items-center mt-2 gap-2">
                        <div class="symbol symbol-35px symbol-circle"> {{-- Smaller symbol for details --}}
                            <img src="{{ '/storage/'.$data['team']->sportType->img }}" alt="{{ $data['team']->sportType->title }} icon" class="w-100">
                        </div>
                        <span class="text-gray-600">{{ $data['team']->sportType->title }}</span>
                    </div>
                </div>

                <div class="mb-7">
                    <div class="fw-bold text-gray-700">{{ __('messages.gender') }}</div>
                    <div class="text-gray-600 text-capitalize">{{ __("messages." . $data['team']->gender) }}</div>
                </div>

                <div class="mb-7">
                    <div class="fw-bold text-gray-700">{{ __('messages.min_players') }}</div>
                    <div class="text-gray-600">{{ $data['team']->min_player }}</div>
                </div>

                <div>
                    <div class="fw-bold text-gray-700">{{ __('messages.max_players') }}</div>
                    <div class="text-gray-600">{{ $data['team']->max_player }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.team.modals.edit-profile-modal')
