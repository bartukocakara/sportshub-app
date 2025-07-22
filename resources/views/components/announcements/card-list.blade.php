@props([
    'announcements' => [],
    'sport_types' => [],
    'announcement_types' => [],
])
@foreach ($announcements as $key => $announcement)
    @php
        $announcementId = $announcement['id'];
        $deleteModalId = "deleteAnnouncementModal-$announcementId";
        $updateModalId = "updateAnnouncementModal-$announcementId";

        $avatarPath = $announcement['created_by']['avatar'] ?? null;
        $firstName = $announcement['created_by']['full_name'] ?? '';
        $avatarUrl = null;
        if ($avatarPath) {
            $avatarUrl = Str::startsWith($avatarPath, ['http://', 'https://']) ? $avatarPath : asset('storage/' . $avatarPath);
        }

        $isCreator = isset($announcement['created_user_id']) && $announcement['created_user_id'] === auth()->id();
    @endphp

    <div class="card card-flush mb-10 shadow-sm">
        <div class="card-header pt-9">
            <div class="d-flex align-items-center">
                <div class="symbol symbol-50px me-5">
                    @if ($avatarUrl)
                        <img src="{{ $avatarUrl }}" alt="avatar" />
                    @else
                        <div class="avatar-placeholder" style="width: 50px; height: 50px; background-color: #ccc; color: #333; font-weight: bold; font-size: 24px; text-align: center; line-height: 50px; border-radius: 20%; user-select: none;">
                            {{ Str::upper(mb_substr($firstName, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="flex-grow-1">
                    <a href="#" class="text-gray-800 text-hover-primary fs-4 fw-bold">
                        {{ $announcement['created_by']['full_name'] }}
                    </a>
                    <span class="text-gray-500 fw-semibold d-block">
                        {{ $announcement['created_at_locale'] }}
                    </span>
                </div>
            </div>

            @if($isCreator)
                <div class="card-toolbar">
                    <div class="m-0">
                        <button class="btn btn-icon btn-color-gray-500 btn-active-color-primary me-n4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-overflow="true">
                            <i class="ki-duotone ki-dots-square fs-1"> <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span> </i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">{{ __('messages.actions') }}</div>
                            </div>
                            <div class="separator mb-3 opacity-75"></div>
                            <div class="menu-item px-3">
                                <a class="menu-link px-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#{{ $updateModalId }}"
                                    data-id="{{ $announcement['id'] }}"
                                    data-title="{{ $announcement['title'] }}"
                                    data-message="{{ $announcement['message'] }}"
                                    data-type="{{ $announcement['type_definition']['value'] }}"
                                    data-sport-type-id="{{ $announcement['sport_type_id'] ?? '' }}"
                                >
                                    {{ __('messages.edit') }}
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#{{ $deleteModalId }}" data-id="{{ $announcement['id'] }}">
                                    {{ __('messages.delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="badge badge-light-primary mb-2">
                {{ $announcement['type_definition']['description_tr'] }}
            </div>
            <div class="fs-5 fw-bold text-gray-800 mb-2">
                {{ $announcement['title'] }}
            </div>
            <div class="fs-6 fw-normal text-gray-700 mb-5">
                {{ $announcement['message'] }}
            </div>
            <div class="text-muted small">
                <strong>{{ __('messages.subject') }}:</strong>
                {{ __('messages.' . class_basename($announcement['subject_type'])) }}
            </div>
            @if (!empty($announcement['sport_type_name']))
                <div class="text-muted small mt-1"><strong>{{ __('messages.sport_type') }}:</strong> {{ $announcement['sport_type_name'] }}</div>
            @endif
        </div>
    </div>
    <x-modals.delete-confirmation-modal
        id="{{ $deleteModalId }}"
        :route="route('announcements.destroy', ['announcement' => $announcement['id']])"
        :title="__('messages.delete_announcement_title')"
        :message="__('messages.delete_announcement_message')"
        icon="fas fa-trash"
        color="secondary"
        emoji="🗑️"
    />
    <x-announcements.modals.edit-modal
        :id="$updateModalId"
        :route="route('announcements.update', ['announcement' => $announcement['id']])"
        :announcement="$announcement"
        :title="__('messages.update_announcement_title')"
        :message="__('messages.update_announcement_message')"
        :sport_types="$sport_types"
        :subject_type="ucfirst($announcement['subject_type'])"
        :announcement_types="$announcement_types"
        :currentSubjectId="$announcement['subject_id']"
    />

@endforeach
