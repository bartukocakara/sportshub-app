<?php

namespace App\Filters\AnnouncementFilters;

use App\Filters\FilterInterface;

class SubjectType implements FilterInterface
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
        $this->query->where('subject_type', "App\\Models\\$value");
    }
}
