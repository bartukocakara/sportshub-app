<?php

namespace App\Repositories;

use App\Models\City;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CityRepository extends BaseRepository
{
    protected City $city;

    /**
     * @param City $city
     * @return void
    */
    public function __construct(City $city)
    {
        parent::__construct($city);
        $this->city = $city;
    }

    public function getByCountryCode(string $countryCode, array $with = [], bool $useCache = false): Collection
    {
       $cacheKey = $this->getCacheKey('getByCountryCode', ['code' => $countryCode]);

        if ($useCache) {
            return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($countryCode, $with, $useCache) {
                return $this->queryByCountryCode($countryCode, $with, $useCache);
            });
        }

        return $this->queryByCountryCode($countryCode, $with, $useCache);
    }

    private function queryByCountryCode(string $countryCode, array $with = [], bool $useCache = false): Collection
    {
        return $this->city
            ->whereHas('districts.courtAddresses', fn($q) => $q->whereNotNull('district_id'))
            ->orWhereHas('districts.courtBusinesses', fn($q) => $q->whereNotNull('district_id'))
            ->with($with)
            ->whereHas('country', fn($q) => $q->where('code', $countryCode))
            ->get();
    }
}
