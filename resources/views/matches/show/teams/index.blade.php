@extends('layouts.match.index')

@section('title', __('messages.teams'))
@section('custom-styles')
<link rel="stylesheet" href="{{ asset('assets/css/match-teams.css') }}">
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
                            <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ __('messages.teams') }}</li>
                        </ul>
                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">
                            {{ __('messages.teams') }}
                        </h1>
                    </div>
                    @if($datas['is_match_owner'])
                    <button type="button"
                            class="btn btn-sm btn-success ms-3 px-4 py-3"
                            data-bs-toggle="modal"
                            data-bs-target="#createTeamModal"
                            data-match-id="{{ $datas['match']->id }}"
                            data-title="{{ __('messages.create_match_team') }}">
                        {{ __('messages.create_match_team') }}
                    </button>
                    <div class="modal fade" id="createTeamModal" tabindex="-1" aria-labelledby="createTeamModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('matches.teams.create', ['id' => $datas['match']->id] ) }}" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createTeamModalLabel">{{ __('messages.create_match_team') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="match_id" id="modalMatchId">
                                    <div class="mb-3">
                                        <label for="teamTitle" class="form-label">{{ __('messages.team_title') }}</label>
                                        <input type="text" name="title" id="teamTitle" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                                    <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('matches.teams.sort', ['id' => $datas['match']->id]) }}" id="teamTransferForm">
                        @csrf
                        <input type="hidden" name="transfers_json" id="transfersInput">
                        @if ($errors->has('transfers_json'))
                            <div class="alert alert-danger mt-4">
                                {{ $errors->first('transfers_json') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-end mt-6">
                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.save_team_changes') }}
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content p-3">
            <div id="kt_app_content_container" class="app-content-container">
                @if($datas['is_match_owner'])
                    <div class="alert alert-info d-flex align-items-center p-4 mb-10">
                        <i class="ki-duotone ki-arrows-move fs-2hx text-info me-4"></i>
                        <div class="d-flex flex-column">
                            <h5 class="mb-1 fw-bold">{{ __('messages.drag_and_drop_players') }}</h5>
                            <span>{{ __('messages.you_can_drag_and_drop_players_between_teams_to_reorganize') }}</span>
                        </div>
                    </div>
                @endif
                <div class="team-grid">
                    @if(isset($datas['match_teams']['data']))
                        @foreach ($datas['match_teams']['data'] as $team)
                            <div class="team-card">
                                <h2 class="text-gray-900 fw-bold fs-3 mb-0 text-center">{{ $team['title'] ?? 'Team Name' }}</h2>
                                <div class="player-grid" id="team-{{ $team['id'] }}">
                                    @if(isset($team['match_team_players']))
                                        @foreach ($team['match_team_players'] as $item)
                                            <div class="player-card" data-user-id="{{ $item['user_id'] }}">
                                                <div class="player-avatar {{ ($loop->parent->index % 2 == 0) ? 'blue-border' : 'red-border' }}">
                                                    <img src="{{ isset($item['avatar']) ? asset('storage/' . $item['avatar']) : 'https://placehold.co/80x80/' . (($loop->parent->index % 2 == 0) ? 'E0F2F7/2C5282' : 'FEE2E2/991B1B') . '?text=' . urlencode($item['full_name'] ?? 'Player') }}" alt="{{ $item['full_name'] ?? 'Player Avatar' }}">
                                                </div>
                                                <div class="player-name">
                                                    <a href="{{ route('users.profile', ['id' => $item['user_id']]) }}">
                                                        {{ $item['full_name'] ?? 'Unknown Player' }}
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p style="text-align: center; color: #6b7280; margin-top: 20px;">{{ __('messages.no_teams_found') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script src="{{ asset('assets/js/sortable.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
    const teamGrids = document.querySelectorAll('.player-grid');
    teamGrids.forEach(grid => {
        new Sortable(grid, {
            group: 'players',
            animation: 150,
            ghostClass: 'sortable-ghost'
        });
    });

    const form = document.getElementById('teamTransferForm');
    const transfersInput = document.getElementById('transfersInput');

    form.addEventListener('submit', function (e) {
        const playerTransfers = [];
        teamGrids.forEach(grid => {
            const teamId = grid.id.replace('team-', '');
            grid.querySelectorAll('.player-card').forEach(player => {
                const userId = player.getAttribute('data-user-id');
                if (userId) {
                    playerTransfers.push({
                        user_id: userId,
                        match_team_id: teamId 
                    });
                }
            });
        });

        transfersInput.value = JSON.stringify(playerTransfers);
    });
});
</script>
@endsection
