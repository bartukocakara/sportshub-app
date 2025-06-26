<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository extends BaseRepository
{
    protected Message $message;

    /**
     * @param Message $message
     * @return void
    */
    public function __construct(Message $message)
    {
        parent::__construct($message);
        $this->message = $message;
    }
}
