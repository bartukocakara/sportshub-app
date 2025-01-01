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
        return $this->city->with(['country'])->whereHas('country', function($query) use($countryCode) {
            $query->where('code', $countryCode);
        })->get();
    }
}
