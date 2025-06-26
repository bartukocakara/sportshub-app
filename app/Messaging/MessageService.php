<?php

namespace App\Messaging;

use App\Models\Message;
use App\Models\MessageChannel;
use App\Messaging\Strategies\Channels\MailChannel;
use App\Messaging\Strategies\Channels\SmsChannel;
use App\Messaging\Contracts\MessageChannelStrategyInterface;

class MessageService
{
    public function send(Message $message): bool
    {
        // Kanalı db'den getir
        $channel = MessageChannel::where('key', $message->type)->where('active', true)->first();
        if (!$channel) {
            throw new \Exception('Invalid message type');
        }

        $strategy = $this->resolveStrategy($channel);

        if( !$strategy instanceof MessageChannelStrategyInterface) {
            throw new \RuntimeException('Invalid strategy');
        }

        $success = $strategy->send($message);
        $message->status = $success ? 'sent' : 'failed';
        $message->save();

        return $success;
    }

    protected function resolveStrategy(MessageChannel $channel): MessageChannelStrategyInterface
    {
        return match ($channel->key){
            'mail' => new MailChannel($channel),
            'sms' => new SmsChannel($channel),
            default => throw new \RuntimeException("unsupported channel key: {$channel->key}")
        };
    }
}
