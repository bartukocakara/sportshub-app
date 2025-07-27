<?php

namespace App\Filters\PlayerMatchFilters;

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
                ->orWhereHas('court', function($query) use($value) {
                    $query->whereHas('district', function($query) use ($value) {
                        $query->where('title', 'ilike', "%$value%")
                            ->orWhereHas('city', function($query) use ($value) {
                                $query->where('title', 'ilike', "%$value%");
                            });
                    });
                });
        });
    }
}
