@extends('layouts.match.index')

@section('title', __('messages.matches'))
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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.matches') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.matches') }}</h1>
                    </div>
                    @if($datas['is_match_owner'])
                    <a href="{{ route('match-teams.create') }}" class="btn btn-sm btn-success ms-3 px-4 py-3" >
                        {{ __('messages.create_match_team') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div id="profile-match-list" class="row g-6 g-xl-9">
                    @include('components.teams.card-list')
                </div>
                @if($datas['matches']['meta']['current_page'] < $datas['matches']['meta']['last_page'])
                <div class="text-center my-4">
                    <button id="showMoreButton" class="btn fw-semibold d-flex align-items-center justify-content-center gap-2" style="background-color: #f4f4f4; color: grey; border-radius: 25px; padding: 10px 20px;">
                        ⬇️ {{ __('messages.show_more') }}
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
@section('page-scripts')
<script>
    window.ASSET_URL = "{{ asset('') }}"; // Base asset URL
    window.MATCHES_ACTIVITIES_ROUTE = "{{ route('matches.activities', ['id' => '__ID__']) }}"; // Placeholder for ID
    window.DEFAULT_XING_ICON = "{{ asset('assets/media/svg/brand-logos/xing-icon.svg') }}"; // Default icon path
</script>
<script src="{{ asset('assets/js/card-list/match-card-list.js') }}"></script>
<script type="module">
    import { LoadMoreController, getAvatarUrl, debounce } from '{{ asset('assets/js/load-more.js') }}';

    document.addEventListener("DOMContentLoaded", function () {
        @isset($datas['matches'])
        const matchLoadMore = new LoadMoreController({
            apiUrl: '{{ route('api.matches.index') }}',
            containerId: 'profile-match-list',
            spinnerId: 'spinner',
            showMoreButtonId: 'showMoreButton',
            renderItemCallback: renderMatchCard, // Pass the function reference
            initialMeta: {
                current_page: {{ (int) $datas['matches']['meta']['current_page'] }},
                last_page: {{ (int) $datas['matches']['meta']['last_page'] }}
            },
            extraParams: {
                team_id: '{{ $datas['team']->id }}',
                type: 2
            },
            spinnerDelay: 200,
            showMoreText: '⬇️ {{ __('messages.show_more') }}',
            noMoreResultsText: '{{ __('messages.no_more_results') }}'
        });
        @endisset
    });
</script>
@endsection

