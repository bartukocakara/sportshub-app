<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;
use Carbon\Carbon;

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
        // Validate the date
        if (empty($value)) {
            return; // Skip filtering if the date is empty
        }

        // Parse the date to ensure it's in a valid format
        try {
            $date = Carbon::parse($value)->toDateString();
        } catch (\Exception $e) {
            return; // Skip filtering if the date is invalid
        }

        // Get start and end times from the request
        $startTime = $this->formatTime(request()->start_time, '00:00:00'); // Default to start of the day
        $endTime = $this->formatTime(request()->end_time, '23:59:59'); // Default to end of the day

        // Apply the filter
        $this->query->whereDoesntHave('reservations', function ($query) use ($date, $startTime, $endTime) {
            $query->where('date', $date) // Match reservations for the specified date
                  ->where(function ($timeQuery) use ($startTime, $endTime) {
                      $timeQuery->where('from_hour', '<', $endTime) // Overlapping time range
                                ->where('to_hour', '>', $startTime);
                  });
        });
    }

    /**
     * Format the time value.
     *
     * @param string|null $time The time value from the request.
     * @param string $default The default time value.
     * @return string
     */
    protected function formatTime(?string $time, string $default): string
    {
        if (empty($time)) {
            return $default;
        }

        // Ensure the time is in HH:MM:SS format
        if (strlen($time) === 5) { // If the time is in "HH:MM" format
            return $time . ':00';
        }

        return $time; // Assume it's already in the correct format
    }
}
