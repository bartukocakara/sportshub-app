<?php

namespace App\Services\Request;

use App\Enums\StatusEnums\Court\CourtStatusEnum;
use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\LogSubjectTypeEnums\CourtLogSubjectTypeEnum;
use App\Models\CourtLog;
use App\Repositories\Court\CourtImageRepository;
use App\Repositories\Court\CourtLogRepository;
use App\Repositories\Court\CourtRepository;
use App\Repositories\Request\RequestCreateCourtRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Repositories\UserRepository;
use App\Services\CrudService;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RequestCreateCourtService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestCreateCourtRepository $requestCreateCourtRepository;

    protected RequestReceiverRepository $requestReceiverRepository;

    protected CourtRepository $courtRepository;


    protected CourtImageRepository $courtImageRepository;

    protected ImageService $imageService;

    protected UserRepository $userRepository;

    /**
     * @param RequestCreateCourtRepository $requestCreateCourtRepository
     * @return void
    */
    public function __construct(RequestCreateCourtRepository $requestCreateCourtRepository, RequestReceiverRepository $requestReceiverRepository, CourtRepository $courtRepository, CourtImageRepository $courtImageRepository, ImageService $imageService, UserRepository $userRepository)
    {
        $this->requestCreateCourtRepository = $requestCreateCourtRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        $this->courtRepository = $courtRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestCreateCourtRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
        $this->courtImageRepository = $courtImageRepository;
        $this->imageService = $imageService;
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return Model
    */
    public function store(array $data) : Model
    {
        DB::beginTransaction();
        try {
            // Court oluştur
            $court = $this->courtRepository->create($data);

            // Request Create Court Oluştur
            $requestCreateCourt = $this->requestCreateCourtRepository->create([
                'title' => $data['title'],
                'requested_user_id' => auth()->user()->id,
                'court_id' => $court->id,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value
            ]);

            // Request Receiver Oluştur
            $users = $this->userRepository->getByRolesAndPermissions(['admin', 'super_admin'], ['request_court_create_read', 'request_court_create_write']);
            $requestReceiverRows = [];
            foreach ($users as $user) {
                $requestReceiverRows[] = [
                    'id' => Str::uuid()->toString(),
                    'requestable_id' => $user->id,
                    'requestable_type' => 'App\Models\RequestCreateCourt',
                    'name' => 'court',
                    'receiver_user_id' => $user->id,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            // Insert request receivers
            $this->requestReceiverRepository->insert($requestReceiverRows);

            // Court Image oluştur
            $insertRows = $this->imageService->prepareInsertRows($data['images'], $court->id, 'court_id', 'public/courts/');
            $this->courtImageRepository->insert($insertRows);

            DB::commit();

            return $requestCreateCourt;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating court: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update(array $data, int|string $id) : bool
    {
        $model = $this->requestCreateCourtRepository->find($id);
        $update = $model->update($data);
        switch ($data['status']) {
            case RequestStatusEnum::ACCEPTED->value:
                $this->courtRepository->update([
                    'status' => CourtStatusEnum::OPEN->value,
                ], $model->court_id);
                $courtLogRepository = new CourtLogRepository(new CourtLog());
                $courtLogRepository->create([
                        'court_id' => $model->court_id,
                        'description' => __('messages.court_create_approved'),
                        'subject_type' => CourtLogSubjectTypeEnum::COURT_CREATE_APPROVED->value
                    ]
                );
                break;
            case RequestStatusEnum::REJECTED->value:
                # Remove Files
                $images = $this->courtImageRepository->getByCourtId($model->court_id);
                $this->imageService->deleteExistingImages($images, 'courts');

                # Remove Court
                $this->courtRepository->delete($model->court_id);
                # Remove Request Receivers
                $this->requestReceiverRepository->deleteByRequestableId($id);
                break;
            default:
                # code...
                break;
        }

        return $update;
    }

    public function destroy(string $id) : bool
    {
        DB::beginTransaction();
        try {
            $model = $this->requestCreateCourtRepository->find($id);

            $courtImages = $this->courtImageRepository->getByCourtId($model->court_id);

            $this->courtRepository->delete($model->court_id);
            $this->imageService->deleteExistingImages($courtImages, 'courts');

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating court: ' . $e->getMessage());
            throw $e;
        }

    }
}
