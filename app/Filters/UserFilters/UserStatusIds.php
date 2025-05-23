<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class UserStatusIds implements FilterInterface
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
        $this->query->whereIn('user_status_id', $value);
    }
}
