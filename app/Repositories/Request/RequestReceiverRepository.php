<?php

namespace App\Repositories\Request;

use App\Models\RequestReceiver;
use App\Repositories\BaseRepository;

class RequestReceiverRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestReceiver $requestReceiver;

    /**
     * @param RequestReceiver $requestReceiver
     * @return void
    */
    public function __construct(RequestReceiver $requestReceiver)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestReceiver);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestReceiver = $requestReceiver;
    }

    public function deleteByRequestableId($requestableId) : bool
    {
        return $this->requestReceiver->where('requestable_id', $requestableId)->delete();
    }

    public function deleteByRequestableIds(array $requestableIds)
    {
        return $this->requestReceiver->whereIn('requestable_id', $requestableIds)->delete();
    }
}
