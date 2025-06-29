<?php

namespace App\Repositories;

use App\Models\Team;

class TeamRepository extends BaseRepository
{
    protected Team $team;

    /**
     * @param Team $team
     * @return void
    */
    public function __construct(Team $team)
    {
        parent::__construct($team);
        $this->team = $team;
    }
}
