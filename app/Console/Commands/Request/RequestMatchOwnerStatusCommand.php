<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\MatchOwner;
use App\Models\RequestMatchOwner;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RequestMatchOwnerStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-match-owner {id} {matchId} {status}';

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

        RequestMatchOwner::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                MatchOwner::insert([
                    [
                        'id' => Str::uuid()->toString(),
                        'user_id' => $userData->id,
                        'match_id' => $matchId,
                        'created_at' => now()
                    ]
                ]);
                break;
            default:
                # code...
                break;
        }
        $this->info($userData->email. ' status successfully updated');
        return Command::SUCCESS;
    }
}
