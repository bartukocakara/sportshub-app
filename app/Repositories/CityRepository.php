<?php

namespace App\Repositories;

use App\Models\City;

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
}
