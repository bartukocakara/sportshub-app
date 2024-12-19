<?php

namespace App\Repositories;

use App\Models\CourtBusiness;

class CourtBusinessRepository extends BaseRepository
{
    protected CourtBusiness $courtBusiness;

    /**
     * @param CourtBusiness $courtBusiness
     * @return void
    */
    public function __construct(CourtBusiness $courtBusiness)
    {
        parent::__construct($courtBusiness);
        $this->courtBusiness = $courtBusiness;
    }
}
