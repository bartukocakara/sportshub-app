<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\ChatChannel;
use App\Models\ChatUser;
use App\Models\MatchTeam;
use App\Models\MatchTeamPlayer;
use App\Models\RequestMatchTeamPlayer;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RequestMatchTeamPlayerStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-match-team-player {id} {matchTeamId} {status}';

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

        RequestMatchTeamPlayer::where('id', $id)->update([
            'status' => $status
        ]);

        $matchTeam = MatchTeam::where('id', $matchTeamId)->first();

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                MatchTeamPlayer::insert([
                    [
                        'id' => Str::uuid()->toString(),
                        'user_id' => $userData->id,
                        'match_team_id' => $matchTeamId,
                        // 'position_id' => '47e18397-a1b9-4765-b4c5-035398402c79',
                        'match_team_player_status_id' => 1,
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
