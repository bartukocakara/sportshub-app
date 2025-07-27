<?php

namespace App\Services;

use App\Repositories\MatchRepository;

class MatchService extends CrudService
{
    protected MatchRepository $matchRepository;

    /**
     * @param MatchRepository $matchRepository
     * @return void
    */
    public function __construct(MatchRepository $matchRepository)
    {
        $this->matchRepository = $matchRepository;
        parent::__construct($this->matchRepository);
    }
}
