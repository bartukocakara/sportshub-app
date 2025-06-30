<?php

namespace App\Repositories;

use App\Models\SportType;
use Illuminate\Support\Collection;

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

    public function home(array $with = [], bool $useCache = false): Collection
    {
        return $this->sportType->all();
    }
}
