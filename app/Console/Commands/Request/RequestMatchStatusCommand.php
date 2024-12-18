<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\Matches;
use App\Models\RequestMatch;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RequestMatchStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-match {id} {matchId} {status}';

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
        $id = $this->argument('id');
        $status = $this->argument('status');
        $matchId = $this->argument('matchId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestMatch::where('id', $id)->update([
            'status' => $status
        ]);

        Matches::where('id', $matchId)->update([
                        'match_status_id' => $status,
                    ]);

        $this->info('Match status successfully updated');
        return Command::SUCCESS;
    }
}
