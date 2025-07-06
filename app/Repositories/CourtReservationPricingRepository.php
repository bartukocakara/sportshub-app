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

    public function all(Request $request, array $with = [], bool $useCache = false): LengthAwarePaginator|Collection
    {
        return $this->courtReservationPricing->with($with)->filterBy($request->all(), $with);
    }

    public function checkAvailablitiy(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->courtReservationPricing->with([ 'court.reservations' ])->filterBy($request->all());
    }

    public function findByIds(array $courtReservationPricings) : Collection|array
    {
        return $this->courtReservationPricing->whereIn('id', $courtReservationPricings)->get();
    }

    public function getByParams(array $params) : Collection
    {
        return $this->courtReservationPricing->where($params)->get();
    }

    public function priceCheck(array $params)
    {
    // Get the reservation based on court_id and day_of_week
    $reservation = $this->courtReservationPricing
        ->where('court_id', $params['court_id'])
        ->where('day_of_week', $params['day_of_week'])
        ->whereRaw("EXISTS (
            SELECT 1
            FROM jsonb_array_elements(hours) AS hour
            WHERE hour->>'from_hour' = ?
        )", [$params['from_hour']])
        ->first(); // Use first() to get a single result

    if ($reservation) {
        // Extract the price based on the from_hour
        $price = collect($reservation->hours) // Assuming hours is already an array
            ->firstWhere('from_hour', $params['from_hour'])['price'] ?? null;

        // Return the price or null if not found
        return $price;
    }

    return null; // Return null if no reservation was found
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
