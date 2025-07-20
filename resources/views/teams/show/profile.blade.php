@extends('layouts.team.index')
@section('custom-styles')
<style>
    /* Scroll-to-top button – sadece masaüstü görsün */
    #scrollTopDesktop {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 100;
        display: none; /* Default olarak gizli */
    }

    @media (min-width: 768px) {
        #scrollTopDesktop {
            display: flex; /* Sadece masaüstünde göster */
        }
    }
</style>
@endsection
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
                                 <a href="{{ route('teams.index') }}" class="text-gray-500 text-hover-primary">
                                    {{ __('messages.teams') }}
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
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @include('components.team.show.details')
            </div>
        </div>
        @isset($datas['announcements'])
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="d-flex flex-row">
                    <div class="w-100 flex-lg-row-fluid mx-lg-13">
                        <div class="mb-10" id="kt_social_feeds_posts">
                            <div>
                                <h2 class="fw-bold fs-2 text-gray-900">{{ __('messages.announcements') }}</h2>
                            </div>
                            <div id="announcement-list">
                                @include('components.announcements.card-list', ['announcements' => $datas['announcements']['data']])
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
                    </div>
                </div>
            </div>
        </div>
        @endisset
        <div class="d-md-none position-fixed bottom-0 start-0 end-0 bg-white shadow py-2 px-4 z-index-50 d-flex gap-2">
            <button onclick="scrollToAnnouncements()" class="btn btn-secondary w-100 fw-semibold py-3" style="background-color:#F4F4F4">
                📢 {{ __('messages.go_to_announcements') }}
            </button>
            <button id="scrollTopButton" class="btn btn-light fw-semibold d-flex align-items-center justify-content-center" style="width: 56px; height: 100%; font-size: 1.5rem;">
                ⬆️
            </button>
            <button id="openSidebarButton" class="btn btn-light fw-semibold d-flex align-items-center justify-content-center" style="width: 56px; height: 100%; font-size: 1.5rem;">
                ☰
            </button>
        </div>
        <button id="kt_app_sidebar_mobile_toggle" class="d-none"></button>
    </div>
    @include('components.team.modals.edit-profile-modal')
    <div id="scrollTopDesktop">
    <button onclick="scrollToTop()" class="btn btn-icon shadow rounded-circle"
            style="background-color:#f4f4f4 color: white; width: 48px; height: 48px; font-size: 1.2rem;">
        ⬆️
    </button>
</div>
@endsection

@section('page-scripts')
<script>
    let currentPage = {{ $datas['announcements']['meta']['current_page'] ?? 1 }};
    const lastPage = {{ $datas['announcements']['meta']['last_page'] ?? 1 }};
    let isLoading = false;

    async function loadMoreAnnouncements() {
        if (isLoading || currentPage >= lastPage) return;

        isLoading = true;
        currentPage++;

        const spinner = document.getElementById('spinner');
        spinner.classList.remove('d-none');

        try {
            const response = await fetch(`{{ url()->current() }}?page=${currentPage}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            const html = await response.text();
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            const newAnnouncements = tempDiv.querySelector('#announcement-list')?.innerHTML;

            if (newAnnouncements) {
                document.getElementById('announcement-list').insertAdjacentHTML('beforeend', newAnnouncements);
            }

            // Hide the button if no more pages are available
            if (currentPage >= lastPage) {
                document.getElementById('showMoreButton')?.parentElement.remove();
            }
        } catch (e) {
            console.error('Duyurular yüklenirken hata:', e);
        }

        spinner.classList.add('d-none');
        isLoading = false;
    }

    document.getElementById('showMoreButton')?.addEventListener('click', loadMoreAnnouncements);

    function scrollToAnnouncements() {
        const el = document.getElementById('kt_social_feeds_posts');
        if (el) {
            const offset = -100;
            const y = el.getBoundingClientRect().top + window.pageYOffset + offset;
            window.scrollTo({ top: y, behavior: 'smooth' });
        }
    }

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.getElementById('openSidebarButton')?.addEventListener('click', function () {
        document.querySelector('#kt_app_sidebar_mobile_toggle')?.click();
    });

    document.getElementById('scrollTopButton')?.addEventListener('click', scrollToTop);

    window.addEventListener('scroll', function () {
        const desktopBtn = document.getElementById('scrollTopDesktop');
        if (window.scrollY > 300) {
            desktopBtn?.classList.remove('d-none');
        } else {
            desktopBtn?.classList.add('d-none');
        }
    });
    document.addEventListener("DOMContentLoaded", function () {
        const isMobile = window.innerWidth < 768;
        if (isMobile) {R
            const btn = document.getElementById('scrollTopDesktop');
            if (btn) btn.remove(); // tamamen DOM'dan kaldır
        }
    });
</script>
@endsection
