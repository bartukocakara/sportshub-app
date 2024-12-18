<?php

namespace App\Console\Commands\Request;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\PlayerTeam;
use App\Models\RequestTeamMatch;
use App\Models\Team;
use App\Models\TeamMatch;
use App\Models\TeamMatchPlayer;

class RequestTeamMatchStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-team-match {id} {matchId} {status}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $status = $this->argument('status');
        $requestedTeamId = $this->argument('requestedTeamId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestTeamMatch::where('id', $id)->update([
            'status' => $status
        ]);
        $requestedTeamMatch = RequestTeamMatch::where('id', $id)->first();

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                $playerTeams = PlayerTeam::where('team_id', $requestedTeamId)->get();
                $teamMatch = TeamMatch::create([
                    'team_id' => $requestedTeamId,
                    'match_id' => $requestedTeamMatch->match_id,
                ]);
                foreach ($playerTeams as $value) {
                    TeamMatchPlayer::create([
                        'team_match_id' => $teamMatch,
                        'user_id' => $value->user_id,
                        'position_id' => 1,
                        'team_match_player_statuses_id' => 1
                    ]);
                }
                break;
            default:
                # code...
                break;
        }
        $this->info($userData->email. ' status successfully updated');
        return Command::SUCCESS;
    }
}
