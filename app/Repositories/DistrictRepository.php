<?php

namespace App\Repositories;

use App\Models\District;
use Illuminate\Support\Collection;

class DistrictRepository extends BaseRepository
{
    protected District $district;

    /**
     * @param District $district
     * @return void
    */
    public function __construct(District $district)
    {
        parent::__construct($district);
        $this->district = $district;
    }

    public function getByCityId(string $id) : Collection
    {
        return $this->district->where('city_id', $id)->get();
    }

    /**
     * Get districts with CourtAddress or CourtBusiness associations.
     *
     * @param string $cityId
     * @return Collection
     */
    public function getWithCourtAssociations(string $cityId): Collection
    {
        return $this->district
            ->where('city_id', $cityId)
            ->where(function ($query) {
                $query->whereHas('courtAddresses', function ($subQuery) {
                    $subQuery->whereNotNull('district_id');
                })
                ->orWhereHas('courtBusinesses', function ($subQuery) {
                    $subQuery->whereNotNull('district_id');
                });
            })
            ->with(['courtAddresses', 'courtBusinesses'])
            ->get();
    }
}
