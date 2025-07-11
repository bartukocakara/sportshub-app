<?php

namespace App\Filters\MatchTeamPlayerFilters;

use App\Filters\FilterInterface;

class MatchId implements FilterInterface
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
        $this->query->whereHas('matchTeam', function($query) use($value){
            $query->where('match_teams.match_id', $value);
        });
    }
}
