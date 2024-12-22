<?php

namespace App\Filters\UserFilters;

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
        $this->query->whereHas('playerRatings', function ($query) use ($value) {
            $query->select('to_user_id', DB::raw('AVG(rate) as avg_rating'))
                  ->groupBy('to_user_id')
                  ->havingRaw('AVG(rate) between ? and ?', [$value['from'], $value['to']]);
        });
    }

}
