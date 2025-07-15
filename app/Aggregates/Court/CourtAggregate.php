<?php

namespace App\Aggregates\Court;

use App\Enums\Court\CourtStatusEnum;
use App\Models\Definition;
use App\Repositories\CourtImageRepository;
use App\Repositories\CourtRepository;
use App\Repositories\DefinitionRepository;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourtAggregate
{
    private ImageService $imageService;
    private CourtRepository $courtRepository;
    private CourtImageRepository $courtImageRepository;

    public function __construct(ImageService $imageService, CourtRepository $courtRepository, CourtImageRepository $courtImageRepository)
    {
        $this->imageService = $imageService;
        $this->courtRepository = $courtRepository;
        $this->courtImageRepository = $courtImageRepository;
    }

    public function createCourt(array $data)
    {
        DB::beginTransaction();
        try {
            $definitionRepo = new DefinitionRepository(new Definition());
            $data['status'] = $definitionRepo->findByParams(['group_key' => 'court_status', 'value' => CourtStatusEnum::AVAILABLE])->id;

            $court = $this->courtRepository->create($data);
            $imageInsertRows = $this->imageService->prepareInsertRows($data['images'], $court->id, 'court_id', 'public/courts/');
            $this->courtImageRepository->insert($imageInsertRows);
            DB::commit();

            return $court;

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating court: ' . $e->getMessage());
            throw $e;
        }
    }
}
