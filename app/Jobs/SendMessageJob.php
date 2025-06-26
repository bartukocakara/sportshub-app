<?php

// app/Jobs/SendMessageJob.php

namespace App\Jobs;

use App\Models\Message;
use App\Messaging\MessageService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Message $message) {}

    public function handle(MessageService $service): void
    {
        $service->send($this->message);
    }

    public function retryUntil(): \DateTime
    {
        return now()->addMinutes(5); // retry for up to 5 minutes
    }
}
