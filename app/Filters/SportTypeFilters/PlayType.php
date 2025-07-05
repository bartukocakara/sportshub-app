<?php

namespace App\Filters\SportTypeFilters;

use App\Filters\FilterInterface;

class PlayType implements FilterInterface
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
        $this->query->where('play_type', $value);
    }
}
