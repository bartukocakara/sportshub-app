<?php

namespace App\Services\Request;

use App\Enums\StatusEnums\Player\MAtchTeamPlayerStatusEnum;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\LogSubjectTypeEnums\MatchLogSubjectTypeEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Models\Matches;
use App\Models\MatchLog;
use App\Models\RequestMatchTeamPlayer;
use App\Models\User;
use App\Repositories\Chat\ChatChannelRepository;
use App\Repositories\Chat\ChatUserRepository;
use App\Repositories\Match\MatchLogRepository;
use App\Repositories\MatchTeamPlayerRepository;
use App\Repositories\Player\PlayerRepository;
use App\Services\CrudService;
use App\Repositories\Request\RequestMatchTeamPlayerRepository;
use App\Repositories\Request\RequestReceiverRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RequestMatchTeamPlayerService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestMatchTeamPlayerRepository $requestMatchTeamPlayerRepository;

    protected MatchOwnerRepository $matchOwnerRepository;

    protected RequestReceiverRepository $requestReceiverRepository;

    protected MatchTeamPlayerRepository $matchTeamPlayerRepository;

    protected ChatChannelRepository $chatChannelRepository;

    protected ChatUserRepository $chatUserRepository;

    /**
     * @param RequestMatchTeamPlayerRepository $requestMatchTeamPlayerRepository
     * @return void
    */
    public function __construct(RequestMatchTeamPlayerRepository $requestMatchTeamPlayerRepository,
                                MatchOwnerRepository $matchOwnerRepository,
                                RequestReceiverRepository $requestReceiverRepository,
                                MatchTeamPlayerRepository $matchTeamPlayerRepository,
                                ChatChannelRepository $chatChannelRepository,
                                ChatUserRepository $chatUserRepository)
    {
        $this->requestMatchTeamPlayerRepository = $requestMatchTeamPlayerRepository;
        $this->matchOwnerRepository = $matchOwnerRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        $this->matchTeamPlayerRepository = $matchTeamPlayerRepository;
        $this->chatChannelRepository = $chatChannelRepository;
        $this->chatUserRepository = $chatUserRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestMatchTeamPlayerRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }

    public function store(array $data) : Model
    {
        $model = $this->requestMatchTeamPlayerRepository->create($data);
        $type = $data['type'];
        switch ($type) {
            case RequestTypeEnum::INVITE->value:
                 $this->invite($model, $data);
                break;
            case RequestTypeEnum::JOIN->value:
                $this->join($model, $data);
                break;
            default:
                break;
        }

        return $model;
    }

    /**
     * join
     *
     * @param  RequestMatchTeamPlayer $model
     * @param  array $data
     * @return void
     */
    private function join(RequestMatchTeamPlayer $model, array $data)
    {
        $matchOwners = $this->matchOwnerRepository->getByParams([
            'match_id' => $data['match_id']
        ]);
        $requestReceiverRows = [];
        foreach($matchOwners as $value) {
            $requestReceiverRows[] = [
                'id' => Str::uuid()->toString(),
                'requestable_id' => $model->id,
                'requestable_type' => 'App\Models\RequestMatchTeamPlayer',
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
     * @param  RequestMatchTeamPlayer $model
     * @param  array $data
     * @return void
     */
    private function invite(RequestMatchTeamPlayer $model, array $data)
    {
        $requestReceiverRow = [
            'requestable_id' => $model->id,
            'requestable_type' => 'App\Models\RequestMatchTeamPlayer',
            'receiver_user_id' => $data['user_id'],
            'created_at' => now(),
            'updated_at' => now()
        ];
        $this->requestReceiverRepository->create($requestReceiverRow);
    }

    /**
     * storeMultiple
     *
     * @param  array $data
     * @return bool
     */
    public function storeMultiple(array $data) : void
    {
        $requestMatchTeamPlayerRows = [];
        $requestReceiverRows = [];
        foreach ($data['match_teams'] as $matchTeam) {
            foreach ($matchTeam['requested_user_ids'] as $requestedUserId) {
                $requestableId = Str::uuid()->toString();
                $requestMatchTeamPlayerRows[] = [
                    'id' => $requestableId,
                    'requested_user_id' => $requestedUserId,
                    'match_team_id' => $matchTeam['id'],
                    'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                    'title' => $data['title'],
                    'type' => RequestTypeEnum::INVITE->value,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                $requestReceiverRows[] = [
                    'id' => Str::uuid()->toString(),
                    'requestable_id' => $requestableId,
                    'requestable_type' => 'App\Models\RequestMatchTeamPlayer',
                    'receiver_user_id' => $requestedUserId,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        $this->requestMatchTeamPlayerRepository->insert($requestMatchTeamPlayerRows);
        $this->requestReceiverRepository->insert($requestReceiverRows);
    }

    public function update(array $data, int|string $id) : bool
    {
        $model = $this->requestMatchTeamPlayerRepository->find($id);
        $update = $model->update($data);
        if($data['status'] == RequestStatusEnum::ACCEPTED->value) {
            $this->matchTeamPlayerRepository->create([
                'user_id' => $model->requested_user_id,
                'match_team_id' => $model->match_team_id,
                'match_team_player_status_id' => MatchTeamPlayerStatusEnum::APPROVED
            ]);

            $chatChannel = $this->chatChannelRepository->findByChattableId($data['match_id']);
            $this->chatUserRepository->create([
                'user_id' => $model->requested_user_id,
                'chat_channel_id' => $chatChannel->id
            ]);
            $playerRepository = new PlayerRepository(new User());
            $player = $playerRepository->find($model->requested_user_id);
            $matchLogRepository = new MatchLogRepository(new MatchLog());
            $matchLogRepository->create([
                    'match_id' => $data['match_id'],
                    'description' => __('messages.player_joined', ['player' => $player->first_name . ' ' . $player->last_name]),
                    'subject_type' => MatchLogSubjectTypeEnum::MATCH_PLAYER_JOIN->value
                ]
            );
        }

        return $update;
    }

    public function destroy(string $id) : bool
    {
        $delete = $this->requestMatchTeamPlayerRepository->delete($id);
        $this->requestReceiverRepository->deleteByRequestableId($id);

        return $delete;
    }
}
