<?php

namespace App\Loggers;

use App\Loggers\LoggingProvider;

class LoggerManager
{
    /**
     * Dispatch log to all active logging channels.
     */
    public static function log(string $level, string $message, array $context = []): void
    {
        foreach (LoggingProvider::all() as $channel) {
            try {
                $channel->send($level, $message, $context);
            } catch (\Throwable $e) {
                logger()->error("LoggerChannel failed", [
                    'channel' => get_class($channel),
                    'error'   => $e->getMessage(),
                ]);
            }
        }
    }
}

