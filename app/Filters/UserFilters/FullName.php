<?php

namespace App\Filters\UserFilters;

use App\Filters\FilterInterface;

class FullName implements FilterInterface
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
        $this->query->where(function ($query) use ($value) {
            $query->where('first_name', 'like', "%{$value}%")
                  ->orWhere('last_name', 'like', "%{$value}%");
        });
    }
}
