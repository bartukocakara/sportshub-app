<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Collection;

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

    public function getByIds(array $ids, array $with = []) : Collection
    {
        return $this->user->whereIn('id', $ids)->with($with)->get();
    }

}
