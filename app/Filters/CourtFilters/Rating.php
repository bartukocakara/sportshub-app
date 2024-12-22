<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;
use Illuminate\Support\Facades\DB;

class Rating implements FilterInterface
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
        $this->query->whereHas('courtRatings', function ($query) use ($value) {
            $query->select('court_id', DB::raw('AVG(rate) as avg_rating'))
                  ->groupBy('court_id')
                  ->havingRaw('AVG(rate) between ? and ?', [$value['from'], $value['to']]);
        });
    }

}
