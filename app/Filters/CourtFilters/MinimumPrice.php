<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class MinimumPrice implements FilterInterface
{
    protected $query;

    public function __construct(Builder $query)
    {
        $this->query = $query;
    }

    /**
     * Apply the filter for price range.
     *
     * @param array|string $value
     * @return void
     */
    public function handle($value): void
    {
        $minimumPrice = $value ?? null;
        $maximumPrice = request()->query('maximum_price', null);

        if ($minimumPrice !== null && $maximumPrice !== null) {
            $this->query->whereHas('courtReservationPricings', function ($query) use ($minimumPrice, $maximumPrice) {
                $query->whereRaw(
                    'EXISTS (
                        SELECT 1
                        FROM jsonb_array_elements(hours) AS hour
                        WHERE (hour->>\'price\')::numeric BETWEEN ? AND ?
                    )',
                    [$minimumPrice, $maximumPrice]
                );
            });
        }
    }
}
