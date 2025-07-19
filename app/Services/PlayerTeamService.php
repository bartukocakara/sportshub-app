<?php

namespace App\Services;

use App\Loggers\LoggerManager;
use App\Models\RequestPlayerTeam;
use App\Repositories\PlayerTeamRepository;
use App\Repositories\Request\RequestPlayerTeamRepository;
use App\ValueObjects\SwalMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PlayerTeamService extends CrudService
{
    protected PlayerTeamRepository $playerTeamRepository;

    /**
     * @param PlayerTeamRepository $playerTeamRepository
     * @return void
    */
    public function __construct(PlayerTeamRepository $playerTeamRepository)
    {
        $this->playerTeamRepository = $playerTeamRepository;
        parent::__construct($this->playerTeamRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $playerTeams = $this->playerTeamRepository->getByParams([
                'team_id' => $id,
                'user_id' => auth()->id()
            ]);

            if (!$playerTeams->count()) {
                throw new \Exception('Player team record not found');
            }

            foreach ($playerTeams as $playerTeam) {
                $playerTeam->delete();
            }

            $requestPlayerTeamRepo = app(RequestPlayerTeamRepository::class);
            $requestPlayerTeamRepo->deleteByParams([
                'requested_user_id' => auth()->id(),
                'team_id' => $id
            ]);

            DB::commit();

            return redirect()->back()->with(
                'swal',
                SwalMessage::warning(
                    '👋🏻 ' . __('messages.quit_team_successfull_title'),
                    '<strong>' . __('messages.quit_team_successfull_body') . '</strong><br><small class="text-muted">' . __('messages.see_you_again') . '</small>'
                )->toArray()
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with(
                'swal',
                SwalMessage::error(
                    '😓 ' . __('messages.failed_to_delete_player'),
                    '<small class="text-muted">' . __('messages.contact_support_prompt') . '</small>'
                )->toArray()
            );
        }
    }

}
