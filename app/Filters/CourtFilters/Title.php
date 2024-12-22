<?php

namespace App\Filters\CourtFilters;

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
        $this->query->where(function($query) use ($value) {
            $query->where('title', 'ilike', "%$value%")
                ->orwhereHas('district', function($query) use ($value) {
                        $query->where('title', 'ilike', "%$value%")
                            ->orWhereHas('city', function($query) use ($value) {
                                $query->where('description', 'ilike', "%$value%");
                            });
                    });
                });
        // sleep(2);
    }
}
