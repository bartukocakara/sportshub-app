<?php

namespace App\Repositories;

use App\Models\SportType;

class SportTypeRepository extends BaseRepository
{
    protected SportType $sportType;

    /**
     * @param SportType $sportType
     * @return void
    */
    public function __construct(SportType $sportType)
    {
        parent::__construct($sportType);
        $this->sportType = $sportType;
    }
}
