<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class NotMatchId implements FilterInterface
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
        // $this->query->whereDoesntHave('matchTeamPlayer', function ($query) use ($value) {
        //     $query->whereHas('matchTeam', function ($query) use ($value) {
        //         $query->where('match_id', $value);
        //     });
        // });
        $this->query->whereDoesntHave('matchTeamPlayer.matchTeam', function ($query) use ($value) {
            $query->where('match_id', $value);
        });
    }
}
