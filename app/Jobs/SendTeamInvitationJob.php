<?php

namespace App\Jobs;

use App\Models\Message;
use App\Models\User;
use App\Messaging\MessageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendTeamInvitationJob implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    public function __construct(
        protected User $receiver,
        protected string $teamTitle,
        protected string $messageBody
    ) {}

    public function handle(): void
    {
        $message = new Message();
        $message->to = $this->receiver->email;
        $message->type = 'mail';
        $message->subject = __('messages.team_invite_request_title', ['title' => $this->teamTitle]);
        $message->body = $this->messageBody;
        $message->save();

        app(MessageService::class)->send($message);
    }
}
