<?php

namespace App\Repositories\Request;

use App\Models\RequestCreateCourtBusiness;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class RequestCreateCourtBusinessRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestCreateCourtBusiness $requestCreateCourtBusiness;

    /**
     * @param RequestCreateCourtBusiness $requestCreateCourtBusiness
     * @return void
    */
    public function __construct(RequestCreateCourtBusiness $requestCreateCourtBusiness)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestCreateCourtBusiness);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestCreateCourtBusiness = $requestCreateCourtBusiness;
    }

    /**
     * Kaynaktan bir liste görüntüler.
     *
     * @param Request $request
     * @return LengthAwarePaginator|Collection
    */
    public function all(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->model->with(['requestedUser'])->filterBy($request->all());
    }
}
