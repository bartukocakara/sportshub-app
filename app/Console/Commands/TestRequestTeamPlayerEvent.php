<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\RequestTeamPlayerEvent;

class TestRequestTeamPlayerEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:request-team';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        event(new RequestTeamPlayerEvent('My messages'));
        echo "Success";
    }
}
