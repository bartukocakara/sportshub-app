<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends BaseRepository
{
    protected Country $country;

    /**
     * @param Country $country
     * @return void
    */
    public function __construct(Country $country)
    {
        parent::__construct($country);
        $this->country = $country;
    }
}
