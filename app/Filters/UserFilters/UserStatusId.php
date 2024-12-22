<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class UserStatusId implements FilterInterface
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
        $this->query->where('user_status_id', $value);
    }
}
