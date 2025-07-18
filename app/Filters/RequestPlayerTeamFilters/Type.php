<?php

namespace App\Filters\RequestPlayerTeamFilters;

use App\Filters\FilterInterface;

class Type implements FilterInterface
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
        $this->query->where('type', $value);
    }
}
