<?php

namespace App\Repositories\Request;

use App\Models\RequestReservation;
use App\Repositories\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RequestReservationRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestReservation $requestReservation;

    /**
     * @param RequestReservation $requestReservation
     * @return void
    */
    public function __construct(RequestReservation $requestReservation)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestReservation);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestReservation = $requestReservation;
    }

    /**
     * Kaynaktan bir liste görüntüler.
     *
     * @param Request $request
     * @return LengthAwarePaginator|EloquentCollection
     */
    public function all(Request $request): LengthAwarePaginator|EloquentCollection
    {
        // dd($this->model->with(['reservation.court', 'requestedUser'])->get());
        return $this->model->with(['reservation.court', 'requestedUser', 'matches'])->filterBy($request->all());

    }

    /**
     * Bir kaynağı görüntülemek için kullanılır.
     *
     * @param int|string $id
     * @return Model
    */
    public function find(int|string $id) : Model
    {
        return $this->model->with(['reservation.court', 'requestedUser'])->findOrFail($id);
    }

    public function deleteByIds(array $ids) : bool
    {
        return $this->model->whereIn('id', $ids)->delete();
    }

    public function getReservationsByIds(array $ids) : Collection
    {
        return $this->model->whereIn('id', $ids)->with('reservation')->get();
    }

    public function findReservationById(string $id) : Collection
    {
        return $this->model->whereIn('id', $id)->with('reservation')->first();
    }
}
