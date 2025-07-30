@extends('layouts.match.index')

@section('title', __('messages.teams'))
@section('custom-styles')
    <style>
        /* Grid for Teams */
        .team-grid {
            display: grid;
            grid-template-columns: 1fr; /* grid-cols-1 */
            gap: 32px; /* gap-8 */
        }
        @media (min-width: 768px) { /* md breakpoint */
            .team-grid {
                grid-template-columns: repeat(2, 1fr); /* md:grid-cols-2 */
            }
        }
        @media (min-width: 1024px) { /* lg breakpoint */
            .team-grid {
                grid-template-columns: repeat(2, 1fr); /* lg:grid-cols-2 */
            }
        }

        /* Individual Team Card */
        .team-card {
            border-radius: 12px; /* rounded-xl */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* shadow-lg */
            padding: 24px; /* p-6 */
            border: 1px solid #e5e7eb; /* border border-gray-200 */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .team-card h2 {
            font-size: 24px; /* text-xl */
            font-weight: 700; /* font-bold */
            color: #1f2937; /* text-gray-800 */
            margin-bottom: 16px; /* mb-4 */
            text-align: center;
        }

        /* Grid for Players within a Team */
        .player-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* grid-cols-2 */
            gap: 16px; /* gap-4 */
            width: 100%;
            justify-content: center;
            margin-top: 16px; /* mt-4 */
        }
        @media (min-width: 640px) { /* sm breakpoint */
            .player-grid {
                grid-template-columns: repeat(3, 1fr); /* sm:grid-cols-3 */
            }
        }
        @media (min-width: 1024px) { /* lg breakpoint */
            .player-grid {
                grid-template-columns: repeat(4, 1fr); /* lg:grid-cols-4 */
            }
        }
        @media (min-width: 1280px) { /* xl breakpoint */
            .player-grid {
                grid-template-columns: repeat(5, 1fr); /* xl:grid-cols-5 */
            }
        }

        /* Individual Player Card */
        .player-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .player-avatar {
            width: 80px; /* w-20 */
            height: 80px; /* h-20 */
            border-radius: 9999px; /* rounded-full */
            overflow: hidden;
            border: 4px solid; /* border-2 */
            cursor: pointer;
        }
        .player-avatar.blue-border {
            border-color: #60a5fa; /* border-blue-400 */
        }
        .player-avatar.red-border {
            border-color: #f87171; /* border-red-400 */
        }

        .player-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .player-name {
            margin-top: 8px; /* mt-2 */
        }

        .player-name a {
            font-weight: 500;
            font-size: 13px;
            transition: color 0.2s ease-in-out;
        }

        .player-name a:hover {
            color: #2563eb; /* hover:text-blue-600 */
        }
    </style>

@endsection
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
                        <a href="{{ route('matches.match-teams.create', ['id' => $datas['match']->id]) }}" class="btn btn-sm btn-success ms-3 px-4 py-3">
                            {{ __('messages.create_match_team') }}
                        </a>
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
                                            <div class="player-card">
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
                ghostClass: 'sortable-ghost',
                onEnd: function (evt) {
                    const fromTeam = evt.from.id;
                    const toTeam = evt.to.id;
                    const movedPlayerEl = evt.item;
                    const userId = movedPlayerEl.getAttribute('data-user-id');

                    console.log('Moved user ID:', userId);
                    console.log('From team:', fromTeam, 'To team:', toTeam);

                    /*
                    fetch('/api/match-teams/move-player', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            user_id: userId,
                            from_team_id: fromTeam.replace('team-', ''),
                            to_team_id: toTeam.replace('team-', '')
                        })
                    });
                    */
                }
            });
        });
    });
</script>
@endsection
