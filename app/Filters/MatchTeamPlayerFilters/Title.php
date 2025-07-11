<?php

namespace App\Filters\MatchTeamPlayerFilters;

use App\Filters\FilterInterface;

class Title implements FilterInterface
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
        $this->query->whereHas('user', function($query) use($value){
            $query->where('users.first_name', 'ilike', "%$value%")
                  ->orWhere('users.last_name', 'ilike', "%$value%");
        });
    }
}
