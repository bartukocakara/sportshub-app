<?php

namespace App\Filters\PlayerFilters;

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
        $this->query->whereHas('userActiveAddress.district', function ($query) use ($value) {
            $query->where('city_id', $value);
        });
    }
}
