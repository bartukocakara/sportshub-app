<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\PartnerMatch;
use App\Models\RequestPartnerMatch;
use App\Models\User;
use Illuminate\Console\Command;

class RequestPartnerMatchStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-partner-match {id} {partnerMatchId} {status}';

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
        $partnerMatchId = $this->argument('partnerMatchId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestPartnerMatch::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                PartnerMatch::where('id', $partnerMatchId)->update([
                    [
                        'partner_match_status_id' => 1,
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
