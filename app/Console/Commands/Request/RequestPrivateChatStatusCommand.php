<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\ChatChannel;
use App\Models\ChatUser;
use App\Models\PrivateChatUser;
use App\Models\RequestPrivateChat;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RequestPrivateChatStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-private-chat {id} {user2Id} {status}';

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
        $user2Id = $this->argument('user2Id');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestPrivateChat::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                $privateChat = PrivateChatUser::create([
                    'id' => Str::uuid()->toString(),
                    'user1_id' => $userData->id,
                    'user2_id' => $user2Id,
                    'created_at' => now()
                ]);
                # Chat Channlea da dahil et
                $chatChannel = ChatChannel::where('chattable_id', $privateChat->id)->first();
                ChatUser::insert([
                    [
                        'user_id' => $user2Id,
                        'chat_channel_id' => $chatChannel->id
                    ],
                    [
                        'user_id' => $userData->id,
                        'chat_channel_id' => $chatChannel->id
                    ],


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
