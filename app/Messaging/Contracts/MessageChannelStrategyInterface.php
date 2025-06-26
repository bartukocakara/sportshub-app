<?php

namespace App\Messaging\Contracts;

use App\Models\Message;

interface MessageChannelStrategyInterface
{
    public function send(Message $message): bool;
}

