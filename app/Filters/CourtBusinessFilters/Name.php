<?php

namespace App\Filters\CourtBusinessFilters;

use App\Filters\FilterInterface;

class Name implements FilterInterface
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
        $this->query->where('name', 'ilike', "%$value%");
    }
}
