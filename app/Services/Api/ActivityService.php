<?php

namespace App\Services;

use App\Repositories\ActivityRepository;

class ActivityService extends CrudService
{
    protected ActivityRepository $activityRepository;

    /**
     * @param ActivityRepository $activityRepository
     * @return void
    */
    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
        parent::__construct($this->activityRepository);
    }
}
