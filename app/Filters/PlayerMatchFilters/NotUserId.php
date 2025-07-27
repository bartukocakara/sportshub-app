<?php

namespace App\Filters\PlayerMatchFilters;

use App\Filters\FilterInterface;

class NotUserId implements FilterInterface
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
        $this->query->whereDoesntHave('matchTeams.matchTeamPlayers', function ($query) use ($value) {
            $query->where('user_id', $value);
        });
    }
}
