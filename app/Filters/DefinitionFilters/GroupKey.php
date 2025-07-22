<?php

namespace App\Filters\DefinitionFilters;

use App\Filters\FilterInterface;

class GroupKey implements FilterInterface
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
        $this->query->where('group_key', $value);
    }
}
