<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;

class Date implements FilterInterface
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Apply the filter.
     *
     * @param string $value The date to filter on.
     * @return void
     */
    public function handle($value): void
    {
        $startTime = request()->start_time ? request()->start_time . ':00' : '00:00:00'; // Default to start of the day
        $endTime = request()->end_time ? request()->end_time . ':00' : '23:59:59'; // Default to end of the day

        $this->query->whereDoesntHave('reservations', function ($query) use ($value, $startTime, $endTime) {
            $query->where('date', $value) // Match reservations for the specified date
                  ->where(function ($timeQuery) use ($startTime, $endTime) {
                      $timeQuery->where('from_hour', '<', $endTime) // Overlapping time range
                                ->where('to_hour', '>', $startTime);
                  });
        });
    }
}
