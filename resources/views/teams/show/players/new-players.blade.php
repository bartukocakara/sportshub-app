@extends('layouts.team.index')

@section('title', __('messages.players'))
@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar pt-5">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                                <a href="/index.html" class="text-gray-500 text-hover-primary">
                                    <i class="ki-duotone ki-home fs-3 text-gray-500 me-n1"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                            </li>
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.players') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-row">
                    <div class="w-100 flex-lg-row-fluid">
                        <div id="user_list" class="row g-6 mb-6 g-xl-9">
                            @foreach ($datas['users']['data'] as $user)
                                @php
                                    $inviteModalId = 'invite-request-' . $user['id'];
                                @endphp
                                <div class="col-md-6 col-xxl-4">
                                    <div class="card border shadow-sm">
                                        <div class="card-body d-flex flex-center flex-column py-9 px-5">
                                            <div class="symbol symbol-65px symbol-circle mb-5">
                                                @if (!empty($user['avatar']))
                                                    <img src="{{ $user['avatar'] }}" alt="image" />
                                                @else
                                                    <span class="symbol-label fs-2 fw-bold text-white bg-primary">
                                                        {{ strtoupper(substr($user['first_name'], 0, 1)) }}
                                                    </span>
                                                @endif
                                                <div class="bg-success position-absolute rounded-circle translate-middle start-100 top-100 border-4 border-body h-15px w-15px ms-n3 mt-n3"></div>
                                            </div>
                                            <a href="{{ route('users.profile', ['id' => $user['id']]) }}" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{ $user['full_name'] }}</a>
                                            <div class="fw-semibold text-gray-500 mb-6"></div>

                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#{{ $inviteModalId }}">
                                                <i class="fas fa-user-plus me-1"></i> {{ __('messages.invite') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <x-modals.invite-modal
                                    id="{{ $inviteModalId }}"
                                    :route="route('teams.invite-players', ['id' => request()->route('id'), 'userId' => $user['id']])"
                                    :title="__('messages.invite_confirmation')"
                                    :message="__('messages.invite_player_team_message')"
                                    icon="fas fa-handshake"
                                    color="danger"
                                />
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <div class="d-flex justify-content-center mt-5">
                                <button id="showMoreButton" type="button" class="btn fw-semibold d-flex align-items-center justify-content-center gap-2" style="background-color: #f4f4f4; color: grey; border-radius: 25px; padding: 10px 20px;">
                                    ⬇️ {{ __('messages.show_more') }}
                                </button>
                                <div id="spinner" class="spinner-border text-primary ms-3 d-none" role="status">
                                    <span class="visually-hidden">{{ __('messages.loading') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-scripts')
<script>
    window.csrfToken = '{{ csrf_token() }}';
    window.teamId = '{{ request()->route("id") }}';
    window.translations = {
        invite: '{{ __("messages.invite") }}',
        invite_confirmation: '{{ __("messages.invite_confirmation") }}',
        invite_player_team_message: '{{ __("messages.invite_player_team_message") }}',
        cancel: '{{ __("messages.cancel") }}',
        confirm: '{{ __("messages.confirm") }}',
    };
</script>
<script src="{{ asset('assets/js/card-list/user-invite-card-list.js') }}"></script>

<script type="module">
    import { LoadMoreController, getAvatarUrl, debounce } from '{{ asset('assets/js/load-more.js') }}';

    @isset($selected_user_ids)
        window.selectedUserIds = @json($selected_user_ids);
    @else
        window.selectedUserIds = [];
    @endisset

    document.addEventListener("DOMContentLoaded", function () {
        // Ensure initializeMobileButtons is called if it exists
        if (typeof initializeMobileButtons === 'function') {
            initializeMobileButtons();
        }

        @isset($datas['users']['data'])
        window.userLoadMore = new LoadMoreController({
            apiUrl: '{{ route('api.users.index') }}',
            containerId: 'user_list',
            spinnerId: 'spinner',
            showMoreButtonId: 'showMoreButton',
            renderItemCallback: renderUserCard,
            initialMeta: {
                current_page: {{ (int) $datas['users']['meta']['current_page'] }},
                last_page: {{ (int) $datas['users']['meta']['last_page'] }}
            },
            extraParams: {
                // full_name: '',
                // city_id: '{{ $datas['team']['city_id'] }}',
                sport_type_id: '{{ $datas['team']['sport_type_id'] }}',
                not_team_id: '{{ $datas['team']['id'] }}',
                except_ids: @json($datas['except_ids'])
            },
            spinnerDelay: 200,
            showMoreText: '⬇️ {{ __('messages.show_more') }}',
            noMoreResultsText: '{{ __('messages.no_more_results') }}'
        });
        @endisset

        const searchInput = document.getElementById('searchInput');
        if (searchInput) {
            searchInput.addEventListener('input', debounce(function (e) {
                const searchValue = e.target.value.trim();
                window.userLoadMore.setFilter({ full_name: searchValue });
            }, 400));
        } else {
            console.warn('Search input with ID "searchInput" not found.');
        }
    });
</script>
@endsection
