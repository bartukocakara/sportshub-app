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

    public function findWithFollowable(string $id): ?Follow
    {
        return $this->follow->with('followable')->find($id);
    }

    public function deleteByFollowable(int $userId, string $followableId, string $followableType): void
    {
        $this->model->where([
            'user_id' => $userId,
            'followable_id' => $followableId,
            'followable_type' => $followableType,
        ])->delete();
    }
}
