<?php

namespace App\Repositories;

use App\Models\MatchOwner;

class MatchOwnerRepository extends BaseRepository
{
    protected MatchOwner $matchOwner;

    /**
     * @param MatchOwner $matchOwner
     * @return void
    */
    public function __construct(MatchOwner $matchOwner)
    {
        parent::__construct($matchOwner);
        $this->matchOwner = $matchOwner;
    }
}
