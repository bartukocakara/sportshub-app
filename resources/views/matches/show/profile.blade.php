@extends('layouts.match.index')

@section('title', __('messages.profile'))
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="{{ route('activities.index') }}" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">
                                 <a href="{{ route('matches.index') }}" class="text-gray-500 text-hover-primary">
                                    {{ __('messages.matches') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.details') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.details') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid pb-0">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @include('components.matches.show.details')
            </div>
        </div>
        @isset($datas['announcements'])
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-row">
                    <div class="w-100 flex-lg-row-fluid mx-lg-13">
                        @if($datas['is_match_owner'])
                        <form method="POST" action="{{ route('announcements.store') }}">
                            @csrf
                            <div class="card card-flush mb-10">
                                <div class="card-header justify-content-start align-items-center pt-4">
                                    <div class="symbol symbol-45px me-3">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ auth()->user()->avatar }}" alt="user" />
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
                                <div class="card-body pt-3 pb-0 border">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="sport_type_id" class="form-label fw-bold">
                                                <i class="bi bi-trophy-fill me-2 text-primary"></i> {{ __('messages.sport_type') }}
                                            </label>
                                            <select name="sport_type_id" id="sport_type_id" class="form-select select2 @error('sport_type_id') is-invalid @enderror" required>
                                                <option disabled selected>{{ __('messages.select_sport_type') }}</option>
                                                @foreach($datas['sport_types'] as $sportType)
                                                    <option value="{{ $sportType->id }}" {{ old('sport_type_id') == $sportType->id ? 'selected' : '' }}>{{ $sportType->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('sport_type_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label for="type" class="form-label fw-bold">
                                                <i class="bi bi-person-plus-fill me-2 text-primary"></i> {{ __('messages.type') }}
                                            </label>
                                            <select name="type" id="type" class="form-select select2 @error('type') is-invalid @enderror" required>
                                                <option disabled selected>{{ __('messages.select_type') }}</option>
                                                @foreach ($datas['announcement_types'] as $announcementType)
                                                    <option value="{{ $announcementType->value  }}" {{ old('type') == 'participant' ? 'selected' : '' }}>{{ $announcementType->description_tr }}</option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="hidden" name="subject_type" value="Matches">
                                    <input type="hidden" name="subject_id" value="{{ $datas['match']['id'] }}">

                                    <div class="mt-4">
                                        <label for="title" class="form-label fw-bold">
                                            <i class="bi bi-type me-2 text-primary"></i> {{ __('messages.title') }}
                                        </label>
                                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}" required minlength="3" maxlength="255">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mt-4">
                                        <label for="message" class="form-label fw-bold">
                                            <i class="bi bi-chat-text me-2 text-primary"></i> {{ __('messages.message') }}
                                        </label>
                                        <textarea
                                            class="form-control @error('message') is-invalid @enderror"
                                            id="message"
                                            name="message"
                                            rows="3"
                                            placeholder="{{ __('messages.write_your_announcement') }}"
                                            required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end pt-3">
                                    <button type="submit" class="btn btn-sm btn-primary" id="kt_social_feeds_post_btn">
                                        <span class="indicator-label">
                                            <i class="bi bi-send-fill me-1"></i> {{ __('messages.post') }}
                                        </span>
                                        <span class="indicator-progress">
                                            {{ __('messages.please_wait') }} <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                    @isset($datas['announcements'])
                        <div class="mb-10" id="kt_social_feeds_posts">
                            <div>
                                <h2 class="fw-bold fs-2 text-gray-900">{{ __('messages.announcements') }}</h2>
                            </div>
                            <div id="profile-announcement-list">
                                <x-announcements.card-list
                                        :announcements="$datas['announcements']['data']"
                                        :sport_types="$datas['sport_types']"
                                        :announcement_types="$datas['announcement_types']"
                                        :subject="$datas['match']"
                                        :datas="$datas"
                                    />

                            </div>
                            <div id="spinner" class="text-center my-4 d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>
                            @if($datas['announcements']['meta']['current_page'] < $datas['announcements']['meta']['last_page'])
                            <div class="text-center my-4">
                                <button id="showMoreButton" class="btn fw-semibold d-flex align-items-center justify-content-center gap-2" style="background-color: #f4f4f4; color: grey; border-radius: 25px; padding: 10px 20px;">
                                    ⬇️ {{ __('messages.show_more') }}
                                </button>
                            </div>
                            @endif
                        </div>
                    @endisset
                </div>
            </div>
        </div>
        @endisset
    </div>
</div>
@include('components.matches.modals.edit-profile-modal')

@endsection
@section('page-scripts')
<script src="{{ asset('assets/js/card-list/announcement-card-list.js') }}"></script>

<script type="module">
    import { LoadMoreController, getAvatarUrl, debounce } from '{{ asset('assets/js/load-more.js') }}';
    document.addEventListener("DOMContentLoaded", function () {
        if (typeof initializeMobileButtons === 'function') {
            initializeMobileButtons();
        }
        @isset($datas['announcements'])
        const announcementLoadMore = new LoadMoreController({
            apiUrl: '{{ route('api.announcements.index') }}',
            containerId: 'profile-announcement-list',
            spinnerId: 'spinner',
            showMoreButtonId: 'showMoreButton',
            renderItemCallback: renderAnnouncementCard, // Ensure this function is defined and accessible
            initialMeta: {
                current_page: {{ (int) $datas['announcements']['meta']['current_page'] }},
                last_page: {{ (int) $datas['announcements']['meta']['last_page'] }}
            },
            extraParams: {
                subject_type: 'Matches',
                subject_id: "{{ $datas['match']['id'] }}"
            },
            spinnerDelay: 200,
            showMoreText: '⬇️ {{ __('messages.show_more') }}',
            noMoreResultsText: '{{ __('messages.no_more_results') }}'
        });

        // Example: If you had a search input for announcements, you'd use debounce and setFilter
        /*
        const announcementSearchInput = document.getElementById('announcementSearchInput');
        if (announcementSearchInput) {
            announcementSearchInput.addEventListener('input', debounce(function (e) {
                const searchValue = e.target.value.trim();
                announcementLoadMore.setFilter({ title: searchValue }); // Or whatever your search parameter is
            }, 400));
        }
        */
    @endisset
</script>
@endsection
