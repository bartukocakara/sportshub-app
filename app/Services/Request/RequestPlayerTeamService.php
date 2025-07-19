<?php

namespace App\Services\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Loggers\LoggerManager;
use App\Repositories\PlayerTeamRepository;
use App\Services\CrudService;
use App\Repositories\Request\RequestPlayerTeamRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Repositories\TeamLeaderRepository;
use App\ValueObjects\SwalMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Throwable;

class RequestPlayerTeamService extends CrudService
{
    protected PlayerTeamRepository $playerTeamRepository;
    protected TeamLeaderRepository $teamLeaderRepository;

    protected RequestPlayerTeamRepository $requestPlayerTeamRepository;
    protected RequestReceiverRepository $requestReceiverRepository;

    public function __construct(RequestPlayerTeamRepository $requestPlayerTeamRepository,
                                PlayerTeamRepository $playerTeamRepository,
                                TeamLeaderRepository $teamLeaderRepository,
                                RequestReceiverRepository $requestReceiverRepository)
    {
        $this->requestPlayerTeamRepository = $requestPlayerTeamRepository;
        $this->playerTeamRepository = $playerTeamRepository;
        $this->teamLeaderRepository = $teamLeaderRepository;
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

            return redirect()->back()->with(
                'swal',
                SwalMessage::success(
                    '🤝 ' . __('messages.team_join_request_sent_successfully'),
                    '<br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
                )->toArray()
            );
        } catch (Throwable $th) {
            DB::rollBack();
            LoggerManager::log('error', $th->getMessage());

            return redirect()->back()->with(
                'swal',
                SwalMessage::error(
                    '😓 ' . __('messages.team_join_request_sent_failed'),
                    '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
                )->toArray()
            );
        }
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

    public function delete(string $id) : RedirectResponse
    {
        try {
            DB::beginTransaction();

            $deleted = $this->requestPlayerTeamRepository->delete($id);

            if (!$deleted) {
                throw new \Exception('RequestPlayerTeam not found or already deleted');
            }

            $this->requestReceiverRepository->deleteByRequestableId($id);

            DB::commit();

            return redirect()->back()->with(
                'swal',
                SwalMessage::success(
                    '✅ ' . __('messages.request_cancelled_title'),
                    '<strong>' . __('messages.request_cancelled_body') . '</strong><br><small class="text-muted">' . __('messages.request_cancelled_small') . '</small>'
                )->toArray()
            );

        } catch (\Throwable $th) {
            DB::rollBack();
            LoggerManager::log('RequestPlayerTeam Delete Error', $th->getMessage(), ['request_id' => $id]);

            return redirect()->back()->with(
                'swal',
                SwalMessage::error(
                    '😓 ' . __('messages.failed_to_cancel_request'),
                    '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
                )->toArray()
            );
        }
    }
}
