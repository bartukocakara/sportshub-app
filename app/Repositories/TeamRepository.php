<?php

namespace App\Repositories;

use App\Models\Team;
use Illuminate\Support\Collection;

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

    public function findByTeamIdArray(array $teamIds): Collection|array
    {
        return $this->team->whereIn('id', $teamIds)->with('users')->get();
    }
}
