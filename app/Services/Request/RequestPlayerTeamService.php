<?php

namespace App\Services\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\RequestPlayerTeam;
use App\Repositories\Chat\ChatChannelRepository;
use App\Repositories\Chat\ChatUserRepository;
use App\Services\CrudService;
use App\Repositories\Player\PlayerTeamRepository;
use App\Repositories\Request\RequestPlayerTeamRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Repositories\Team\TeamLeaderRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RequestPlayerTeamService extends CrudService
{
    protected PlayerTeamRepository $playerTeamRepository;
    protected TeamLeaderRepository $teamLeaderRepository;

    protected RequestPlayerTeamRepository $requestPlayerTeamRepository;
    protected RequestReceiverRepository $requestReceiverRepository;

    protected ChatChannelRepository $chatChannelRepository;

    protected ChatUserRepository $chatUserRepository;

    public function __construct(RequestPlayerTeamRepository $requestPlayerTeamRepository,
                                PlayerTeamRepository $playerTeamRepository,
                                ChatChannelRepository $chatChannelRepository,
                                ChatUserRepository $chatUserRepository,
                                TeamLeaderRepository $teamLeaderRepository,
                                RequestReceiverRepository $requestReceiverRepository)
    {
        $this->requestPlayerTeamRepository = $requestPlayerTeamRepository;
        $this->playerTeamRepository = $playerTeamRepository;
        $this->chatChannelRepository = $chatChannelRepository;
        $this->chatUserRepository = $chatUserRepository;
        $this->teamLeaderRepository = $teamLeaderRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        parent::__construct($this->requestPlayerTeamRepository);
    }

    public function store(array $data) : Model
    {
        $model = $this->requestPlayerTeamRepository->create($data);
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
     * @param  RequestPlayerTeam $model
     * @param  array $data
     * @return void
     */
    private function join(RequestPlayerTeam $model ,array $data)
    {
        $teamLeaders = $this->teamLeaderRepository->getByParams([
            'team_id' => $data['team_id']
        ]);
        $requestReceiverRows = [];
        foreach($teamLeaders as $value) {
            $requestReceiverRows[] = [
                'id' => Str::uuid()->toString(),
                'requestable_id' => $model->id,
                'requestable_type' => 'App\Models\RequestPlayerTeam',
                'name' => 'player_team',
                'receiver_user_id' => $value->user->id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $this->requestReceiverRepository->insert($requestReceiverRows);
    }

    /**
     * invite
     *
     * @param  RequestPlayerTeam $model
     * @param  array $data
     * @return void
     */
    private function invite(RequestPlayerTeam $model, array $data)
    {
        $requestReceiverRow = [
            'id' => Str::uuid()->toString(),
            'requestable_id' => $model->id,
            'requestable_type' => 'App\Models\RequestPlayerTeam',
            'receiver_user_id' => $data['requested_user_id'],
            'name' => 'player_team',
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->requestReceiverRepository->insert($requestReceiverRow);
    }

    /**
     * storeMultiple
     *
     * @param array $data
     * @param string $teamId
     * @return bool
     */
    public function storeMultiple(array $data, string $teamId) : void
    {
        $requestPlayerTeamRows = [];
        $requestReceiverRows = [];
        foreach ($data['requested_user_ids'] as $requestedUserId) {
            $requestableId = Str::uuid()->toString();
            $requestPlayerTeamRows[] = [
                'id' => $requestableId,
                'requested_user_id' => $requestedUserId,
                'team_id' => $teamId,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                'title' => $data['title'],
                'type' => RequestTypeEnum::INVITE->value,
                'created_at' => now(),
                'updated_at' => now()
            ];

            $requestReceiverRows[] = [
                'id' => Str::uuid()->toString(),
                'requestable_id' => $requestableId,
                'requestable_type' => 'App\Models\RequestPlayerTeam',
                'receiver_user_id' => $requestedUserId,
                'name' => 'player_team',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        $this->requestPlayerTeamRepository->insert($requestPlayerTeamRows);
        $this->requestReceiverRepository->insert($requestReceiverRows);
    }

    /**
     * update
     *
     * @param array $data
     * @param int|string $id
     * @return bool
     */
    public function update(array $data, int|string $id) : bool
    {
        $model = $this->requestPlayerTeamRepository->find($id);
        $update = $model->update($data);
        if($data['status'] == RequestStatusEnum::ACCEPTED->value) {
            $this->playerTeamRepository->create([
                'user_id' => $model->requested_user_id,
                'team_id' => $model->team_id,
            ]);

            $chatChannel = $this->chatChannelRepository->findByChattableId($model->team_id);
            $this->chatUserRepository->create([
                'user_id' => $model->requested_user_id,
                'chat_channel_id' => $chatChannel->id
            ]);
        }

        return $update;
    }

    public function destroy(string $id) : bool
    {
        $delete = $this->requestPlayerTeamRepository->delete($id);
        $this->requestReceiverRepository->deleteByRequestableId($id);

        return $delete;
    }
}
