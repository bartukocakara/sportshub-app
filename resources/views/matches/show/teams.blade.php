@extends('layouts.match.index')

@section('title', __('messages.teams'))
@section('custom-styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css" />
@endsection
@section('content')
<div class="row g-5 g-xxl-8">
    <div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-stack mb-6">
            <div class="d-flex flex-wrap my-2">
                <div class="me-4">
                    <a href="#" class="btn btn-sm btn-light-primary px-4 py-3" data-bs-toggle="modal" data-bs-target="#kt_filter_modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3 5h18v2H3V5zm4 6h10v2H7v-2zm-2 6h14v2H5v-2z"/>
                        </svg>
                        {{ __('messages.filter') }}
                    </a>
                    @if (request()->query())
                    <a href="{{ route('teams.index') }}" class="btn btn-sm btn-light-danger px-4 py-3">
                        <i class="bi bi-x-circle me-2"></i>
                        {{ __('messages.clear_filter') }}
                    </a>
                @endif
                </div>
            </div>
        </div>
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
            @include('components.pagination.default', ['data' => $datas['match_teams']])
            @include('components.matches.match-teams')
        </div>
    </div>
</div>
@endsection
