<?php

namespace App\Services;

use App\Http\Resources\ActivityResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\ActivityRepository;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use Illuminate\Http\Request;

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
        parent::__construct($this->activityRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = [], bool $useCache = false) : array
    {
        $homeData['activities'] = ActivityResource::collection($this->activityRepository->all($request, $with, $useCache))
                                            ->response()
                                            ->getData(true);

        $homeData['sport_types'] = (new SportTypeRepository(new SportType()))->home([], $useCache);
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $homeData['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode);
        return $homeData;
    }
}
