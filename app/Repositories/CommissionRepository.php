<?php

namespace App\Repositories;

use App\Models\Commission;

class CommissionRepository extends BaseRepository
{
    protected Commission $commission;

    /**
     * @param Commission $commission
     * @return void
    */
    public function __construct(Commission $commission)
    {
        parent::__construct($commission);
        $this->commission = $commission;
    }
}
