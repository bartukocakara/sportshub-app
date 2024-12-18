<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    protected User $user;

    /**
     * @param User $user
     * @return void
    */
    public function __construct(User $user)
    {
        parent::__construct($user);
        $this->user = $user;
    }
}
