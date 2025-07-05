<?php

namespace App\Repositories;

use App\Models\TeamLeader;

class TeamLeaderRepository extends BaseRepository
{
    protected TeamLeader $teamLeader;

    /**
     * @param TeamLeader $teamLeader
     * @return void
    */
    public function __construct(TeamLeader $teamLeader)
    {
        parent::__construct($teamLeader);
        $this->teamLeader = $teamLeader;
    }
}
