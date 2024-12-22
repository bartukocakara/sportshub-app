<?php

namespace App\Filters\UserFilters;

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
        $this->query->whereHas('userActiveAddress', function($query) use($minLatitude, $maxLatitude, $minLongitude, $maxLongitude) {
            $query->whereBetween('user_addresses.latitude', [$minLatitude, $maxLatitude])
                ->whereBetween('user_addresses.longitude', [$minLongitude, $maxLongitude]);

        });
    }
}
