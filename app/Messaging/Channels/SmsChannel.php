<?php

namespace App\Messaging\Strategies\Channels;

use App\Models\Message;
use App\Messaging\Contracts\MessageChannelStrategyInterface;
use App\Models\MessageChannel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SmsChannel implements MessageChannelStrategyInterface
{
    protected MessageChannel $channel;

    public function __construct(MessageChannel $channel)
    {
        $this->channel = $channel;
    }

    public function send(Message $message): bool
    {
        $config = $this->channel->config;
        $token = $this->getToken($config);

        $response = Http::withToken($token)->post($config['send_url'], [
            'to' => $message->recipient,
            'text' => $message->body,
        ]);

        return $response->successful();
    }

    protected function getToken(array $config): string
    {
        $cacheKey = 'sms_token_' . md5(json_encode($config));

        return Cache::remember($cacheKey, now()->addMinutes(60), function() use( $config){
            $response = Http::post($config['token_url'], [
                'username' => $config['username'],
                'password' => $config['password']
            ]);

            if( !$response->successful()){
                throw new \Exception('Failed to fetch Sms token');
            }
        });

        return $response->json('token');
    }
}
