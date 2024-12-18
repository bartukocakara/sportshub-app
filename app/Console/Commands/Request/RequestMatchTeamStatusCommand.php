<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\MatchTeam;
use App\Models\RequestMatchTeam;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RequestMatchTeamStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-match-team {id} {matchTeamId} {status}';

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
        $matchTeamId = $this->argument('matchTeamId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestMatchTeam::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                MatchTeam::insert([
                    [
                        'id' => Str::uuid()->toString(),
                        'user_id' => $userData->id,
                        'match_team_id' => $matchTeamId,
                        'position_id' => 1,
                        'match_team_status_id' => $status,
                        'created_at' => now()
                    ]
                ]);
                break;
            default:
                # code...
                break;
        }
        $this->info($userData->email. ' status successfully updated');
        return Command::SUCCESS;
    }
}
