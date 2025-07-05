<?php

namespace App\Services;

use App\Repositories\PlayerTeamRepository;

class PlayerTeamService extends CrudService
{
    protected PlayerTeamRepository $playerTeamRepository;

    /**
     * @param PlayerTeamRepository $playerTeamRepository
     * @return void
    */
    public function __construct(PlayerTeamRepository $playerTeamRepository)
    {
        $this->playerTeamRepository = $playerTeamRepository;
        parent::__construct($this->playerTeamRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
