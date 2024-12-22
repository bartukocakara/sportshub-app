<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;
use Illuminate\Support\Facades\DB;

class Pricing implements FilterInterface
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
        $fieldUsageTypes= $value['field_usage_types'] ?? ['FULL'] ;
        $this->query->whereHas('courtMatchPricings', function ($query) use ($value, $fieldUsageTypes) {
            $query->whereBetween('court_reservation_pricings.price', [$value['from'], $value['to']])
                  ->whereIn('field_usage_type', $fieldUsageTypes);
        });
    }

}
