<?php

namespace App\Services\Request;

use App\Enums\FollowStatusEnum;
use App\Enums\Request\RequestStatusEnum;
use App\Loggers\LoggerManager;
use App\Models\Team;
use App\Repositories\FollowRepository;
use App\Repositories\PlayerTeamRepository;
use App\Services\CrudService;
use App\Repositories\Request\RequestPlayerTeamRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Repositories\TeamLeaderRepository;
use App\Support\Messages\TeamSwalMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Throwable;

class RequestPlayerTeamService extends CrudService
{
    protected PlayerTeamRepository $playerTeamRepository;
    protected TeamLeaderRepository $teamLeaderRepository;
    protected FollowRepository $followRepository;

    protected RequestPlayerTeamRepository $requestPlayerTeamRepository;
    protected RequestReceiverRepository $requestReceiverRepository;

    public function __construct(RequestPlayerTeamRepository $requestPlayerTeamRepository,
                                PlayerTeamRepository $playerTeamRepository,
                                TeamLeaderRepository $teamLeaderRepository,
                                FollowRepository $followRepository,
                                RequestReceiverRepository $requestReceiverRepository)
    {
        $this->requestPlayerTeamRepository = $requestPlayerTeamRepository;
        $this->playerTeamRepository = $playerTeamRepository;
        $this->teamLeaderRepository = $teamLeaderRepository;
        $this->followRepository = $followRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        parent::__construct($this->requestPlayerTeamRepository);
    }

    public function create(array $data): RedirectResponse
    {
        $data['requested_user_id'] = auth()->id();
        try {
            DB::beginTransaction();

            // Kullanıcı id'sini garantiye alalım
            $data['requested_user_id'] = auth()->id();
            $data['expiring_date'] = now()->addWeek();
            $data['status'] = RequestStatusEnum::WAITING_FOR_APPROVAL->value;
            // İstek kaydı oluştur
            $requestPlayerTeam = $this->requestPlayerTeamRepository->create($data);

            $teamLeaders = $this->teamLeaderRepository->getByParams([
                'team_id' => $data['team_id']
            ]);

            // Bildirim alıcılarını oluştur (örnek)
            foreach ($teamLeaders as $leader) {
                $this->requestReceiverRepository->create([
                    'receiver_user_id' => $leader->user_id, // lider user id
                    'requestable_id' => $requestPlayerTeam->id,
                    'requestable_type' => 'App\Models\RequestPlayerTeam',
                    'name' => 'player_team',
                ]);
            }

            // İstersen burada bildirim gönderme mantığını tetikleyebilirsin

            DB::commit();

            return redirect()->back()->with('swal', TeamSwalMessages::teamJoinRequestSuccess()->toArray());
        } catch (Throwable $th) {
            DB::rollBack();
            LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with('swal', TeamSwalMessages::teamJoinRequestError()->toArray());
        }
    }

    public function accept(string $id) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $requestPlayerTeam = $this->requestPlayerTeamRepository->find($id);
            if (!$requestPlayerTeam) {
                throw new \Exception('Request not found');
            }

            // Takımı takip ediyor mu kontrol et
            $isFollowing = $this->followRepository->existByParams([
                'user_id' => $requestPlayerTeam->requested_user_id,
                'followable_id' => $requestPlayerTeam->team_id,
                'followable_type' => Team::class,
            ]);

            if (!$isFollowing) {
                // Takip oluştur
                $this->followRepository->create([
                    'user_id' => $requestPlayerTeam->requested_user_id,
                    'followable_id' => $requestPlayerTeam->team_id,
                    'followable_type' => Team::class,
                    'status' => FollowStatusEnum::ACCEPTED->value, // veya uygun status
                ]);
            }

            $playerTeam = $this->playerTeamRepository->getByParams([
                'team_id' => $requestPlayerTeam->team_id,
                'user_id' => $requestPlayerTeam->requested_user_id
            ]);

            if (is_null($playerTeam)) {
                $this->playerTeamRepository->create([
                    'team_id' => $requestPlayerTeam->team_id,
                    'user_id' => $requestPlayerTeam->requested_user_id,
                ]);
            }

            $requestPlayerTeam->update([
                'status' => RequestStatusEnum::ACCEPTED->value,
            ]);
            $this->requestReceiverRepository->deleteByRequestableId($id);

            DB::commit();

            return redirect()->back()->with('swal', TeamSwalMessages::acceptInvitationSuccess()->toArray());
        } catch (Throwable $th) {
            DB::rollBack();
            LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with('swal', TeamSwalMessages::acceptInvitationError()->toArray());
        }
    }

    public function reject(string $id) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $requestPlayerTeam = $this->requestPlayerTeamRepository->find($id);

            $requestPlayerTeam->update([
                'status' => RequestStatusEnum::REJECTED->value,
            ]);

            $this->requestReceiverRepository->deleteByRequestableId($id);

            // Takımı takip eden kayıt varsa sil
            $teamId = $requestPlayerTeam->team_id;
            $userId = $requestPlayerTeam->requested_user_id;

            $this->followRepository->deleteByFollowable($userId, $teamId, Team::class);

            DB::commit();

            return redirect()->back()->with('swal', TeamSwalMessages::rejectInvitationSuccess()->toArray());

        } catch (Throwable $th) {
            DB::rollBack();
            LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with('swal', TeamSwalMessages::rejectRequestError()->toArray());
        }
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            // İlk olarak veriyi bul
            $request = $this->requestPlayerTeamRepository->find($id);

            if (!$request) {
                throw new \Exception('RequestPlayerTeam not found');
            }

            // Tipi kontrol et (join mi invite mi vs.)
            $type = $request->type;

            // RequestReceiver'ları sil
            $this->requestReceiverRepository->deleteByRequestableId($id);

            // Ana request'i sil
            $deleted = $this->requestPlayerTeamRepository->delete($id);

            if (!$deleted) {
                throw new \Exception('RequestPlayerTeam could not be deleted');
            }

            DB::commit();

            if ($type === 'join') {
                $message = TeamSwalMessages::cancelJoinRequestSuccess();
            } elseif ($type === 'invite') {
                $message = TeamSwalMessages::rejectInviteSuccess();
            } else {
                $message = TeamSwalMessages::genericSuccess();
            }

            return redirect()->back()->with('swal', $message->toArray());

        } catch (\Throwable $th) {
            DB::rollBack();

            LoggerManager::log('RequestPlayerTeam Delete Error', $th->getMessage(), ['request_id' => $id]);

            return redirect()->back()->with('swal', TeamSwalMessages::cancelRequestError()->toArray());
        }
    }

}
