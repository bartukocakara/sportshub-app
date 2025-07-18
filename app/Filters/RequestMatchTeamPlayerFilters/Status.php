<?php

namespace App\Filters\RequestMatchTeamPlayerFilters;

use App\Filters\FilterInterface;

class Status implements FilterInterface
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
        $this->query->where('status', $value);
    }
}
