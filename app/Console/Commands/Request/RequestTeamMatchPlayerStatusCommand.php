<?php

namespace App\Console\Commands\Request;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\ChatChannel;
use App\Models\ChatUser;
use App\Models\RequestTeamMatchPlayer;
use App\Models\TeamMatch;
use App\Models\TeamMatchPlayer;

class RequestTeamMatchPlayerStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-team-match-player {id} {teamMatchId} {status}';

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
        $teamMatchId = $this->argument('teamMatchId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestTeamMatchPlayer::where('id', $id)->update([
            'status' => $status
        ]);

        $matchTeam = TeamMatch::where('id', $teamMatchId)->first();

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                TeamMatchPlayer::insert([
                    [
                        'id' => Str::uuid()->toString(),
                        'user_id' => $userData->id,
                        'team_match_id' => $teamMatchId,
                        'position_id' => 1,
                        'team_match_player_status_id' => $status,
                        'created_at' => now()
                    ]
                ]);
                # Chat Channlea da dahil et
                $chatChannel = ChatChannel::where('chattable_id', $matchTeam->match_id)->first();
                ChatUser::create([
                    'user_id' => $userData->id,
                    'chat_channel_id' => $chatChannel->id
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
