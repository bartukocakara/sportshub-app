<?php

namespace App\Services\Request;

use App\Enums\TypeEnums\LogSubjectTypeEnums\ReservationLogSubjectTypeEnum;
use App\Models\ReservationLog;
use App\Repositories\Request\RequestReservationMatchRepository;
use App\Repositories\Reservation\ReservationLogRepository;
use App\Services\CrudService;
use Illuminate\Support\Str;

class RequestReservationMatchService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestReservationMatchRepository $requestReservationMatchRepository;

    /**
     * @param RequestReservationMatchRepository $requestReservationMatchRepository
     * @return void
    */
    public function __construct(RequestReservationMatchRepository $requestReservationMatchRepository)
    {
        $this->requestReservationMatchRepository = $requestReservationMatchRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestReservationMatchRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }

    /**
     * @param array $data
     * @return bool
    */
    public function insert(array $data) : bool
    {
        $requestReservationMatches = [];
        foreach ($data['items'] as $v1) {
            foreach ($v1['match_ids'] as  $v2) {
                $requestReservationMatches[] = [
                    'id' => Str::uuid()->toString(),
                    'request_reservation_id' =>  $v1['request_reservation_id'],
                    'match_id' => $v2,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            // $this->requestReservationMatchRepository->deleteByMatchIdAndRequestReservationIds($v1['request_reservation_id'], $v1['match_ids']);
        }
        $this->requestReservationMatchRepository->insert($requestReservationMatches);
        return true;
    }

    public function deleteMultiple(array $data) : bool
    {
        $requestReservationMatches = [];
        foreach ($data['items'] as $v1) {
            foreach ($v1['match_ids'] as  $v2) {
                $requestReservationMatches[] = [
                    'id' => Str::uuid()->toString(),
                    'request_reservation_id' =>  $v1['request_reservation_id'],
                    'match_id' => $v2,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            $this->requestReservationMatchRepository->deleteByMatchIdAndRequestReservationIds($v1['request_reservation_id'], $v1['match_ids']);
            $reservationLogRepository = new ReservationLogRepository(new ReservationLog());
            $reservationLogRepository->create([
                    'reservation_id' => $data['reservation_id'],
                    'description' => __('messages.reservation_create_approved'),
                    'subject_type' => ReservationLogSubjectTypeEnum::RESERVATION_MATCH_JOIN->value
                ]
            );
        }
        return true;
    }
}
