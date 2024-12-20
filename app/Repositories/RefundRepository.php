<?php

namespace App\Repositories;

use App\Models\Refund;

class RefundRepository extends BaseRepository
{
    protected Refund $refund;

    /**
     * @param Refund $refund
     * @return void
    */
    public function __construct(Refund $refund)
    {
        parent::__construct($refund);
        $this->refund = $refund;
    }
}
