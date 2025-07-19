@extends('layouts.team.index')

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
                    </div>
                    <a href="{{ route('matches.create') }}" class="btn btn-sm btn-success ms-3 px-4 py-3" >
                        {{ __('messages.create_match') }}
                    </a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                    <x-filter :clearRoute="route(Route::currentRouteName(), ['id' => request()->route('id')])" />
                    @php
                        $cityTitles = collect($datas['cities'] ?? [])->pluck('title', 'id')->toArray();
                        $sportTypeTitles = collect($datas['sport_types'] ?? [])->pluck('title', 'id')->toArray();
                    @endphp
                    <x-filter-tags
                        :excludedFilters="['page', 'per_page']"
                        :titleMaps="[
                            'city_id' => $cityTitles,
                            'sport_type_id' => $sportTypeTitles,
                        ]"
                        translationsPrefix="messages"
                    />
                @include('components.pagination.default', ['data' => $datas['matches']])
                <div class="row g-6 g-xl-9 mt-2">
                    @include('components.matches.card-list')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
