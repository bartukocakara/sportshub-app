<?php

namespace App\Repositories;

use App\Models\CourtReservationPricing;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class CourtReservationPricingRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected CourtReservationPricing $courtReservationPricing;

    /**
     * @param CourtReservationPricing $courtReservationPricing
     * @return void
    */
    public function __construct(CourtReservationPricing $courtReservationPricing)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($courtReservationPricing);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->courtReservationPricing = $courtReservationPricing;
    }

    public function all(Request $request): LengthAwarePaginator|Collection
    {
        return $this->courtReservationPricing->with([ 'court.courtBusiness' ])->filterBy($request->all());
    }

    public function findByIds(array $courtReservationPricings) : Collection|array
    {
        return $this->courtReservationPricing->whereIn('id', $courtReservationPricings)->get();
    }

    public function getByParams(array $params) : Collection
    {
        return $this->courtReservationPricing->where($params)->get();
    }

    public function getByCourtIdAndDays(array $params)
    {
        return $this->courtReservationPricing->where(['court_id' => $params['court_id']])
                                             ->whereIn('day_of_week', $params['day_of_weeks'])
                                             ->get();
    }

    public function updateByIds(array $courtReservationPricings, array $updateArray) : bool
    {
        return $this->courtReservationPricing->whereIn('id', $courtReservationPricings)->update($updateArray);
    }
}
