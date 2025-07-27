<?php

namespace App\Filters\TeamMatchFilters;

use App\Filters\FilterInterface;

class TeamId implements FilterInterface
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
        $this->query->whereHas('teamMatches', function($query) use($value) {
            $query->where('team_id', $value);
        });
    }
}
