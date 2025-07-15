<?php

namespace App\Repositories\Request;

use App\Models\RequestReservationMatch;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class RequestReservationMatchRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestReservationMatch $requestReservationMatch;

    /**
     * @param RequestReservationMatch $requestReservationMatch
     * @return void
    */
    public function __construct(RequestReservationMatch $requestReservationMatch)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestReservationMatch);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestReservationMatch = $requestReservationMatch;
    }

    public function deleteByMatchIdAndRequestReservationIds(string $requestReservationId, array $matchIds )
    {
        return $this->model->where('request_reservation_id', $requestReservationId)
                           ->whereIn('match_id', $matchIds)
                           ->delete();
    }

    public function getByRequestReservationId(string $requestReservationId) : Collection
    {
        return $this->model->where('request_reservation_id', $requestReservationId)->get();
    }
}
