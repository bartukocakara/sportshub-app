<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserService extends CrudService
{
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     * @return void
    */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct($this->userRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        $homeData['users'] = UserResource::collection($this->userRepository->all($request, $with, false))
                                            ->response()
                                            ->getData(true);

        $homeData['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $homeData['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode, ['districts.courtAddresses', 'districts.courtBusinesses'], false);
        return $homeData;
    }
}
