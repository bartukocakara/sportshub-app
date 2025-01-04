<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;

class DistrictId implements FilterInterface
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
        $this->query->whereHas('courtBusiness', function ($query) use ($value) {
            $query->where('district_id', $value);
        })
        ->orWhereHas('courtAddress', function ($query) use ($value) {
            $query->where('district_id', $value);
        });
    }
}
