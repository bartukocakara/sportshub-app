<?php

namespace App\Services;

use App\Http\Resources\AnnouncementResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\AnnouncementRepository;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use Illuminate\Http\Request;

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
        parent::__construct($this->announcementRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        $datas['announcements'] = AnnouncementResource::collection($this->announcementRepository->all($request, $with, false))
                                            ->response()
                                            ->getData(true);

        $datas['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $datas['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode, ['districts.courtAddresses', 'districts.courtBusinesses'], false);
        return $datas;
    }
}
