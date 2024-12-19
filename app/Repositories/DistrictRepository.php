<?php

namespace App\Repositories;

use App\Models\District;

class DistrictRepository extends BaseRepository
{
    protected District $district;

    /**
     * @param District $district
     * @return void
    */
    public function __construct(District $district)
    {
        parent::__construct($district);
        $this->district = $district;
    }
}
