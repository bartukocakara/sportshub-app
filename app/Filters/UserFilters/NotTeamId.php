<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class NotTeamId implements FilterInterface
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
        $this->query->whereHas('teams', function($query) use($value) {
            $query->where('team_id', '!=', $value);
        });
    }
}
