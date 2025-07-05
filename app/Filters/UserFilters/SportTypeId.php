<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class SportTypeId implements FilterInterface
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
        $this->query->whereHas('sportTypes', function($query) use($value) {
                $query->where('sport_types.id', $value);
            });
    }
}
