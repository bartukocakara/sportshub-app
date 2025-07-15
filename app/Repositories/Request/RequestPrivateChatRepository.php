<?php

namespace App\Repositories\Request;

use App\Models\RequestPrivateChat;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RequestPrivateChatRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestPrivateChat $requestPrivateChat;

    /**
     * @param RequestPrivateChat $requestPrivateChat
     * @return void
    */
    public function __construct(RequestPrivateChat $requestPrivateChat)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestPrivateChat);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestPrivateChat = $requestPrivateChat;
    }

     /**
     * all
     *
     * @param  mixed $request
     * @return LengthAwarePaginator|Collection
     */
    public function all( Request $request): LengthAwarePaginator|Collection
    {
        return $this->requestPrivateChat->with([ 'requestedUser' ])
                                        ->filterBy($request->all());
    }

    /**
     * Bir kaynağı görüntülemek için kullanılır.
     *
     * @param int|string $id
     * @return RequestPrivateChat
    */
    public function find(int|string $id) : RequestPrivateChat
    {
        return $this->model->findOrFail($id);
    }
}
