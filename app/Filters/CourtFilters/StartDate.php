<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;
use Carbon\Carbon;

class StartDate implements FilterInterface
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Apply the filter to the query.
     *
     * @param array|string $value An array with 'start_date' and 'end_date' or a single 'start_date'.
     * @return void
     */
    public function handle($value): void
    {
        $startDate = $value['start_date'] ?? null;
        $endDate = $value['end_date'] ?? null;

        if ($endDate === null) {
            $endDate = Carbon::now()->addDays(3)->toDateString(); // Default to 3 days from now if end_date is not provided
        }

        $this->query->whereDoesntHave('reservations', function ($query) use ($startDate, $endDate) {
            if ($startDate) {   
                $query->where('date', '>=', $startDate);
            }
            if ($endDate) {
                $query->where('date', '<=', $endDate);
            }
        });
    }
}
