<?php

namespace App\Loggers\Contracts;

interface LoggerChannelInterface
{
    public function log(string $level, string $message, array $context = []): void;
}
