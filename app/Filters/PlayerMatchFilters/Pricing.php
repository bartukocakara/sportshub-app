<?php

namespace App\Filters\PlayerMatchFilters;

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
        $this->query->whereBetween('price', [$value['from'], $value['to']]);
    }

}
