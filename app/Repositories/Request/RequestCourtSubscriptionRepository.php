<?php

namespace App\Repositories\Request;

use App\Repositories\BaseRepository;
use App\Models\RequestCourtSubscription;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class RequestCourtSubscriptionRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestCourtSubscription $requestCourtSubscription;

    /**
     * @param RequestCourtSubscription $requestCourtSubscription
     * @return void
    */
    public function __construct(RequestCourtSubscription $requestCourtSubscription)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestCourtSubscription);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestCourtSubscription = $requestCourtSubscription;
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return LengthAwarePaginator|Collection
     */
    public function all( Request $request): LengthAwarePaginator|Collection
    {
        return $this->requestCourtSubscription->with(['requestedUser'])->filterBy($request->all());
    }
}
