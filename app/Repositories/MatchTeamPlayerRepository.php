<?php

namespace App\Repositories;

use App\Models\MatchTeamPlayer;

class MatchTeamPlayerRepository extends BaseRepository
{
    protected MatchTeamPlayer $matchTeamPlayer;

    /**
     * @param MatchTeamPlayer $matchTeamPlayer
     * @return void
    */
    public function __construct(MatchTeamPlayer $matchTeamPlayer)
    {
        parent::__construct($matchTeamPlayer);
        $this->matchTeamPlayer = $matchTeamPlayer;
    }
}
