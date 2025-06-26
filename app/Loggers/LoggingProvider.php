<?php

namespace App\Loggers;

use App\Loggers\Channels\DiscordLogger;
use App\Loggers\Contracts\LoggerChannelInterface;
use App\Loggers\Channels\SlackLogger;
use App\Loggers\Channels\TeamsLogger;
use App\Models\IntegratedChannel;
use InvalidArgumentException;

class LoggingProvider
{
    public static function resolve(string $type, array $config): LoggerChannelInterface
    {
        return match ($type) {
            'slack' => new SlackLogger($config),
            'discord' => new DiscordLogger($config),
            'teams' => new TeamsLogger($config),
            default  => throw new InvalidArgumentException("Unsupported logging type: {$type}"),
        };
    }

    public static function all(): array
    {
        return IntegratedChannel::where('active', true)
            ->get()
            ->map(fn($channel) => self::resolve($channel->key, $channel->config))
            ->all();
    }
}
