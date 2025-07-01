<?php

namespace App\Filters\TeamFilters;

use App\Filters\FilterInterface;

class MaxPlayer implements FilterInterface
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
        $this->query->where('max_player', $value);
    }
}
