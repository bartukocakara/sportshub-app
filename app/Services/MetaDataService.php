<?php

namespace App\Services;

use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MetaDataService
{
    public function __construct(
        protected CityRepository $cityRepository,
        protected SportTypeRepository $sportTypeRepository
    ) {}

    public function getSportTypes(): Collection
    {
        return $this->sportTypeRepository->home();
    }

    public function getCitiesByRequest(): Collection
    {
        $locale = request()->server('HTTP_ACCEPT_LANGUAGE', 'tr-TR');
        $countryCode = $this->extractCountryCode($locale);

        return $this->cityRepository->getByCountryCode($countryCode);
    }

    protected function extractCountryCode(string $locale): string
    {
        return strtoupper(substr($locale, -2));
    }
}

