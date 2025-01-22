<?php

namespace App\Filters\ReservationFilters;

use App\Filters\FilterInterface;

class UserId implements FilterInterface
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
        $this->query->where('user_id', $value);
    }
}
