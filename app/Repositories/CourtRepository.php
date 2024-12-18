<?php

namespace App\Repositories;

use App\Models\Court;

class CourtRepository extends BaseRepository
{
    protected Court $court;

    /**
     * @param Court $court
     * @return void
    */
    public function __construct(Court $court)
    {
        parent::__construct($court);
        $this->court = $court;
    }
}
