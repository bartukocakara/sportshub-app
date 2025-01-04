<?php

namespace App\Repositories;

use App\Models\CourtAddress;

class CourtAddressRepository extends BaseRepository
{
    protected CourtAddress $courtAddress;

    /**
     * @param CourtAddress $courtAddress
     * @return void
    */
    public function __construct(CourtAddress $courtAddress)
    {
        parent::__construct($courtAddress);
        $this->courtAddress = $courtAddress;
    }
}
