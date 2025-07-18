<?php

namespace App\Services;

use App\Repositories\FollowRepository;

class FollowService extends CrudService
{
    protected FollowRepository $followRepository;

    /**
     * @param FollowRepository $followRepository
     * @return void
    */
    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
        parent::__construct($this->followRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
