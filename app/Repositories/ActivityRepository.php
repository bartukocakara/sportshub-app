<?php

namespace App\Repositories;

use App\Models\Activity;

class ActivityRepository extends BaseRepository
{
    protected Activity $activity;

    /**
     * @param Activity $activity
     * @return void
    */
    public function __construct(Activity $activity)
    {
        parent::__construct($activity);
        $this->activity = $activity;
    }
}
