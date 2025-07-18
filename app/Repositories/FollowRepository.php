<?php

namespace App\Repositories;

use App\Models\Follow;

class FollowRepository extends BaseRepository
{
    protected Follow $follow;

    /**
     * @param Follow $follow
     * @return void
    */
    public function __construct(Follow $follow)
    {
        parent::__construct($follow);
        $this->follow = $follow;
    }
}
