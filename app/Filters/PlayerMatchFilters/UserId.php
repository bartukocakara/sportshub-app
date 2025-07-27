<?php

namespace App\Filters\PlayerMatchFilters;

use App\Filters\FilterInterface;

class UserId implements FilterInterface
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Uygulama methodu.
     *
     * @param string $value
     * @return void
    */
    public function handle($value): void
    {
        $this->query->whereHas('matchTeams.matchTeamPlayers', function ($query) use ($value) {
            $query->where('match_team_players.user_id', $value);
        });
    }
}
