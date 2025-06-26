<?php

namespace App\Messaging\Strategies\Channels;

use App\Models\Message;
use App\Messaging\Contracts\MessageChannelStrategyInterface;
use App\Models\MessageChannel;
use Illuminate\Support\Facades\Mail;

class MailChannel implements MessageChannelStrategyInterface
{
    protected MessageChannel $channel;

    public function __construct(MessageChannel $channel)
    {
        $this->channel = $channel;
    }

    public function send(Message $message): bool
    {
        $from = $this->channel->config['from'] ?? config('mail.from.address');

        Mail::raw($message->body, function($mail) use($message, $from) {
            $mail->to($message->recipient)
                ->subject($message->subject ?? 'Notification')
                ->from($from);
        });

        return true;
    }
}

