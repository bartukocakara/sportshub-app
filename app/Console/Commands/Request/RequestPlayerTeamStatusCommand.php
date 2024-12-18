<?php

namespace App\Console\Commands\Request;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use App\Models\User;
use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\ChatChannel;
use App\Models\ChatUser;
use App\Models\PlayerTeam;
use App\Models\RequestPlayerTeam;

class RequestPlayerTeamStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-player-team {id} {teamId} {status}';

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
        $teamId = $this->argument('teamId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestPlayerTeam::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                PlayerTeam::insert([
                    [
                        'id' => Str::uuid()->toString(),
                        'user_id' => $userData->id,
                        'team_id' => $teamId,
                        'position_id' => 'bdf2d5c9-fa0f-403b-8e1a-1f6ef23061fd',
                        'created_at' => now()
                    ]
                ]);
                # Chat Channlea da dahil et
                $chatChannel = ChatChannel::where('chattable_id', $teamId)->first();
                ChatUser::create([
                    'user_id' => $userData->id,
                    'chat_channel_id' => $chatChannel->id
                ]);
                $this->info($userData->email. ' player team created and chat handled');

                break;
            default:
                # code...
                break;
        }
        $this->info($userData->email. ' status successfully updated');
        return Command::SUCCESS;
    }
}
