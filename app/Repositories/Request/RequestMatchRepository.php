<?php

namespace App\Repositories\Request;

use App\Models\RequestMatch;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RequestMatchRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestMatch $requestMatch;

    /**
     * @param RequestMatch $report
     * @return void
    */
    public function __construct(RequestMatch $requestMatch)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestMatch);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestMatch = $requestMatch;
    }
}
