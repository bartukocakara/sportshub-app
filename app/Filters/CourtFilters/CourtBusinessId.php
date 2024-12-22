<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;

class CourtBusinessId implements FilterInterface
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
        $this->query->where('court_business_id', $value);
    }
}
