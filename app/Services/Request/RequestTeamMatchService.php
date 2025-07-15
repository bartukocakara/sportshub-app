<?php

namespace App\Services\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\RequestTeamMatch;
use App\Repositories\Chat\ChatChannelRepository;
use App\Repositories\Chat\ChatUserRepository;
use App\Repositories\Match\MatchOwnerRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Services\CrudService;
use App\Repositories\Request\RequestTeamMatchRepository;
use App\Repositories\TeamMatch\TeamMatchRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RequestTeamMatchService extends CrudService
{
    protected TeamMatchRepository $playerTeamRepository;
    protected MatchOwnerRepository $matchOwnerRepository;

    protected RequestReceiverRepository $requestReceiverRepository;

    protected ChatChannelRepository $chatChannelRepository;

    protected ChatUserRepository $chatUserRepository;
    protected RequestTeamMatchRepository $requestTeamMatchRepository;

    /**
     * @param RequestTeamMatchRepository $requestTeamMatchRepository
     * @return void
    */
    public function __construct(RequestTeamMatchRepository $requestTeamMatchRepository,
                                TeamMatchRepository $playerTeamRepository,
                                RequestReceiverRepository $requestReceiverRepository,
                                ChatChannelRepository $chatChannelRepository,
                                ChatUserRepository $chatUserRepository,
                                MatchOwnerRepository $matchOwnerRepository,
                                )
    {
        $this->requestTeamMatchRepository = $requestTeamMatchRepository;
        $this->playerTeamRepository = $playerTeamRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        $this->chatChannelRepository = $chatChannelRepository;
        $this->chatUserRepository = $chatUserRepository;
        $this->matchOwnerRepository = $matchOwnerRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestTeamMatchRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }

    public function store(array $data) : Model
    {
        $model = $this->requestTeamMatchRepository->create($data);
        $type = $data['type'];
        switch ($type) {
            case 'invite':
                 $this->invite($model, $data);
                break;
            case 'join':
                $this->join($model,$data);
                break;
            default:
                # code...
                break;
        }

        return $model;
    }

    /**
     * join
     *
     * @param  RequestTeamMatch $model
     * @param  array $data
     * @return void
     */
    private function join(RequestTeamMatch $model ,array $data)
    {
        $matchOwners = $this->matchOwnerRepository->getByParams([
            'match_id' => $data['match_id']
        ]);
        $requestReceiverRows = [];
        foreach($matchOwners as $value) {
            $requestReceiverRows[] = [
                'id' => Str::uuid()->toString(),
                'requestable_id' => $model->id,
                'requestable_type' => 'App\Models\RequestTeamMatch',
                'receiver_user_id' => $value->user->id,
                'name' => 'team_match',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $this->requestReceiverRepository->insert($requestReceiverRows);
    }

    /**
     * invite
     *
     * @param  RequestTeamMatch $model
     * @param  array $data
     * @return void
     */
    private function invite(RequestTeamMatch $model, array $data)
    {
        $requestReceiverRow = [
            'id' => Str::uuid()->toString(),
            'requestable_id' => $model->id,
            'requestable_type' => 'App\Models\RequestTeamMatch',
            'receiver_user_id' => $data['requested_user_id'],
            'name' => 'team_match',
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->requestReceiverRepository->insert($requestReceiverRow);
    }

    /**
     * storeMultiple
     *
     * @param array $data
     * @param string $matchId
     * @return bool
     */
    public function storeMultiple(array $data, string $matchId) : void
    {
        $requestTeamMatchRows = [];
        $requestReceiverRows = [];
        foreach ($data['requested_user_ids'] as $requestedUserId) {
            $requestableId = Str::uuid()->toString();
            $requestTeamMatchRows[] = [
                'id' => $requestableId,
                'requested_user_id' => $requestedUserId,
                'requested_team_id' => $data['team_id'],
                'match_id' => $matchId,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'title' => $data['title'],
                'type' => RequestTypeEnum::INVITE->value,
                'created_at' => now(),
                'updated_at' => now()
            ];

            $requestReceiverRows[] = [
                'id' => Str::uuid()->toString(),
                'requestable_id' => $requestableId,
                'requestable_type' => 'App\Models\RequestTeamMatch',
                'receiver_user_id' => $requestedUserId,
                'name' => 'team_match',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        $this->requestTeamMatchRepository->insert($requestTeamMatchRows);
        $this->requestReceiverRepository->insert($requestReceiverRows);
    }

    public function update(array $data, int|string $id) : bool
    {
        $model = $this->requestTeamMatchRepository->find($id);
        $update = $model->update($data);
        if($data['status'] == RequestStatusEnum::ACCEPTED->value) {
            $this->playerTeamRepository->create([
                'user_id' => $model->requested_user_id,
                'team_id' => $model->match_team_id,
            ]);

            $chatChannel = $this->chatChannelRepository->findByChattableId($data['team_id']);
            $this->chatUserRepository->create([
                'user_id' => $model->requested_user_id,
                'chat_channel_id' => $chatChannel->id
            ]);
        }

        return $update;
    }

    public function destroy(string $id) : bool
    {
        $delete = $this->requestTeamMatchRepository->delete($id);
        $this->requestReceiverRepository->deleteByRequestableId($id);

        return $delete;
    }
}
