<?php

namespace App\Filters\ActivityFilters;

use App\Filters\FilterInterface;

class CauserId implements FilterInterface
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
        $this->query->where('causer_id', $value);
    }
}
