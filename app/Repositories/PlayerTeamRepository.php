<?php

namespace App\Repositories;

use App\Models\PlayerTeam;

class PlayerTeamRepository extends BaseRepository
{
    protected PlayerTeam $playerTeam;

    /**
     * @param PlayerTeam $playerTeam
     * @return void
    */
    public function __construct(PlayerTeam $playerTeam)
    {
        parent::__construct($playerTeam);
        $this->playerTeam = $playerTeam;
    }
}
