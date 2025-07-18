<?php

namespace App\Filters\RequestMatchFilters;

use App\Filters\FilterInterface;

class RequestedUserId implements FilterInterface
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
        $this->query->where('requested_user_id', $value);
    }
}
