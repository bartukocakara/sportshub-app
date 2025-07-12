<?php

namespace App\Repositories;

use App\Models\MatchTeam;

class MatchTeamRepository extends BaseRepository
{
    protected MatchTeam $matchTeam;

    /**
     * @param MatchTeam $matchTeam
     * @return void
    */
    public function __construct(MatchTeam $matchTeam)
    {
        parent::__construct($matchTeam);
        $this->matchTeam = $matchTeam;
    }
}
