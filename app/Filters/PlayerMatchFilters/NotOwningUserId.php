<?php

namespace App\Filters\PlayerMatchFilters;

use App\Filters\FilterInterface;

class NotOwningUserId implements FilterInterface
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
        $this->query->whereDoesntHave('matchOwners', function ($query) use ($value) {
            $query->where('match_owners.user_id', $value);
        });
    }
}
