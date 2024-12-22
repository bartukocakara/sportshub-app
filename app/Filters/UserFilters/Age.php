<?php

namespace App\Filters\UserFilters;

use Carbon\Carbon;
use App\Filters\FilterInterface;
use Illuminate\Support\Facades\DB;

class Age implements FilterInterface
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
        $from = Carbon::today()->subYears($value['from']);
        $to = Carbon::today()->subYears(($value['to'])+1);
        $this->query->whereBetween('birth_date', [$to, $from]);
    }
}
