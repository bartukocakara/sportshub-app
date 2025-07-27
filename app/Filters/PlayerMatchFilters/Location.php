<?php

namespace App\Filters\PlayerMatchFilters;

use App\Filters\FilterInterface;

class Location implements FilterInterface
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
        $distance = $value['distance'] ?? 500;
        $minLatitude = $value['latitude'] - ($distance / 111.12);
        $maxLatitude = $value['latitude'] + ($distance / 111.12);
        $minLongitude = $value['longitude'] - $distance / (111.12 * cos(deg2rad($value['latitude'])));
        $maxLongitude = $value['longitude'] + ($distance / (111.12 * cos(deg2rad($value['latitude']))));

        $this->query->whereBetween('latitude', [$minLatitude, $maxLatitude])
                ->whereBetween('longitude', [$minLongitude, $maxLongitude])
                ->get();
    }
}
