<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class Title implements FilterInterface
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
        $this->query->where('first_name', 'ilike', "%$value%")
                    ->orWhere('last_name', 'ilike', "%$value%");
    }
}
