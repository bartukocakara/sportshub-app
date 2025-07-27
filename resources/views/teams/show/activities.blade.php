@extends('layouts.team.index')

@section('title', __('messages.activities'))

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
                            <li class="breadcrumb-item text-gray-700">{{ __('messages.activity_list') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ __('messages.activity_list') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-row">
                        <div class="card-body">
                            <div class="card-body p-0" role="tabpanel">
                                @include('components.activities.timeline', [
                                    'is_paginated' => false,
                                    'is_show' => false,
                                    'datas' => $datas
                                ])
                            </div>
                            <div id="spinner" class="text-center my-4 d-none">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>
                            @if($datas['activities']['meta']['current_page'] < $datas['activities']['meta']['last_page'])
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
        </div>
    </div>
</div>

@endsection
@section('page-scripts')
<script>
    window.is_show = false;

   window.translations = {
        'messages.unknown_activity': 'Bilinmeyen etkinlik',
        'messages.unknown_time': 'Bilinmeyen zaman',
        'view': 'Görüntüle',
        'messages.show_more': @json(__('messages.show_more')),
        'team.created': ':user bir takım oluşturdu',
        'team.joined': ':user bir takıma katıldı',
        'team.invited': ':user bir takıma davet edildi',
        'team.updated': ':user bir takımı güncelledi',
        'just_now': 'Şimdi',
        'seconds_ago': ':count saniye önce',
        'minutes_ago': ':count dakika önce',
        'hours_ago': ':count saat önce',
        'days_ago': ':count gün önce',
        'months_ago': ':count ay önce',
        'years_ago': ':count yıl önce',
        'unknown_time': 'Bilinmeyen zaman'
    };
    function getTranslation(key) {
        const translations = window.translations || {};
        return translations[key] || key;
    }

    function timeAgo(dateStr) {
        const date = new Date(dateStr);
        const now = new Date();
        const seconds = Math.floor((now - date) / 1000);

        const rtf = new Intl.RelativeTimeFormat('tr', { numeric: 'auto' });

        const intervals = [
            { label: 'year', seconds: 31536000 },
            { label: 'month', seconds: 2592000 },
            { label: 'day', seconds: 86400 },
            { label: 'hour', seconds: 3600 },
            { label: 'minute', seconds: 60 },
            { label: 'second', seconds: 1 }
        ];

        for (const interval of intervals) {
            const count = Math.floor(seconds / interval.seconds);
            if (count >= 1) {
                return rtf.format(-count, interval.label);
            }
        }

        return rtf.format(0, 'second');
    }
</script>
<script src="{{ asset('assets/js/card-list/activity-card-list.js') }}"></script>
<script type="module">

    import { LoadMoreController, getAvatarUrl, debounce } from '{{ asset('assets/js/load-more.js') }}';

    document.addEventListener("DOMContentLoaded", function () {
        if (typeof initializeMobileButtons === 'function') {
            initializeMobileButtons();
        }

        @isset($datas['activities'])
        const activityLoadMore = new LoadMoreController({
            apiUrl: '{{ route('api.activities.index') }}',
            containerId: 'profile-activity-list',
            spinnerId: 'spinner',
            showMoreButtonId: 'showMoreButton',
            renderItemCallback: renderActivityCard, // Ensure this function is defined and accessible
            initialMeta: {
                current_page: {{ (int) $datas['activities']['meta']['current_page'] }},
                last_page: {{ (int) $datas['activities']['meta']['last_page'] }}
            },
            extraParams: {
                subject_type: 'Team',
                subject_id: "{{ $datas['team']['id'] }}"
            },
            spinnerDelay: 200,
            showMoreText: '⬇️ {{ __('messages.show_more') }}',
            noMoreResultsText: '{{ __('messages.no_more_results') }}'
        });
        @endisset
    });
</script>
@endsection

