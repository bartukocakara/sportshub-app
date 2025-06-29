<?php

namespace App\Repositories;

use App\Models\Matches;

class MatchRepository extends BaseRepository
{
    protected Matches $matches;

    /**
     * @param Matches $matches
     * @return void
    */
    public function __construct(Matches $matches)
    {
        parent::__construct($matches);
        $this->matches = $matches;
    }
}
