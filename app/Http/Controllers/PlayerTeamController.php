<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PlayerTeamService;
use Illuminate\Http\RedirectResponse;

class PlayerTeamController extends Controller
{
    private PlayerTeamService $playerTeamService;

    /**
     * Service interface tanımlanıyor.
     *
     * @param  PlayerTeamService $playerTeamService
     * @return void
     */
    public function __construct(PlayerTeamService $playerTeamService)
    {
        $this->playerTeamService = $playerTeamService;
    }

    /**
     * Belirli bir kaynağı kaldırmak için kullanılır.
     *
     * @param  string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id) : RedirectResponse
    {
        return $this->playerTeamService->delete($id);
    }
}
