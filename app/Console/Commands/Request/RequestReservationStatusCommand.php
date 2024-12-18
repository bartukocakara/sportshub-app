<?php

namespace App\Console\Commands\Request;

use App\Enums\StatusEnums\Request\RequestStatusEnum;
use App\Models\RequestReservation;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RequestReservationStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'handle:request-reservation {id} {reservationId} {status}';

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
        $reservationId = $this->argument('reservationId');
        $userData = User::where('email', 'kocakarabartu@gmail.com')->first();

        RequestReservation::where('id', $id)->update([
            'status' => $status
        ]);

        switch (intval($status)) {
            case RequestStatusEnum::ACCEPTED->value:
                Reservation::where('id', $reservationId)->update([
                        'reservation_status_id' => $status,
                        'created_at' => now()
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
