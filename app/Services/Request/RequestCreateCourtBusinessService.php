<?php

namespace App\Services\Request;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\LogSubjectTypeEnums\CourtBusinessLogSubjectTypeEnum;
use App\Models\CourtBusinessLog;
use App\Repositories\Court\CourtBusinessDocumentRepository;
use App\Repositories\Court\CourtBusinessLogRepository;
use App\Repositories\Court\CourtBusinessRepository;
use App\Repositories\Court\CourtImageRepository;
use App\Repositories\Court\CourtRepository;
use App\Repositories\Request\RequestCreateCourtBusinessRepository;
use App\Repositories\Request\RequestReceiverRepository;
use App\Services\CrudService;
use App\Services\DocumentService;
use App\Services\ImageService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RequestCreateCourtBusinessService extends CrudService
{
    protected RequestCreateCourtBusinessRepository $requestCreateCourtBusinessRepository;
    protected CourtBusinessRepository $courtBusinessRepository;
    protected CourtBusinessDocumentRepository $courtBusinessDocumentRepository;
    protected DocumentService $documentService;
    protected RequestReceiverRepository $requestReceiverRepository;
    protected CourtImageRepository $courtImageRepository;
    protected ImageService $imageService;
    protected CourtRepository $courtRepository;

    /**
     * @param RequestCreateCourtBusinessRepository $requestCreateCourtBusinessRepository
     * @param CourtBusinessRepository $courtBusinessRepository
     * @param CourtBusinessDocumentRepository $courtBusinessDocumentRepository
     * @param RequestReceiverRepository $requestReceiverRepository
     * @param DocumentService $documentService
     * @param CourtImageRepository $courtImageRepository
     * @param ImageService $imageService
     * @param CourtRepository $courtRepository
     * @return void
    */
    public function __construct(RequestCreateCourtBusinessRepository $requestCreateCourtBusinessRepository, CourtBusinessRepository $courtBusinessRepository, CourtBusinessDocumentRepository $courtBusinessDocumentRepository, RequestReceiverRepository $requestReceiverRepository, DocumentService $documentService, CourtImageRepository $courtImageRepository, ImageService $imageService, CourtRepository $courtRepository)
    {
        $this->requestCreateCourtBusinessRepository = $requestCreateCourtBusinessRepository;
        $this->courtBusinessRepository = $courtBusinessRepository;
        $this->courtBusinessDocumentRepository = $courtBusinessDocumentRepository;
        $this->requestReceiverRepository = $requestReceiverRepository;
        $this->documentService = $documentService;
        $this->courtImageRepository = $courtImageRepository;
        $this->imageService = $imageService;
        $this->courtRepository = $courtRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestCreateCourtBusinessRepository); // Crud işlemleri yoksa kaldırınız.
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
            $courtBusiness = $this->courtBusinessRepository->create($data);
            $requestCreateCourtBusiness = $this->requestCreateCourtBusinessRepository->create([
                'title' => $data['title'],
                'requested_user_id' => auth()->user()->id,
                'court_business_id' => $courtBusiness->id,
                'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value
            ]);
            $data['court_business_id'] = $courtBusiness->id;
            $insertRows = $this->documentService->prepareInsertRows($data['files'], $courtBusiness->id, 'court_business_id', 'court_business_document_type_id', 'public/court-business-documents/');
            $this->courtBusinessDocumentRepository->insert($insertRows);

            DB::commit();

            return $requestCreateCourtBusiness;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating court business document: ' . $e->getMessage());
            throw $e;
        }
    }

    public function update(array $data, int|string $id) : bool
    {
        $model = $this->requestCreateCourtBusinessRepository->find($id);
        $update = $this->requestCreateCourtBusinessRepository->update($data, $id);
        switch ($data['status']) {
            case RequestStatusEnum::ACCEPTED->value:
                $this->courtBusinessRepository->update([
                    'status' => RequestStatusEnum::ACCEPTED->value,
                ], $model->court_business_id);
                $courtBusinessLogRepository = new CourtBusinessLogRepository(new CourtBusinessLog());
                $courtBusinessLogRepository->create([
                        'court_id' => $model->court_business_id,
                        'description' => __('messages.court_business_create_approved'),
                        'subject_type' => CourtBusinessLogSubjectTypeEnum::COURT_BUSINESS_CREATE_APPROVED->value
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
                $this->courtBusinessRepository->update([
                    'status' => RequestStatusEnum::REJECTED->value,
                ], $model->court_business_id);
                break;
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
            $model = $this->requestCreateCourtBusinessRepository->find($id);
            $court = $this->courtRepository->findByParams(['court_business_id' => $model->court_business_id]);
            $this->courtBusinessRepository->delete($model->court_business_id);
            $courtImages = $this->courtImageRepository->getByCourtId($court->id);
            $courtBusinessDocuments = $this->courtBusinessDocumentRepository->getByParams(['court_business_id' => $model->court_business_id]);

            $this->imageService->deleteExistingImages($courtImages, 'courts');
            $this->imageService->deleteExistingImages($courtBusinessDocuments, 'court-business-documents');
            $this->requestCreateCourtBusinessRepository->delete($id);

            DB::commit();
            return true;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating court: ' . $e->getMessage());
            throw $e;
        }

    }

}
