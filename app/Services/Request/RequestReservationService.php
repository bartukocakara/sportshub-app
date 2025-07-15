<?php

namespace App\Services\Request;

use App\Enums\StatusEnum;
use App\Enums\StatusEnums\Court\CourtReservationPricingStatusEnum;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\StatusEnums\Reservation\ReservationStatusEnum;
use App\Enums\TypeEnums\FieldUsageTypeEnum;
use App\Enums\TypeEnums\LogSubjectTypeEnums\ReservationLogSubjectTypeEnum;
use App\Models\ReservationLog;
use App\Repositories\Court\CourtOwnerRepository;
use App\Repositories\Court\CourtRepository;
use App\Repositories\Court\CourtReservationPricingRepository;
use App\Repositories\Match\MatchRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Repositories\Request\RequestReservationRepository;
use App\Repositories\Request\RequestReservationMatchRepository;
use App\Repositories\Reservation\ReservationLogRepository;
use App\Repositories\Reservation\ReservationRepository;
use App\Services\CrudService;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RequestReservationService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestReservationRepository $requestReservationRepository;
    protected ReservationRepository $reservationRepository;
    protected MatchRepository $matchRepository;
    protected RequestReceiverRepository $requestReceiverRepository;
    protected RequestReservationMatchRepository $requestReservationMatchRepository;
    protected CourtReservationPricingRepository $courtReservationPricingRepository;
    protected CourtOwnerRepository $courtOwnerRepository;

    protected CourtRepository $courtRepository;

    /**
     * @param RequestReservationRepository $requestReservationRepository
     * @param MatchRepository $matchRepository
     * @param ReservationRepository $reservationRepository
     * @param RequestReceiverRepository $requestReceiverRepository
     * @param RequestReservationMatchRepository $requestReservationMatchRepository
     * @param CourtReservationPricingRepository $courtReservationPricingRepository
     * @param CourtOwnerRepository $courtOwnerRepository
     * @param CourtRepository $courtRepository
     *
     * @return void
    */
    public function __construct(RequestReservationRepository $requestReservationRepository, MatchRepository $matchRepository, ReservationRepository $reservationRepository, RequestReceiverRepository $requestReceiverRepository, RequestReservationMatchRepository $requestReservationMatchRepository, CourtReservationPricingRepository $courtReservationPricingRepository, CourtOwnerRepository $courtOwnerRepository, CourtRepository $courtRepository)
    {
        $this->requestReservationRepository = $requestReservationRepository;
        $this->matchRepository = $matchRepository;
        $this->reservationRepository = $reservationRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        $this->courtReservationPricingRepository = $courtReservationPricingRepository;
        $this->courtOwnerRepository = $courtOwnerRepository;
        $this->courtRepository = $courtRepository;
        $this->requestReservationMatchRepository = $requestReservationMatchRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestReservationRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }

    /**
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model
    {
        DB::beginTransaction();
        try {
            $date = Carbon::parse($data['date']);

            $court = $this->courtRepository->findWithCourtBusiness($data['court_id']);
            $monthlyPriceIncreaseRate = $court->courtBusiness->monthly_price_increase_rates;
            $currentMonth = $date->month;
            $priceAdjustmentFactor = $monthlyPriceIncreaseRate[$currentMonth] ?? 0;

            $dayOfWeek = strtolower($date->format('l'));
            $getParams = [
                'court_id' => $data['court_id'],
                'day_of_weeks' => [$dayOfWeek]
            ];

            $pricings = $this->courtReservationPricingRepository->getByCourtIdAndDays($getParams);
            if ($pricings->isEmpty()) {
                throw new Exception('No pricing found for the specified day.');
            }
            $pricing = $pricings->first();
            $hours = $pricing->hours;
            $fromHour = Carbon::parse($data['from_hour']);
            $toHour = Carbon::parse($data['to_hour']);
            $totalPrice = 0;
            foreach ($hours as $hour) {
                $hourStart = Carbon::createFromFormat('H:i', $hour['from_hour']);
                $hourEnd = Carbon::createFromFormat('H:i', $hour['to_hour']);
                if ($hourStart == $fromHour && $hourEnd == $toHour) {
                    $totalPrice += $hour['price'];
                }
            }

            $totalPrice = $totalPrice * (1 + $priceAdjustmentFactor);

            if ($totalPrice <= 0) {
                throw new Exception('Invalid price calculation.');
            }
            $courtOwners = $this->courtOwnerRepository->getByParams(['court_id' => $data['court_id']]);
            $requestReservationMatchRows = [];
            $fieldUsageType = $data['field_usage_type'] ?? FieldUsageTypeEnum::FULL->value;
            $reservation = $this->reservationRepository->create([
                'title' => $data['title'],
                'user_id' => auth()->user()->id,
                'court_id' => $data['court_id'],
                'sport_type_id' => $data['sport_type_id'],
                'code' => Str::random(6),
                'field_usage_type' => $fieldUsageType,
                'from_hour' => $data['from_hour'],
                'to_hour' => $data['to_hour'],
                'date' => $data['date'],
                'price' => $totalPrice,
                'reservation_status_id' => ReservationStatusEnum::WAITING_FOR_APPROVAL->value,
            ]);

            $requestReservation = $this->requestReservationRepository->create([
                'title' => $data['title'],
                'from_hour' => $data['from_hour'],
                'to_hour' => $data['to_hour'],
                'date' => $data['date'],
                'price' => $totalPrice,
                'field_usage_type' => $fieldUsageType,
                'court_id' => $data['court_id'],
                'requested_user_id' => auth()->user()->id,
                'reservation_id' => $reservation->id,
            ]);

            if (isset($data['court_reservation']['match_ids']) && count($data['court_reservation']['match_ids']) > 0) {
                foreach ($data['court_reservation']['match_ids'] as $value) {
                    $requestReservationMatchRows[] = [
                        'id' => Str::uuid()->toString(),
                        'request_reservation_id' => $requestReservation->id,
                        'match_id' => $value,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }

            $requestReceiverRows = [];
            foreach ($courtOwners as $courtOwner) {
                $requestReceiverRows[] = [
                    'id' => Str::uuid()->toString(),
                    'requestable_id' => $requestReservation->id,
                    'requestable_type' => 'App\Models\RequestReservation',
                    'name' => 'reservation',
                    'receiver_user_id' => $courtOwner->user_id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }

            $this->requestReceiverRepository->insert($requestReceiverRows);
            $this->requestReservationMatchRepository->insert($requestReservationMatchRows);
            DB::commit();

            return $requestReservation;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data) : bool
    {
        DB::beginTransaction();
        try {
            $requestReservations = [];
            $reservations = [];
            $requestReceiverRows = [];
            $requestReservationMatchRows = [];

            $courtId = $data['court_id'];
            $sportTypeId = $data['sport_type_id'];
            $courtOwners = $this->courtOwnerRepository->getByParams(['court_id' => $courtId]);
            $court = $this->courtRepository->findWithCourtBusiness($data['court_id']);

            foreach ($data['items'] as $date => $item) {
                $parsedDate = Carbon::parse($date);
                $dayOfWeek = strtolower($parsedDate->format('l'));
                $getParams = [
                    'court_id' => $courtId,
                    'day_of_weeks' => [$dayOfWeek]
                ];

                $pricings = $this->courtReservationPricingRepository->getByCourtIdAndDays($getParams);
                if ($pricings->isEmpty()) {
                    throw new Exception('No pricing found for the specified day.');
                }

                $pricing = $pricings->first();
                $hours = $pricing->hours;
                $fromHour = Carbon::parse($item['from_hour']);
                $toHour = Carbon::parse($item['to_hour']);
                $totalPrice = 0;

                foreach ($hours as $hour) {
                    $hourStart = Carbon::createFromFormat('H:i', $hour['from_hour']);
                    $hourEnd = Carbon::createFromFormat('H:i', $hour['to_hour']);
                    if ($hourStart == $fromHour && $hourEnd == $toHour) {
                        $totalPrice += $hour['price'];
                    }
                }

                $monthlyPriceIncreaseRate = $court->courtBusiness->monthly_price_increase_rates;
                $currentMonth = $parsedDate->month;
                $priceAdjustmentFactor = $monthlyPriceIncreaseRate[$currentMonth] ?? 0;
                $totalPrice = $totalPrice * (1 + $priceAdjustmentFactor);

                if ($totalPrice <= 0) {
                    throw new Exception('Invalid price calculation.');
                }

                $reservationId = Str::uuid()->toString();
                $requestableId = Str::uuid()->toString();
                $reservations[] = [
                    'id' => $reservationId,
                    'title' => $data['title'],
                    'user_id' => auth()->user()->id,
                    'court_id' => $courtId,
                    'sport_type_id' => $sportTypeId,
                    'code' => Str::random(6),
                    'field_usage_type' => $pricing->field_usage_type,
                    'from_hour' => $item['from_hour'],
                    'to_hour' => $item['to_hour'],
                    'date' => $date,
                    'price' => $totalPrice,
                    'reservation_status_id' => ReservationStatusEnum::WAITING_FOR_APPROVAL->value,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                $requestReservations[] = [
                    'id' => $requestableId,
                    'title' => $data['title'],
                    'requested_user_id' => auth()->user()->id,
                    'from_hour' => $item['from_hour'],
                    'to_hour' => $item['to_hour'],
                    'date' => $date,
                    'price' => $totalPrice,
                    'reservation_id' => $reservationId,
                    'court_id' => $courtId,
                    'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                if (isset($item['match_ids']) && count($item['match_ids']) > 0) {
                    foreach ($item['match_ids'] as $matchId) {
                        $requestReservationMatchRows[] = [
                            'id' => Str::uuid()->toString(),
                            'request_reservation_id' => $requestableId,
                            'match_id' => $matchId,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }
                }

                foreach ($courtOwners as $courtOwner) {
                    $requestReceiverRows[] = [
                        'id' => Str::uuid()->toString(),
                        'requestable_id' => $requestableId,
                        'requestable_type' => 'App\Models\RequestReservation',
                        'receiver_user_id' => $courtOwner->user_id,
                        'name' => 'reservation',
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
            }

            $this->reservationRepository->insert($reservations);
            $this->requestReservationRepository->insert($requestReservations);
            $this->requestReceiverRepository->insert($requestReceiverRows);
            $this->requestReservationMatchRepository->insert($requestReservationMatchRows);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    public function update(array $data, int|string $id) : bool
    {
        $model = $this->requestReservationRepository->find($id);
        $update = $this->requestReservationRepository->update($data, $id);
        if($data['status'] == RequestStatusEnum::ACCEPTED->value) {

            $this->reservationRepository->update([
                'reservation_status_id' => $data['status']
            ], $model->reservation_id);

            $requestReservationMatches = $this->requestReservationMatchRepository->getByRequestReservationId($id);

            foreach ($requestReservationMatches as $value) {
                $this->matchRepository->update(['reservation_id' => $model->reservation_id], $value->match_id);
            }
            $reservationLogRepository = new ReservationLogRepository(new ReservationLog());
            $reservationLogRepository->create([
                    'reservation_id' => $model->court_id,
                    'description' => __('messages.reservation_create_approved'),
                    'subject_type' => ReservationLogSubjectTypeEnum::RESERVATION_CREATED->value
                ]
            );
        }elseif($data['status'] == RequestStatusEnum::REJECTED->value) {
            $this->reservationRepository->delete($model->reservation_id);
        }

        return $update;
    }

    public function delete(string $id) : bool
    {
        $model = $this->requestReservationRepository->findReservationById($id);
        $this->reservationRepository->delete($model['reservation_id']);
        $this->courtReservationPricingRepository->update(['status' => CourtReservationPricingStatusEnum::ACTIVE->value], $model->court_reservation_pricing_id);
        return true;
    }

    /**
     * deleteByCourt
     *
     * @param array $params
     * @return bool
     */
    public function deleteByCourt(array $params) : bool
    {
        $requestReservations = $this->requestReservationRepository->getReservationsByIds($params['request_reservations']);
        $courtPricingIds = $requestReservations->map(function($requestReservation) {
            if(in_array($requestReservation->reservation->reservation_status_id, [ReservationStatusEnum::APPROVED->value,
                                                                                  ReservationStatusEnum::WAITING_FOR_APPROVAL->value]))
                return $requestReservation->reservation->court_reservation_pricing_id;
            }
        );

        # Court Reservation Pricing Status Update TO 2
        if($courtPricingIds->isNotEmpty()){
            $this->requestReceiverRepository->deleteByRequestableIds($params['request_reservations'] );

            $this->reservationRepository->deleteByIds(
                $requestReservations->map(function ($requestReservation) {
                    return $requestReservation->reservation_id;
                })->toArray()
            );
            return $this->courtReservationPricingRepository->updateByIds($courtPricingIds->toArray(), ['status' => CourtReservationPricingStatusEnum::ACTIVE]);
        }
        return true;
    }

}
