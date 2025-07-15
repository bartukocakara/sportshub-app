<?php

namespace App\Repositories\Request;

use App\Models\RequestCreateCourt;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RequestCreateCourtRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestCreateCourt $requestCreateCourt;

    /**
     * @param RequestCreateCourt $requestCreateCourt
     * @return void
    */
    public function __construct(RequestCreateCourt $requestCreateCourt)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestCreateCourt);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestCreateCourt = $requestCreateCourt;
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return LengthAwarePaginator|Collection
     */
    public function all( Request $request): LengthAwarePaginator|Collection
    {
        return $this->requestCreateCourt->with(['requestedUser', 'court.courtImage'])->filterBy($request->all());
    }
}
