<?php

namespace App\Services\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Loggers\LoggerManager;
use App\Models\Definition;
use App\Repositories\MatchOwnerRepository;
use App\Repositories\MatchRepository;
use App\Repositories\MatchTeamPlayerRepository;
use App\Services\CrudService;
use App\Repositories\Request\RequestMatchTeamPlayerRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Support\Messages\MatchSwalMessages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class RequestMatchTeamPlayerService extends CrudService
{
    protected RequestMatchTeamPlayerRepository $requestMatchTeamPlayerRepository;
    protected RequestReceiverRepository $requestReceiverRepository;
    protected MatchOwnerRepository $matchOwnerRepository;
    protected MatchTeamPlayerRepository $matchTeamPlayerRepository;
    /**
     * @param RequestMatchTeamPlayerRepository $requestMatchTeamPlayerRepository
     * @param RequestReceiverRepository $requestReceiverRepository
     * @param MatchOwnerRepository $matchOwnerRepository
     * @param MatchTeamPlayerRepository $matchTeamPlayerRepository
     * @return void
    */
    public function __construct(RequestMatchTeamPlayerRepository $requestMatchTeamPlayerRepository, RequestReceiverRepository $requestReceiverRepository, MatchOwnerRepository $matchOwnerRepository, MatchTeamPlayerRepository $matchTeamPlayerRepository)
    {
        $this->requestMatchTeamPlayerRepository = $requestMatchTeamPlayerRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        $this->matchOwnerRepository = $matchOwnerRepository;
        $this->matchTeamPlayerRepository = $matchTeamPlayerRepository;
        parent::__construct($this->requestMatchTeamPlayerRepository);
    }

    public function create(array $data): RedirectResponse
    {
        $data['requested_user_id'] = auth()->id();
        try {
            DB::beginTransaction();
            $matchRepo = app()->make(MatchRepository::class);

            $match = $matchRepo->find($data['match_id'], ['matchTeams.matchTeamPlayers']); 

            if (!isset($data['match_team_id'])) {
                $lowestTeam = $match->matchTeams->sortBy(function ($team) {
                    return $team->matchTeamPlayers->count();
                })->first();
    
                $data['match_team_id'] = $lowestTeam?->id;
            }
            // Kullanıcı id'sini garantiye alalım
            $data['requested_user_id'] = auth()->id();
            $data['expiring_date'] = now()->addWeek();
            $data['status'] = RequestStatusEnum::WAITING_FOR_APPROVAL->value;
            // İstek kaydı oluştur
            $requestMatchTeamPlayer = $this->requestMatchTeamPlayerRepository->create($data);

            $matchOwners = $this->matchOwnerRepository->getByParams([
                'match_id' => $data['match_id']
            ]);

            // Bildirim alıcılarını oluştur (örnek)
            foreach ($matchOwners as $matchOwner) {
                $this->requestReceiverRepository->create([
                    'receiver_user_id' => $matchOwner->user_id, // lider user id
                    'requestable_id' => $requestMatchTeamPlayer->id,
                    'requestable_type' => 'App\Models\RequestMatchTeamPlayer',
                    'name' => 'match_team_player',
                ]);
            }

            DB::commit();

            return redirect()->back()->with('swal', MatchSwalMessages::matchJoinRequestSuccess()->toArray());
            
        } catch (Throwable $th) {
            DB::rollBack();
            Log::error('Error creating match join request', [
                'error' => $th->getMessage(),
                'data' => $data
            ]);
            // LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with('swal', MatchSwalMessages::matchJoinRequestError()->toArray());
        }
    }

    public function accept(string $id) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $requestMatchTeamPlayer = $this->requestMatchTeamPlayerRepository->find($id);
            if (!$requestMatchTeamPlayer) {
                throw new \Exception('Request not found');
            }

            $playerTeam = $this->mathTeamPlayerRepository->getByParams([
                'team_id' => $requestMatchTeamPlayer->team_id,
                'user_id' => $requestMatchTeamPlayer->requested_user_id
            ]);

            if (is_null($playerTeam)) {
                $this->matchTeamPlayerRepository->create([
                    'team_id' => $requestMatchTeamPlayer->team_id,
                    'user_id' => $requestMatchTeamPlayer->requested_user_id,
                ]);
            }

            $requestMatchTeamPlayer->update([
                'status' => RequestStatusEnum::ACCEPTED->value,
            ]);
            $this->requestReceiverRepository->deleteByRequestableId($id);

            DB::commit();

            return redirect()->back()->with('swal', MatchSwalMessages::acceptInvitationSuccess()->toArray());
        } catch (Throwable $th) {
            DB::rollBack();
            LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with('swal', MatchSwalMessages::acceptInvitationError()->toArray());
        }
    }

    public function reject(string $id) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $requestMatchTeamPlayer = $this->requestMatchTeamPlayerRepository->find($id);

            $requestMatchTeamPlayer->update([
                'status' => RequestStatusEnum::REJECTED->value,
            ]);

            $this->requestReceiverRepository->deleteByRequestableId($id);

            // Takımı takip eden kayıt varsa sil
            $teamId = $requestMatchTeamPlayer->team_id;
            $userId = $requestMatchTeamPlayer->requested_user_id;

            DB::commit();

            return redirect()->back()->with('swal', MatchSwalMessages::rejectInvitationSuccess()->toArray());

        } catch (Throwable $th) {
            DB::rollBack();
            LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with('swal', MatchSwalMessages::rejectRequestError()->toArray());
        }
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            // İlk olarak veriyi bul
            $request = $this->requestMatchTeamPlayerRepository->find($id);

            if (!$request) {
                throw new \Exception('RequestPlayerTeam not found');
            }

            // Tipi kontrol et (join mi invite mi vs.)
            $type = $request->type;

            // RequestReceiver'ları sil
            $this->requestReceiverRepository->deleteByRequestableId($id);

            // Ana request'i sil
            $deleted = $this->requestMatchTeamPlayerRepository->delete($id);

            if (!$deleted) {
                throw new \Exception('RequestPlayerTeam could not be deleted');
            }

            DB::commit();

            if ($type === 'join') {
                $message = MatchSwalMessages::cancelJoinRequestSuccess();
            } elseif ($type === 'invite') {
                $message = MatchSwalMessages::rejectInviteSuccess();
            } else {
                $message = MatchSwalMessages::genericSuccess();
            }

            return redirect()->back()->with('swal', $message->toArray());

        } catch (\Throwable $th) {
            DB::rollBack();

            LoggerManager::log('RequestPlayerTeam Delete Error', $th->getMessage(), ['request_id' => $id]);

            return redirect()->back()->with('swal', MatchSwalMessages::cancelRequestError()->toArray());
        }
    }
}
