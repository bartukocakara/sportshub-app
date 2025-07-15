<?php

namespace App\Services\Request;

use App\Enums\Request\RequestPrivateChatStatusEnum;
use App\Enums\Request\RequestStatusEnum;
use App\Repositories\Chat\ChatChannelRepository;
use App\Repositories\Chat\ChatMessageRepository;
use App\Repositories\Chat\ChatUserRepository;
use App\Repositories\Chat\PrivateChatUserRepository;
use App\Repositories\Request\RequestPrivateChatRepository;
use App\Services\CrudService;
use Illuminate\Support\Str;

class RequestPrivateChatService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestPrivateChatRepository $requestPrivateChatRepository;

    protected PrivateChatUserRepository $privateChatUserRepository;

    protected ChatChannelRepository $chatChannelRepository;

    protected ChatMessageRepository $chatMessageRepository;

    protected ChatUserRepository $chatUserRepository;

    /**
     * @param RequestPrivateChatRepository $requestPrivateChatRepository
     * @param PrivateChatUserRepository $privateChatUserRepository
     * @param ChatChannelRepository $chatChannelRepository
     * @param ChatMessageRepository $chatMessageRepository
     * @param ChatUserRepository $chatUserRepository
     * @return void
    */
    public function __construct(RequestPrivateChatRepository $requestPrivateChatRepository, PrivateChatUserRepository $privateChatUserRepository, ChatChannelRepository $chatChannelRepository,
                                ChatMessageRepository $chatMessageRepository, ChatUserRepository $chatUserRepository)
    {
        $this->requestPrivateChatRepository = $requestPrivateChatRepository;
        $this->privateChatUserRepository = $privateChatUserRepository;
        $this->chatChannelRepository = $chatChannelRepository;
        $this->chatMessageRepository = $chatMessageRepository;
        $this->chatUserRepository = $chatUserRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestPrivateChatRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }

    /**
     * @param array $datas
     * @param int|string $id
     * @return bool
    */
    public function update(array $datas, int|string $id) : bool
    {
        $requestPrivateChatUpdate = $this->requestPrivateChatRepository->update( $datas, $id);
        if($datas['status'] == RequestStatusEnum::ACCEPTED &&
           $requestPrivateChatUpdate)
        {
            $requestPrivateChat = $this->requestPrivateChatRepository->find($id);

            # Private chat user create
            $privateChatUserCreateRow = [
                'user1_id' => $requestPrivateChat->receiver_user_id,
                'user2_id' => $requestPrivateChat->requested_user_id,
            ];
            $privateChatUser = $this->privateChatUserRepository->create($privateChatUserCreateRow);

            # Chat Channel create
            $chatChannelRow = [
                'chattable_type' => 'App\Models\PrivateChatUser',
                'chattable_id' => $privateChatUser->id,
            ];
            $chatChannel = $this->chatChannelRepository->create($chatChannelRow);

            # Chat User Create
            $users = [$requestPrivateChat->receiver_user_id, $requestPrivateChat->requested_user_id];
            $chatUserRows = [];
            foreach ($users as $value) {
                $chatUserRows[] = [
                    'id' => Str::uuid()->toString(),
                    'chat_channel_id' => $chatChannel->id,
                    'user_id' => $value,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            $this->chatUserRepository->insert($chatUserRows);

            # Chat Message Create
            $this->chatMessageRepository->create([
                'chat_user_id' => $chatUserRows[1]['id'],
                'content' => $requestPrivateChat->title
            ]);

            return $requestPrivateChatUpdate;
        }
        return $requestPrivateChatUpdate;

    }
}
