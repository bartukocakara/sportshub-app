@props([
    'id', // The unique ID for the modal (e.g., updateAnnouncementModal-123)
    'route', // The form action URL (e.g., announcements/{announcement}/update)
    'title' => __('messages.edit_announcement'), // Default title
    'sport_types' => [], // Collection of sport types
    'announcement' => [], // The announcement data
    'subject_type' => '', // The type of subject (e.g., Team)
    'announcement_types' => [], // Collection of announcement types
    'currentSubjectId' => null, // The ID of the subject (e.g., team ID)
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form method="POST" action="{{ $route }}" id="updateAnnouncementForm_{{ $id }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $id }}_label">{{ $title }}</h5>
                    <button type="button" class="btn btn-sm btn-icon btn-active-light-primary" data-bs-dismiss="modal" aria-label="{{ __('messages.close') }}"> {{-- Added aria-label for accessibility --}}
                        <i class="ki-duotone ki-cross fs-1"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-flush mb-0">
                        @auth
                        <div class="card-header justify-content-start align-items-center pt-4">
                            <div class="symbol symbol-45px me-3">
                                @if(auth()->user()->avatar)
                                    <img src="{{ auth()->user()->avatar }}" alt="user avatar" /> {{-- Added alt text --}}
                                @else
                                    <div class="symbol-label bg-primary text-white fw-bold d-flex align-items-center justify-content-center rounded-circle" style="width: 45px; height: 45px;">
                                        {{ strtoupper(mb_substr(auth()->user()->first_name, 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <span class="text-gray-600 fw-semibold fs-6">
                                {{ __('messages.whats_on_your_mind', ['name' => auth()->user()->first_name ?? '']) }}
                            </span>
                        </div>
                        @endauth
                        <div class="card-body pt-3 pb-0 border">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="edit_sport_type_id_{{ $id }}" class="form-label fw-bold">
                                        <i class="bi bi-trophy-fill me-2 text-primary"></i> {{ __('messages.sport_type') }}
                                    </label>
                                    <select name="sport_type_id" id="edit_sport_type_id_{{ $id }}" class="form-select select2" data-dropdown-parent="#{{ $id }}" required>
                                        <option value="" disabled>{{ __('messages.select_sport_type') }}</option>
                                        @foreach($sport_types as $sportType)
                                            <option value="{{ $sportType->id }}" {{ $announcement['sport_type_id'] == $sportType->id ? 'selected' : '' }}>
                                                {{ $sportType->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="edit_type_{{ $id }}" class="form-label fw-bold">
                                        <i class="bi bi-person-plus-fill me-2 text-primary"></i> {{ __('messages.type') }}
                                    </label>
                                    <select name="type" id="edit_type_{{ $id }}" class="form-select select2" data-dropdown-parent="#{{ $id }}" required>
                                        <option value="" disabled>
                                            {{ __('messages.select_type') }}
                                        </option>
                                        @foreach ($announcement_types as $announcementType)
                                            <option value="{{ $announcementType->value }}" {{ $announcement['type_definition']['value'] == $announcementType ? 'selected' : '' }}>
                                                {{ $announcementType->description_tr }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="subject_type" value="{{ $subject_type }}">
                            <input type="hidden" name="subject_id" value="{{ $currentSubjectId }}">
                            <div class="mt-4">
                                <label for="edit_title_{{ $id }}" class="form-label fw-bold">
                                    <i class="bi bi-type me-2 text-primary"></i> {{ __('messages.title') }}
                                </label>
                                <input type="text"
                                    name="title"
                                    id="edit_title_{{ $id }}"
                                    class="form-control"
                                    value="{{ $announcement['title'] }}"
                                    required
                                    minlength="3"
                                    maxlength="255">
                            </div>

                            <div class="mt-4">
                                <label for="edit_message_{{ $id }}" class="form-label fw-bold">
                                    <i class="bi bi-chat-text me-2 text-primary"></i> {{ __('messages.message') }}
                                </label>
                                <textarea class="form-control"
                                        id="edit_message_{{ $id }}"
                                        name="message"
                                        rows="3"
                                        required>{{ $announcement['message'] }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end pt-3">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                                {{ __('messages.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">
                                    <i class="bi bi-send-fill me-1"></i> {{ __('messages.save') }}
                                </span>
                                <span class="indicator-progress">
                                    {{ __('messages.please_wait') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
