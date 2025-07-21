<?php

namespace App\Services;

use App\Models\SportType;
use Illuminate\Support\Str;
use App\Repositories\AnnouncementRepository;
use App\Repositories\Match\MatchRepository;
use App\Repositories\Reservation\ReservationRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\Team\TeamRepository;

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
