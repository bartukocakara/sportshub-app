<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;

class PriceRange implements FilterInterface
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Apply the filter for price range.
     *
     * @param array $value
     * @return void
     */
    public function handle($value): void
    {
        $minimumPrice = $value['minimum_price'] ?? null;
        $maximumPrice = $value['maximum_price'] ?? null;

        $this->query->whereHas('courtReservationPricings', function ($query) use ($minimumPrice, $maximumPrice) {
            $query->whereJsonContains('hours', function ($hour) use ($minimumPrice, $maximumPrice) {
                return $hour['price'] >= $minimumPrice && $hour['price'] <= $maximumPrice;
            });
        });
    }
}
