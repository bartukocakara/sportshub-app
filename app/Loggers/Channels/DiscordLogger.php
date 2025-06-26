<?php

namespace App\Loggers\Channels;

use App\Loggers\Contracts\LoggerChannelInterface;
use Illuminate\Support\Facades\Http;

class DiscordLogger implements LoggerChannelInterface
{
    protected string $webhookUrl;

    public function __construct(array $config)
    {
        $this->webhookUrl = $config['webhook_url'] ?? '';
    }

    public function log(string $level, string $message, array $context = []): void
    {
        Http::post($this->webhookUrl, [
            'text' => "$level*$message,\n". json_encode($context),
        ]);
    }
}
