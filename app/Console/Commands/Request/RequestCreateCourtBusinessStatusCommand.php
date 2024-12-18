<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\CourtBusiness;
use App\Models\CourtBusinessOwner;
use App\Models\RequestCreateCourtBusiness;
use App\Models\User;
use Illuminate\Console\Command;

class RequestCreateCourtBusinessStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-create-court-business {id} {courtBusinessId} {status}';

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
        $courtBusinessId = $this->argument('courtBusinessId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestCreateCourtBusiness::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                CourtBusiness::where('id', $courtBusinessId)->update([
                    'status' => $status
                ]);
                CourtBusinessOwner::create([
                    'court_business_id' => $courtBusinessId,
                    'user_id' => $userData->id
                ]);

                break;
            default:
                # code...
                break;
        }
        $this->info('Court status successfully updated');
        return Command::SUCCESS;
    }
}
