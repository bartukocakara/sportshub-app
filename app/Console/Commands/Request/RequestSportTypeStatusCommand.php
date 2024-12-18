<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\RequestSportType;
use App\Models\SportType;
use App\Models\User;
use Illuminate\Console\Command;

class RequestSportTypeStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-sport-type {id} {sportTypeId} {status}';

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
        $sportTypeId = $this->argument('sportTypeId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestSportType::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                SportType::where('id', $sportTypeId)->update(
                    [
                        'sport_type_status_id' => $status,
                        'created_at' => now()
                    ]
                );
                break;
            default:
                # code...
                break;
        }
        $this->info($userData->email. ' status successfully updated');
        return Command::SUCCESS;
    }
}
