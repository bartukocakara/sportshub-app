@extends('layouts.team.create')
@section('title', __('messages.create_team'))
@section('custom-styles')
<link href="{{ asset('assets/css/no-sidebar.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="flex-row-fluid py-lg-5 px-lg-15">
    <form class="form" method="POST" action="{{ route('teams.create.players.store') }}">
        @csrf
        <div class="w-100">
            <div class="fv-row">
                <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                    <span class="required">{{ __('messages.players') }}</span>
                    <span class="ms-1" data-bs-toggle="tooltip" aria-label="{{ __('messages.select_players') }}">
                        <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                            <span class="path1"></span><span class="path2"></span><span class="path3"></span>
                        </i>
                    </span>
                </label>
                <div class="row g-6 g-xl-9">
                    <div class="row g-6 g-xl-9" id="user_list">
                        @php
                            $selectedUserIds = collect($datas['selected_users'])->pluck('id')->toArray();
                        @endphp
                        @foreach ($datas['users']['data'] as $key => $user)
                            <div class="col-md-6 col-xxl-4">
                                <div class="card border shadow-sm player-card {{ in_array($user['id'], $selectedUserIds) ? 'border-primary' : '' }}" style="border-width: {{ in_array($user['id'], $selectedUserIds) ? '2px' : '1px' }}">
                                    <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                        <div class="symbol symbol-65px symbol-circle mb-5">
                                            <img src="{{ asset($user['avatar']) }}" alt="image" />
                                            <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                        </div>
                                        <a href="{{ route('users.profile', ['id' => $user['id']]) }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $user['full_name'] }}</a>
                                        <div class="fw-semibold text-gray-500 mb-6">Art Director at Novica Co.</div>
                                        <div class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="user_ids[]"
                                                value="{{ $user['id'] }}" id="player_{{ $user['id'] }}"
                                                {{ in_array($user['id'], $selectedUserIds) ? 'checked' : '' }} />
                                            <label class="form-check-label" for="player_{{ $user['id'] }}">
                                                {{ __('messages.select_player') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <div class="d-flex justify-content-center mt-5">
                            <button id="showMoreButton" type="button" class="btn fw-semibold d-flex align-items-center justify-content-center gap-2" style="background-color: #f4f4f4; color: grey; border-radius: 25px; padding: 10px 20px;">
                                ⬇️ {{ __('messages.show_more') }}
                            </button>
                            <div id="spinner" class="spinner-border text-primary ms-3 d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                @error('user_ids')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="d-flex flex-stack pt-10">
            <div class="me-2">
                <a href="{{ route('teams.create.city') }}" class="btn btn-lg btn-light-primary me-3">
                    <i class="ki-duotone ki-arrow-left fs-3 me-1">
                        <span class="path1"></span><span class="path2"></span>
                    </i> {{ __('messages.back') }}
                </a>
            </div>
            <div>
                <button type="submit" class="btn btn-lg btn-primary">
                    {{ __('messages.continue') }}
                    <i class="ki-duotone ki-arrow-right fs-3 ms-1 me-0">
                        <span class="path1"></span><span class="path2"></span>
                    </i>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('page-scripts')
<script src="{{ asset('assets/js/card-list/user-card-list.js') }}"></script>
<script src="{{ asset('assets/js/load-more.js') }}"></script>
<script>
    window.selectedUserIds = @json(collect($datas['selected_users'])->pluck('id')->toArray());
</script>
<script>
    function getAvatarUrl(avatar) {
        if (!avatar) return '/assets/media/avatars/blank.png';

        if (avatar.startsWith('http://') || avatar.startsWith('https://')) {
            return avatar;
        }

        return `/storage/${avatar}`;
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Your existing initializeMobileButtons() if it's defined elsewhere
        if (typeof initializeMobileButtons === 'function') {
            initializeMobileButtons();
        }

        @isset($datas['users']['data'])
        const userLoadMore = new LoadMoreController({
            apiUrl: '{{ route('api.users.index') }}',
            containerId: 'user_list',
            spinnerId: 'spinner',
            showMoreButtonId: 'showMoreButton',
            renderItemCallback: renderUserCard,
            initialMeta: {
                current_page: {{ (int) $datas['users']['meta']['current_page'] }},
                last_page: {{ (int) $datas['users']['meta']['last_page'] }}
            },
            extraParams: { },
            spinnerDelay: 2000 // Set the delay to 2000 milliseconds (2 seconds)
        });
        @endisset

        // Initial setup for existing checkboxes on page load
        document.querySelectorAll('input[name="user_ids[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', userLoadMore.handleCheckboxChange); // Use the handler from the class
        });
    });
</script>
@endsection
