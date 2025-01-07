<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Collection;

class CityRepository extends BaseRepository
{
    protected City $city;

    /**
     * @param City $city
     * @return void
    */
    public function __construct(City $city)
    {
        parent::__construct($city);
        $this->city = $city;
    }

    public function getByCountryCode(string $countryCode): Collection
    {
        return $this->city
            ->whereHas('districts.courtAddresses', function ($query) {
                $query->whereNotNull('district_id');
            })
            ->orWhereHas('districts.courtBusinesses', function ($query) {
                $query->whereNotNull('district_id');
            })
            ->with(['districts.courtAddresses', 'districts.courtBusinesses'])
            ->whereHas('country', function ($query) use ($countryCode) {
                $query->where('code', $countryCode);
            })
            ->get();
    }
}
