<?php

namespace App\Filters\CourtReservationPricingFilters;

use App\Filters\FilterInterface;

class DayName implements FilterInterface
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
        $this->query->where('day_of_week', $value);
    }
}
