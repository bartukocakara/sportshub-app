<?php

namespace App\Repositories;

use App\Models\Announcement;

class AnnouncementRepository extends BaseRepository
{
    protected Announcement $announcement;

    /**
     * @param Announcement $announcement
     * @return void
    */
    public function __construct(Announcement $announcement)
    {
        parent::__construct($announcement);
        $this->announcement = $announcement;
    }
}
