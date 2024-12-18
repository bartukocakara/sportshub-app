<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\Court;
use App\Models\RequestCreateCourt;
use App\Models\User;
use Illuminate\Console\Command;

class RequestCreateCourtStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-create-court {id} {courtId} {status}';

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
        $courtId = $this->argument('courtId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestCreateCourt::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                Court::where('id', $courtId)->update([
                    'court_status_id' => $status
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
