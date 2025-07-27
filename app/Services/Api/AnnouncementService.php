<?php

namespace App\Services;

use App\Repositories\AnnouncementRepository;
class AnnouncementService extends CrudService
{
    protected AnnouncementRepository $announcementRepository;

    /**
     * @param AnnouncementRepository $announcementRepository
     * @return void
    */
    public function __construct(AnnouncementRepository $announcementRepository)
    {
        $this->announcementRepository = $announcementRepository;
        parent::__construct($this->announcementRepository);
    }
}
