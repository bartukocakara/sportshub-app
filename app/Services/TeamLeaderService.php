<?php

namespace App\Services;

use App\Repositories\TeamLeaderRepository;

class TeamLeaderService extends CrudService
{
    protected TeamLeaderRepository $teamLeaderRepository;

    /**
     * @param TeamLeaderRepository $teamLeaderRepository
     * @return void
    */
    public function __construct(TeamLeaderRepository $teamLeaderRepository)
    {
        $this->teamLeaderRepository = $teamLeaderRepository;
        parent::__construct($this->teamLeaderRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
