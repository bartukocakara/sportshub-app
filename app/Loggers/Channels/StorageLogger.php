<?php

namespace App\Loggers\Channels;

use App\Loggers\Contracts\LoggerChannelInterface;
use Illuminate\Support\Facades\Log;

class StorageLogger implements LoggerChannelInterface
{
    public function __construct(array $config = [])
    {
        // You could customize log channel via config here if needed
    }

    public function log(string $level, string $message, array $context = []): void
    {
        Log::channel('storage')->{$level}($message, $context);
    }
}

