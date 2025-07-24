<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class CityId implements FilterInterface
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
        $this->query->whereHas('userActiveAddress', function($query) use($value) {
            $query->where('districts.city_id', $value);
        });
    }
}
